<#
.SYNOPSIS
    Configura o ambiente para automação completa
.DESCRIPTION
    Guia interativo para configurar todas as credenciais e conexões
#>

Write-Host @"

╔═══════════════════════════════════════════════════════════════╗
║     🔧 SETUP DE AUTOMAÇÃO - A Culpa é das Ovelhas 🔧          ║
╚═══════════════════════════════════════════════════════════════╝

Este script vai configurar todas as credenciais necessárias para
automação completa do deploy.

"@ -ForegroundColor Cyan

$ProjectRoot = Split-Path $PSScriptRoot -Parent
$envPath = Join-Path $ProjectRoot ".env"

# Carregar .env existente se houver
$existingEnv = @{}
if (Test-Path $envPath) {
    Get-Content $envPath | ForEach-Object {
        if ($_ -match '^([^#][^=]+)=(.*)$') {
            $existingEnv[$matches[1].Trim()] = $matches[2].Trim()
        }
    }
}

function Get-EnvValue {
    param($key, $prompt, $default, $isPassword = $false)
    
    $currentValue = $existingEnv[$key] ?? $default
    $displayDefault = if ($currentValue -and -not $isPassword) { " [$currentValue]" } elseif ($currentValue -and $isPassword) { " [***configurado***]" } else { "" }
    
    Write-Host "$prompt$displayDefault`: " -NoNewline -ForegroundColor Yellow
    $input = Read-Host
    
    if ([string]::IsNullOrWhiteSpace($input)) {
        return $currentValue
    }
    return $input
}

Write-Host "📌 CONFIGURAÇÕES DO SITE" -ForegroundColor Magenta
Write-Host "─────────────────────────────" -ForegroundColor DarkGray
$WP_SITE_URL = Get-EnvValue "WP_SITE_URL" "URL do site" "https://aculpaedasovelhas.com"
$WP_ADMIN_USER = Get-EnvValue "WP_ADMIN_USER" "Usuário admin WP" "anderson"

Write-Host "`n📌 WORDPRESS APP PASSWORD" -ForegroundColor Magenta
Write-Host "─────────────────────────────" -ForegroundColor DarkGray
Write-Host "Gere em: $WP_SITE_URL/wp-admin/users.php -> Application Passwords" -ForegroundColor Gray
$WP_APP_PASSWORD = Get-EnvValue "WP_APP_PASSWORD" "App Password" "" $true

Write-Host "`n📌 SFTP/FTP CREDENTIALS" -ForegroundColor Magenta
Write-Host "─────────────────────────────" -ForegroundColor DarkGray
$WP_FTP_SERVER = Get-EnvValue "WP_FTP_SERVER" "Servidor SFTP" "sftp.wp.com"
$WP_FTP_PORT = Get-EnvValue "WP_FTP_PORT" "Porta" "22"
$WP_FTP_USERNAME = Get-EnvValue "WP_FTP_USERNAME" "Usuário SFTP" ""
$WP_FTP_PASSWORD = Get-EnvValue "WP_FTP_PASSWORD" "Senha SFTP" "" $true
$WP_FTP_REMOTE_DIR = Get-EnvValue "WP_FTP_REMOTE_DIR" "Diretório remoto do tema" "/htdocs/wp-content/themes/aculpa-theme/"

Write-Host "`n📌 SSH (OPCIONAL - para WP-CLI)" -ForegroundColor Magenta
Write-Host "─────────────────────────────" -ForegroundColor DarkGray
$WP_SSH_HOST = Get-EnvValue "WP_SSH_HOST" "Host SSH" ""
$WP_SSH_USER = Get-EnvValue "WP_SSH_USER" "Usuário SSH" ""
$WP_SSH_KEY_PATH = Get-EnvValue "WP_SSH_KEY_PATH" "Caminho da chave SSH" ""

Write-Host "`n📌 POST BY EMAIL (OPCIONAL)" -ForegroundColor Magenta
Write-Host "─────────────────────────────" -ForegroundColor DarkGray
$POST_BY_EMAIL_ADDRESS = Get-EnvValue "POST_BY_EMAIL_ADDRESS" "Endereço de post por email" ""

# Gerar arquivo .env
$envContent = @"
# ═══════════════════════════════════════════════════════════════
# CONFIGURAÇÃO - A Culpa é das Ovelhas
# Gerado em: $(Get-Date -Format "yyyy-MM-dd HH:mm:ss")
# ═══════════════════════════════════════════════════════════════

# WordPress Site
WP_SITE_URL=$WP_SITE_URL
WP_ADMIN_USER=$WP_ADMIN_USER
WP_APP_PASSWORD=$WP_APP_PASSWORD

# SFTP Credentials
WP_FTP_SERVER=$WP_FTP_SERVER
WP_FTP_PORT=$WP_FTP_PORT
WP_FTP_USERNAME=$WP_FTP_USERNAME
WP_FTP_PASSWORD=$WP_FTP_PASSWORD
WP_FTP_REMOTE_DIR=$WP_FTP_REMOTE_DIR

# SSH (para WP-CLI remoto)
WP_SSH_HOST=$WP_SSH_HOST
WP_SSH_USER=$WP_SSH_USER
WP_SSH_KEY_PATH=$WP_SSH_KEY_PATH

# Post by Email
POST_BY_EMAIL_ADDRESS=$POST_BY_EMAIL_ADDRESS

# Docker Hub (se usar)
DOCKER_USERNAME=andersonotimiza
DOCKER_PASSWORD=
"@

$envContent | Out-File -FilePath $envPath -Encoding utf8

Write-Host "`n✅ Arquivo .env salvo em: $envPath" -ForegroundColor Green

# Mostrar configuração dos secrets do GitHub
Write-Host @"

═══════════════════════════════════════════════════════════════
📋 CONFIGURE OS SECRETS NO GITHUB
═══════════════════════════════════════════════════════════════

Acesse: https://github.com/OtimizaPro/aculpaedasovelhas.com/settings/secrets/actions

Adicione os seguintes secrets:

  WP_FTP_SERVER      = $WP_FTP_SERVER
  WP_FTP_PORT        = $WP_FTP_PORT
  WP_FTP_USERNAME    = $WP_FTP_USERNAME
  WP_FTP_PASSWORD    = (sua senha)
  WP_FTP_REMOTE_DIR  = $WP_FTP_REMOTE_DIR
  WP_ADMIN_USER      = $WP_ADMIN_USER
  WP_APP_PASSWORD    = (seu app password)

═══════════════════════════════════════════════════════════════

"@ -ForegroundColor Yellow

Write-Host "🚀 Setup concluído! Execute .\automation\deploy.ps1 -Action status para verificar" -ForegroundColor Cyan
