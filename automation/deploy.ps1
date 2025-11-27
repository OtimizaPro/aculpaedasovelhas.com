<#
.SYNOPSIS
    Script de Deploy Completo - A Culpa é das Ovelhas
.DESCRIPTION
    Automatiza todo o fluxo de deploy: git, SFTP, WP-CLI, cache clear
.PARAMETER Action
    Ação a executar: full, git, sftp, wp-pages, wp-cache, validate
.EXAMPLE
    .\deploy.ps1 -Action full
    .\deploy.ps1 -Action wp-pages
#>

param(
    [Parameter(Mandatory=$false)]
    [ValidateSet('full', 'git', 'sftp', 'wp-pages', 'wp-cache', 'validate', 'status')]
    [string]$Action = 'full',
    
    [Parameter(Mandatory=$false)]
    [string]$CommitMessage = "Auto-deploy: $(Get-Date -Format 'yyyy-MM-dd HH:mm')"
)

# Carregar variáveis de ambiente
$envFile = Join-Path $PSScriptRoot "../.env"
if (Test-Path $envFile) {
    Get-Content $envFile | ForEach-Object {
        if ($_ -match '^([^#][^=]+)=(.*)$') {
            [Environment]::SetEnvironmentVariable($matches[1].Trim(), $matches[2].Trim(), 'Process')
        }
    }
}

# Configurações
$ProjectRoot = Split-Path $PSScriptRoot -Parent
$SiteUrl = $env:WP_SITE_URL ?? "https://aculpaedasovelhas.com"
$SshHost = $env:WP_SSH_HOST
$SshUser = $env:WP_SSH_USER
$SshKeyPath = $env:WP_SSH_KEY_PATH
$RemoteThemeDir = $env:WP_REMOTE_THEME_DIR ?? "/htdocs/wp-content/themes/aculpa-theme"

# Cores para output
function Write-Step { param($msg) Write-Host "▶ $msg" -ForegroundColor Cyan }
function Write-Success { param($msg) Write-Host "✓ $msg" -ForegroundColor Green }
function Write-Error { param($msg) Write-Host "✗ $msg" -ForegroundColor Red }
function Write-Info { param($msg) Write-Host "  $msg" -ForegroundColor Gray }

# =============================================================================
# FUNÇÕES DE DEPLOY
# =============================================================================

function Deploy-Git {
    Write-Step "Enviando alterações para GitHub..."
    
    Set-Location $ProjectRoot
    
    # Verificar se há alterações
    $status = git status --porcelain
    if (-not $status) {
        Write-Info "Nenhuma alteração para commitar"
        return $true
    }
    
    git add .
    git commit -m $CommitMessage
    git push origin main
    
    if ($LASTEXITCODE -eq 0) {
        Write-Success "Push realizado com sucesso"
        return $true
    } else {
        Write-Error "Falha no push"
        return $false
    }
}

function Deploy-SFTP {
    Write-Step "Sincronizando via SFTP..."
    
    $ftpServer = $env:WP_FTP_SERVER
    $ftpUser = $env:WP_FTP_USERNAME
    $ftpPass = $env:WP_FTP_PASSWORD
    $ftpPort = $env:WP_FTP_PORT ?? "22"
    $remoteDir = $env:WP_FTP_REMOTE_DIR
    
    if (-not $ftpServer -or -not $ftpUser) {
        Write-Error "Credenciais SFTP não configuradas no .env"
        return $false
    }
    
    # Usando WinSCP CLI se disponível
    $winscpPath = "C:\Program Files (x86)\WinSCP\WinSCP.com"
    if (Test-Path $winscpPath) {
        $script = @"
open sftp://${ftpUser}:${ftpPass}@${ftpServer}:${ftpPort}/ -hostkey=*
synchronize remote "$ProjectRoot" "$remoteDir" -filemask="|.git/;.github/;.venv/;node_modules/;*.md;.env"
exit
"@
        $script | & $winscpPath /script=/dev/stdin
    } else {
        Write-Info "WinSCP não encontrado, usando lftp..."
        # Fallback para lftp via WSL se disponível
        wsl lftp -c "set sftp:auto-confirm yes; open -u '$ftpUser','$ftpPass' sftp://${ftpServer}:${ftpPort}; mirror -R -v --parallel=2 --exclude .git --exclude .github --exclude .venv --exclude node_modules '$ProjectRoot' '$remoteDir'; bye"
    }
    
    Write-Success "Sincronização SFTP concluída"
    return $true
}

