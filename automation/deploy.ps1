<#
.SYNOPSIS
    Script de Deploy Completo - A Culpa e das Ovelhas
.DESCRIPTION
    Automatiza todo o fluxo de deploy: git, SFTP, WP-CLI, cache clear
.PARAMETER Action
    Acao a executar: full, git, sftp, create-pages, cache, validate, status
.EXAMPLE
    .\deploy.ps1 -Action full
    .\deploy.ps1 -Action create-pages
#>

param(
    [Parameter(Mandatory=$false)]
    [ValidateSet('full', 'git', 'sftp', 'create-pages', 'cache', 'validate', 'status')]
    [string]$Action = 'full',
    
    [Parameter(Mandatory=$false)]
    [string]$CommitMessage = "Auto-deploy: $(Get-Date -Format 'yyyy-MM-dd HH:mm')"
)

# Carregar variaveis de ambiente
$envFile = Join-Path $PSScriptRoot "../.env"
if (Test-Path $envFile) {
    Get-Content $envFile | ForEach-Object {
        if ($_ -match '^([^#][^=]+)=(.*)$') {
            [Environment]::SetEnvironmentVariable($matches[1].Trim(), $matches[2].Trim(), 'Process')
        }
    }
}

# Configuracoes
$ProjectRoot = Split-Path $PSScriptRoot -Parent
$SiteUrl = if ($env:WP_SITE_URL) { $env:WP_SITE_URL } else { "https://aculpaedasovelhas.com" }
$SshHost = $env:WP_SSH_HOST
$SshUser = $env:WP_SSH_USER
$SshKeyPath = $env:WP_SSH_KEY_PATH
$RemoteThemeDir = if ($env:WP_REMOTE_THEME_DIR) { $env:WP_REMOTE_THEME_DIR } else { "/htdocs/wp-content/themes/aculpa-theme" }

# Cores para output
function Write-Step { param($msg) Write-Host "[>] $msg" -ForegroundColor Cyan }
function Write-OK { param($msg) Write-Host "[OK] $msg" -ForegroundColor Green }
function Write-Err { param($msg) Write-Host "[X] $msg" -ForegroundColor Red }
function Write-Msg { param($msg) Write-Host "    $msg" -ForegroundColor Gray }

# =============================================================================
# FUNCOES DE DEPLOY
# =============================================================================

function Deploy-Git {
    Write-Step "Enviando alteracoes para GitHub..."
    
    Set-Location $ProjectRoot
    
    # Verificar se ha alteracoes
    $status = git status --porcelain
    if (-not $status) {
        Write-Msg "Nenhuma alteracao para commitar"
        return $true
    }
    
    git add .
    git commit -m $CommitMessage
    git push origin main
    
    if ($LASTEXITCODE -eq 0) {
        Write-OK "Push realizado com sucesso"
        return $true
    } else {
        Write-Err "Falha no push"
        return $false
    }
}

function Deploy-SFTP {
    Write-Step "Sincronizando via SFTP..."
    
    $ftpServer = $env:WP_FTP_SERVER
    $ftpUser = $env:WP_FTP_USERNAME
    $ftpPass = $env:WP_FTP_PASSWORD
    $ftpPort = if ($env:WP_FTP_PORT) { $env:WP_FTP_PORT } else { "22" }
    $remoteDir = $env:WP_FTP_REMOTE_DIR
    
    if (-not $ftpServer -or -not $ftpUser) {
        Write-Err "Credenciais SFTP nao configuradas no .env"
        return $false
    }
    
    # Usando WinSCP CLI se disponivel
    $winscpPath = "C:\Program Files (x86)\WinSCP\WinSCP.com"
    if (-not (Test-Path $winscpPath)) {
        $localWinScp = Join-Path $ProjectRoot "winscp/extracted/WinSCP.com"
        if (Test-Path $localWinScp) {
            $winscpPath = $localWinScp
        }
    }
    if (Test-Path $winscpPath) {
        $scriptContent = @"
open sftp://${ftpUser}:${ftpPass}@${ftpServer}:${ftpPort}/ -hostkey=*
synchronize remote "$ProjectRoot" "$remoteDir" -filemask="|.git/;.github/;.venv/;node_modules/;*.md;.env"
exit
"@
        $tempScript = New-TemporaryFile
        $scriptContent | Out-File -FilePath $tempScript.FullName -Encoding ASCII
        & $winscpPath /script=$($tempScript.FullName)
        Remove-Item $tempScript.FullName
    } else {
        Write-Msg "WinSCP nao encontrado, usando lftp via WSL..."
        wsl lftp -c "set sftp:auto-confirm yes; open -u '$ftpUser','$ftpPass' sftp://${ftpServer}:${ftpPort}; mirror -R -v --parallel=2 --exclude .git --exclude .github --exclude .venv --exclude node_modules '$ProjectRoot' '$remoteDir'; bye"
    }
    
    Write-OK "Sincronizacao SFTP concluida"
    return $true
}

