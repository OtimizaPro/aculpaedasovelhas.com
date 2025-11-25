param(
    [string]$WordPressUrl = "https://aculpaedasovelhas.com",
    [string]$Username = "anderson",
    [string]$AppPassword = "YmVc eWZj 6hqh I2hw 6Yb6 4VpO",
    [string]$ThemeName = "aculpaedasovelhas"
)

$ErrorActionPreference = 'Stop'

# Limpar espaços da senha
$AppPassword = $AppPassword -replace '\s',''

# Encode credentials para Basic Auth
$pair = "${Username}:${AppPassword}"
$bytes = [System.Text.Encoding]::UTF8.GetBytes($pair)
$base64 = [System.Convert]::ToBase64String($bytes)
$headers = @{
    "Authorization" = "Basic $base64"
    "Accept" = "application/json"
}

Write-Host "Verificando temas instalados..." -ForegroundColor Cyan

try {
    # Listar temas
    $themesUrl = "$WordPressUrl/wp-json/wp/v2/themes"
    $themes = Invoke-RestMethod -Uri $themesUrl -Headers $headers -Method Get
    
    $targetTheme = $themes | Where-Object { $_.stylesheet -eq $ThemeName }
    
    if (-not $targetTheme) {
        Write-Warning "Tema '$ThemeName' não encontrado no site. Você precisa fazer upload via SFTP primeiro."
        exit 1
    }
    
    Write-Host "Tema encontrado: $($targetTheme.name)" -ForegroundColor Green
    Write-Host "Status atual: $($targetTheme.status)" -ForegroundColor Yellow
    
    if ($targetTheme.status -eq "active") {
        Write-Host "O tema já está ativo!" -ForegroundColor Green
        exit 0
    }
    
    # Não existe endpoint REST API direto para ativar temas
    # Vamos usar WP-CLI via SSH ou instruir o usuário
    Write-Host "`nPara ativar o tema, execute um dos seguintes métodos:" -ForegroundColor Cyan
    Write-Host "1. Via SSH:" -ForegroundColor Yellow
    Write-Host "   ssh aculpaedasovelhascom.wordpress.com@ssh.wp.com" -ForegroundColor White
    Write-Host "   wp theme activate $ThemeName" -ForegroundColor White
    Write-Host "`n2. Via painel WordPress:" -ForegroundColor Yellow
    Write-Host "   $WordPressUrl/wp-admin/themes.php" -ForegroundColor White
    Write-Host "   Clique em 'Ativar' no tema 'A Culpa é das Ovelhas'" -ForegroundColor White
    
} catch {
    Write-Error "Erro ao conectar com WordPress: $_"
}