function Deploy-WPPages {
    Write-Step "Criando/Atualizando páginas no WordPress via WP-CLI..."
    
    if (-not $SshHost -or -not $SshUser) {
        Write-Error "Credenciais SSH não configuradas. Usando API REST..."
        return Deploy-WPPagesAPI
    }
    
    $sshCmd = if ($SshKeyPath) { "ssh -i `"$SshKeyPath`" $SshUser@$SshHost" } else { "ssh $SshUser@$SshHost" }
    
    # Páginas a criar
    $pages = @(
        @{ slug = "o-livrinho"; title = "O Livrinho"; template = "page-o-livrinho.php" },
        @{ slug = "manifesto"; title = "Manifesto"; template = "page-manifesto.php" },
        @{ slug = "biblia"; title = "Bíblia Online"; template = "page-biblia.php" },
        @{ slug = "artigos"; title = "Artigos"; template = "page-artigos.php" },
        @{ slug = "o-autor"; title = "O Autor"; template = "page-o-autor.php" },
        @{ slug = "painel"; title = "Painel"; template = "page-painel.php" },
        @{ slug = "an-agent"; title = "AN Agent"; template = "page-an-agent.php" }
    )
    
    foreach ($page in $pages) {
        $slug = $page.slug
        $title = $page.title
        $template = $page.template
        
        Write-Info "Verificando página: $title ($slug)..."
        
        # Verificar se página existe
        $checkCmd = "wp post list --post_type=page --name=$slug --format=ids 2>/dev/null"
        $pageId = Invoke-Expression "$sshCmd `"cd /htdocs && $checkCmd`""
        
        if ($pageId) {
            Write-Info "  Página existe (ID: $pageId), atualizando template..."
            $updateCmd = "wp post meta update $pageId _wp_page_template $template"
            Invoke-Expression "$sshCmd `"cd /htdocs && $updateCmd`""
        } else {
            Write-Info "  Criando página..."
            $createCmd = "wp post create --post_type=page --post_title='$title' --post_name=$slug --post_status=publish --page_template=$template"
            Invoke-Expression "$sshCmd `"cd /htdocs && $createCmd`""
        }
    }
    
    Write-Success "Páginas WordPress sincronizadas"
    return $true
}

function Deploy-WPPagesAPI {
    Write-Step "Criando páginas via WordPress REST API..."
    
    $appPassword = $env:WP_APP_PASSWORD
    $adminUser = $env:WP_ADMIN_USER
    
    if (-not $appPassword) {
        Write-Error "WP_APP_PASSWORD não configurado no .env"
        Write-Info "Gere em: $SiteUrl/wp-admin/users.php -> Application Passwords"
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
        @{ slug = "biblia"; title = "Bíblia Online" },
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
                Write-Info "Criando: $($page.title)..."
                $body = @{
                    title = $page.title
                    slug = $page.slug
                    status = "publish"
                    content = ""
                } | ConvertTo-Json
                
                Invoke-RestMethod -Uri "$SiteUrl/wp-json/wp/v2/pages" -Method Post -Headers $headers -Body $body
                Write-Success "  Página criada: $($page.title)"
            } else {
                Write-Info "  Página já existe: $($page.title)"
            }
        } catch {
            Write-Error "  Erro ao processar $($page.title): $_"
        }
    }
    
    return $true
}