function Deploy-WPPagesAPI {
    Write-Step "Criando paginas via WordPress REST API..."
    
    $appPassword = $env:WP_APP_PASSWORD
    $adminUser = $env:WP_ADMIN_USER
    
    if (-not $appPassword) {
        Write-Err "WP_APP_PASSWORD nao configurado no .env"
        Write-Msg "Gere em: $SiteUrl/wp-admin/users.php -> Application Passwords"
        return $false
    }
    
    $auth = [Convert]::ToBase64String([Text.Encoding]::ASCII.GetBytes("${adminUser}:${appPassword}"))
    $headers = @{
        "Authorization" = "Basic $auth"
        "Content-Type" = "application/json"
    }
    
    $pages = @(
        @{ slug = "o-livrinho"; title = "O Livrinho" },
        @{ slug = "manifesto"; title = "Manifesto" },
        @{ slug = "biblia"; title = "Biblia Online" },
        @{ slug = "artigos"; title = "Artigos" },
        @{ slug = "o-autor"; title = "O Autor" },
        @{ slug = "painel"; title = "Painel" },
        @{ slug = "an-agent"; title = "AN Agent" }
    )
    
    foreach ($page in $pages) {
        try {
            # Verificar se existe
            $response = Invoke-RestMethod -Uri "$SiteUrl/wp-json/wp/v2/pages?slug=$($page.slug)" -Method Get -Headers $headers -ErrorAction SilentlyContinue
            
            if ($response.Count -eq 0) {
                Write-Msg "Criando: $($page.title)..."
                $body = @{
                    title = $page.title
                    slug = $page.slug
                    status = "publish"
                    content = ""
                } | ConvertTo-Json
                
                Invoke-RestMethod -Uri "$SiteUrl/wp-json/wp/v2/pages" -Method Post -Headers $headers -Body $body | Out-Null
                Write-OK "Pagina criada: $($page.title)"
            } else {
                Write-Msg "Pagina ja existe: $($page.title)"
            }
        } catch {
            Write-Err "Erro ao processar $($page.title): $_"
        }
    }
    
    return $true
}

