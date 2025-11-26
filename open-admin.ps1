$user = "anderson"
$appPass = "YmVceWZj6hqhI2hw6Yb64VpO" # sem espaços
$site = "https://aculpaedasovelhas.com"

$pair = "${user}:${appPass}"
$bytes = [System.Text.Encoding]::UTF8.GetBytes($pair)
$base64 = [System.Convert]::ToBase64String($bytes)

$headers = @{
    "Authorization" = "Basic $base64"
}

Write-Host "Acessando painel admin..." -ForegroundColor Cyan
Write-Host "URL: $site/wp-admin/themes.php" -ForegroundColor Yellow
Write-Host "`nInstruções:" -ForegroundColor Cyan
Write-Host "1. Abra o link acima no navegador" -ForegroundColor White
Write-Host "2. Localize 'A Culpa é das Ovelhas'" -ForegroundColor White  
Write-Host "3. Clique em 'Ativar'" -ForegroundColor White
Write-Host "`nOu execute via SSH:" -ForegroundColor Cyan
Write-Host "ssh aculpaedasovelhascom.wordpress.com@ssh.wp.com" -ForegroundColor White
Write-Host "Senha: jd3zbeYnDr4w3p3w4G4U" -ForegroundColor White
Write-Host "Comando: wp theme activate aculpaedasovelhas" -ForegroundColor White

Start-Process "$site/wp-admin/themes.php"
