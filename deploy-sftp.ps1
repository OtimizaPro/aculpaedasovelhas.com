param(
    [string]$SftpHost = "sftp.wp.com",
    [string]$SftpUser = "aculpaedasovelhascom.wordpress.com",
    [string]$SftpPassword = "jd3zbeYnDr4w3p3w4G4U",
    [string]$LocalThemePath = "aculpaedasovelhas",
    [string]$RemoteThemePath = "/wp-content/themes/aculpaedasovelhas"
)

$ErrorActionPreference = 'Stop'
$psftpExe = Join-Path $PSScriptRoot "psftp.exe"

if (-not (Test-Path $psftpExe)) {
    throw "psftp.exe não encontrado em $PSScriptRoot"
}

if (-not (Test-Path $LocalThemePath)) {
    throw "Pasta do tema não encontrada: $LocalThemePath"
}

Write-Host "Preparando comandos SFTP..." -ForegroundColor Cyan

$commands = @"
cd /wp-content/themes
rm -r aculpaedasovelhas
mkdir aculpaedasovelhas
lcd $LocalThemePath
cd aculpaedasovelhas
mput *
bye
"@

$commandFile = Join-Path $PSScriptRoot "sftp-commands.txt"
$commands | Out-File -FilePath $commandFile -Encoding ASCII

Write-Host "Conectando ao servidor SFTP..." -ForegroundColor Cyan

$batchScript = @"
@echo off
echo y | "$psftpExe" -b "$commandFile" -pw "$SftpPassword" $SftpUser@$SftpHost
"@

$batchFile = Join-Path $PSScriptRoot "sftp-upload.bat"
$batchScript | Out-File -FilePath $batchFile -Encoding ASCII

$process = Start-Process -FilePath "cmd.exe" -ArgumentList "/c `"$batchFile`"" -NoNewWindow -Wait -PassThru

Remove-Item $commandFile -Force
Remove-Item $batchFile -Force

if ($process.ExitCode -eq 0) {
    Write-Host "Tema enviado com sucesso!" -ForegroundColor Green
} else {
    throw "Erro ao enviar tema via SFTP (código $($process.ExitCode))"
}

Write-Host "Ativando tema via SSH..." -ForegroundColor Cyan
$sshCommands = @"
wp theme activate aculpaedasovelhas
wp cache flush
exit
"@

$sshCommandFile = Join-Path $PSScriptRoot "ssh-commands.txt"
$sshCommands | Out-File -FilePath $sshCommandFile -Encoding ASCII

$plinkExe = Join-Path $PSScriptRoot "plink.exe"
if (-not (Test-Path $plinkExe)) {
    Write-Host "Baixando plink.exe..." -ForegroundColor Yellow
    Invoke-WebRequest -Uri "https://the.earth.li/~sgtatham/putty/latest/w64/plink.exe" -OutFile $plinkExe
}

$sshProcess = Start-Process -FilePath $plinkExe -ArgumentList "-ssh -pw `"$SftpPassword`" $SftpUser@ssh.wp.com -m `"$sshCommandFile`"" -NoNewWindow -Wait -PassThru

Remove-Item $sshCommandFile -Force

if ($sshProcess.ExitCode -eq 0) {
    Write-Host "Tema ativado com sucesso!" -ForegroundColor Green
    Write-Host "Verifique: https://aculpaedasovelhas.com" -ForegroundColor Cyan
} else {
    Write-Warning "Houve um problema ao ativar o tema. Verifique manualmente no painel WordPress."
}