function Clear-WPCache {
    Write-Step "Limpando cache do WordPress..."
    
    if ($SshHost -and $SshUser) {
        $sshCmd = if ($SshKeyPath) { "ssh -i `"$SshKeyPath`" $SshUser@$SshHost" } else { "ssh $SshUser@$SshHost" }
        Invoke-Expression "$sshCmd `"cd /htdocs && wp cache flush 2>/dev/null; wp rewrite flush 2>/dev/null`""
        Write-Success "Cache limpo via WP-CLI"
    } else {
        Write-Info "SSH não configurado, cache não pode ser limpo automaticamente"
    }
}

function Test-Site {
    Write-Step "Validando site em produção..."
    
    $endpoints = @(
        @{ path = "/"; expect = "A Culpa" },
        @{ path = "/o-livrinho"; expect = "Livrinho" },
        @{ path = "/manifesto"; expect = "Manifesto" },
        @{ path = "/artigos"; expect = "Artigos" }
    )
    
    $allPassed = $true
    
    foreach ($ep in $endpoints) {
        try {
            $response = Invoke-WebRequest -Uri "$SiteUrl$($ep.path)" -UseBasicParsing -TimeoutSec 10
            if ($response.Content -match $ep.expect) {
                Write-Success "  $($ep.path) ✓"
            } else {
                Write-Error "  $($ep.path) - Conteúdo esperado não encontrado"
                $allPassed = $false
            }
        } catch {
            Write-Error "  $($ep.path) - Erro: $_"
            $allPassed = $false
        }
    }
    
    return $allPassed
}

function Show-Status {
    Write-Host "`n═══════════════════════════════════════════════════════════" -ForegroundColor Yellow
    Write-Host "  STATUS DO PROJETO: A Culpa é das Ovelhas" -ForegroundColor Yellow
    Write-Host "═══════════════════════════════════════════════════════════`n" -ForegroundColor Yellow
    
    Write-Host "📁 Projeto: $ProjectRoot" -ForegroundColor Cyan
    Write-Host "🌐 Site: $SiteUrl" -ForegroundColor Cyan
    
    # Git status
    Write-Host "`n📦 Git:" -ForegroundColor Magenta
    $branch = git branch --show-current
    $lastCommit = git log -1 --format="%h - %s (%cr)"
    Write-Host "   Branch: $branch"
    Write-Host "   Último commit: $lastCommit"
    
    # Arquivos modificados
    $modified = (git status --porcelain | Measure-Object).Count
    Write-Host "   Arquivos modificados: $modified"
    
    # Verificar conexões
    Write-Host "`n🔗 Conexões:" -ForegroundColor Magenta
    Write-Host "   SSH: $(if ($SshHost) { '✓ Configurado' } else { '✗ Não configurado' })"
    Write-Host "   SFTP: $(if ($env:WP_FTP_SERVER) { '✓ Configurado' } else { '✗ Não configurado' })"
    Write-Host "   WP API: $(if ($env:WP_APP_PASSWORD) { '✓ Configurado' } else { '✗ Não configurado' })"
    
    Write-Host ""
}

# =============================================================================
# EXECUÇÃO PRINCIPAL
# =============================================================================

Write-Host "`n🚀 DEPLOY AUTOMÁTICO - A Culpa é das Ovelhas" -ForegroundColor Yellow
Write-Host "═══════════════════════════════════════════════`n" -ForegroundColor Yellow

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
    'wp-pages' {
        Deploy-WPPages
    }
    'wp-cache' {
        Clear-WPCache
    }
    'validate' {
        Test-Site
    }
    'full' {
        Write-Host "Executando deploy completo...`n" -ForegroundColor Yellow
        
        $steps = @(
            @{ name = "Git Push"; fn = { Deploy-Git } },
            @{ name = "SFTP Sync"; fn = { Deploy-SFTP } },
            @{ name = "WP Pages"; fn = { Deploy-WPPages } },
            @{ name = "Clear Cache"; fn = { Clear-WPCache } },
            @{ name = "Validate"; fn = { Test-Site } }
        )
        
        $results = @()
        foreach ($step in $steps) {
            Write-Host "`n─── $($step.name) ───" -ForegroundColor DarkGray
            $success = & $step.fn
            $results += @{ step = $step.name; success = $success }
        }
        
        Write-Host "`n═══════════════════════════════════════════════" -ForegroundColor Yellow
        Write-Host "  RESUMO DO DEPLOY" -ForegroundColor Yellow
        Write-Host "═══════════════════════════════════════════════`n" -ForegroundColor Yellow
        
        foreach ($r in $results) {
            $icon = if ($r.success) { "✓" } else { "✗" }
            $color = if ($r.success) { "Green" } else { "Red" }
            Write-Host "  $icon $($r.step)" -ForegroundColor $color
        }
        Write-Host ""
    }
}