function Clear-WPCache {
    Write-Step "Limpando cache do WordPress..."
    
    if ($SshHost -and $SshUser) {
        $sshCmd = if ($SshKeyPath) { "ssh -i `"$SshKeyPath`" $SshUser@$SshHost" } else { "ssh $SshUser@$SshHost" }
        $result = Invoke-Expression "$sshCmd 'cd /htdocs; wp cache flush 2>/dev/null; wp rewrite flush 2>/dev/null'"
        Write-OK "Cache limpo via WP-CLI"
    } else {
        Write-Msg "SSH nao configurado, cache nao pode ser limpo automaticamente"
        Write-Msg "Limpe manualmente em: $SiteUrl/wp-admin/options-general.php"
    }
}

function Test-Site {
    Write-Step "Validando site em producao..."
    
    $endpoints = @(
        @{ path = "/"; expect = "Culpa" },
        @{ path = "/o-livrinho"; expect = "Livrinho" },
        @{ path = "/manifesto"; expect = "Manifesto" }
    )
    
    $allPassed = $true
    
    foreach ($ep in $endpoints) {
        try {
            $response = Invoke-WebRequest -Uri "$SiteUrl$($ep.path)" -UseBasicParsing -TimeoutSec 10
            if ($response.Content -match $ep.expect) {
                Write-OK "$($ep.path)"
            } else {
                Write-Err "$($ep.path) - Conteudo esperado nao encontrado"
                $allPassed = $false
            }
        } catch {
            Write-Err "$($ep.path) - Erro: $_"
            $allPassed = $false
        }
    }
    
    return $allPassed
}

function Show-Status {
    Write-Host ""
    Write-Host "=======================================================" -ForegroundColor Yellow
    Write-Host "  STATUS DO PROJETO: A Culpa e das Ovelhas" -ForegroundColor Yellow
    Write-Host "=======================================================" -ForegroundColor Yellow
    Write-Host ""
    
    Write-Host "[Projeto] $ProjectRoot" -ForegroundColor Cyan
    Write-Host "[Site]    $SiteUrl" -ForegroundColor Cyan
    
    # Git status
    Write-Host ""
    Write-Host "[Git]" -ForegroundColor Magenta
    Set-Location $ProjectRoot
    $branch = git branch --show-current
    $lastCommit = git log -1 --format="%h - %s (%cr)"
    Write-Host "   Branch: $branch"
    Write-Host "   Ultimo commit: $lastCommit"
    
    # Arquivos modificados
    $modified = (git status --porcelain | Measure-Object).Count
    Write-Host "   Arquivos modificados: $modified"
    
    # Verificar conexoes
    Write-Host ""
    Write-Host "[Conexoes]" -ForegroundColor Magenta
    $sshStatus = if ($SshHost) { "[OK] Configurado ($SshHost)" } else { "[X] Nao configurado" }
    $sftpStatus = if ($env:WP_FTP_SERVER) { "[OK] Configurado ($($env:WP_FTP_SERVER))" } else { "[X] Nao configurado" }
    $apiStatus = if ($env:WP_APP_PASSWORD) { "[OK] Configurado" } else { "[X] Nao configurado" }
    
    Write-Host "   SSH:    $sshStatus"
    Write-Host "   SFTP:   $sftpStatus"
    Write-Host "   WP API: $apiStatus"
    
    Write-Host ""
}

# =============================================================================
# EXECUCAO PRINCIPAL
# =============================================================================

Write-Host ""
Write-Host "=======================================================" -ForegroundColor Yellow
Write-Host "  DEPLOY AUTOMATICO - A Culpa e das Ovelhas" -ForegroundColor Yellow
Write-Host "=======================================================" -ForegroundColor Yellow
Write-Host ""

switch ($Action) {
    'status' {
        Show-Status
    }
    'git' {
        Deploy-Git
    }
    'sftp' {
        Deploy-SFTP
    }
    'create-pages' {
        Deploy-WPPagesAPI
    }
    'cache' {
        Clear-WPCache
    }
    'validate' {
        Test-Site
    }
    'full' {
        Write-Host "Executando deploy completo..." -ForegroundColor Yellow
        Write-Host ""
        
        $steps = @(
            @{ name = "Git Push"; action = "git" },
            @{ name = "SFTP Sync"; action = "sftp" },
            @{ name = "Create Pages"; action = "create-pages" },
            @{ name = "Clear Cache"; action = "cache" },
            @{ name = "Validate"; action = "validate" }
        )
        
        $results = @()
        foreach ($step in $steps) {
            Write-Host "--- $($step.name) ---" -ForegroundColor DarkGray
            $success = $false
            switch ($step.action) {
                'git' { $success = Deploy-Git }
                'sftp' { $success = Deploy-SFTP }
                'create-pages' { $success = Deploy-WPPagesAPI }
                'cache' { Clear-WPCache; $success = $true }
                'validate' { $success = Test-Site }
            }
            $results += @{ step = $step.name; success = $success }
            Write-Host ""
        }
        
        Write-Host "=======================================================" -ForegroundColor Yellow
        Write-Host "  RESUMO DO DEPLOY" -ForegroundColor Yellow
        Write-Host "=======================================================" -ForegroundColor Yellow
        Write-Host ""
        
        foreach ($r in $results) {
            $icon = if ($r.success) { "[OK]" } else { "[X]" }
            $color = if ($r.success) { "Green" } else { "Red" }
            Write-Host "  $icon $($r.step)" -ForegroundColor $color
        }
        Write-Host ""
    }
}
