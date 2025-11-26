Import-Module Posh-SSH

$sftpHost = "sftp.wp.com"
$sftpUser = "aculpaedasovelhascom.wordpress.com"
$sftpPassword = ConvertTo-SecureString "jd3zbeYnDr4w3p3w4G4U" -AsPlainText -Force
$credential = New-Object System.Management.Automation.PSCredential($sftpUser, $sftpPassword)

# Conectar via SFTP
$sftp = New-SFTPSession -ComputerName $sftpHost -Credential $credential -AcceptKey

# Criar diretório do tema se não existir
$remotePath = "/wp-content/themes/aculpaedasovelhas"
Write-Host "Criando diretório remoto: $remotePath"
New-SFTPItem -SessionId $sftp.SessionId -Path $remotePath -ItemType Directory -ErrorAction SilentlyContinue

# Upload de todos os arquivos do tema
$localThemePath = Resolve-Path ".\aculpaedasovelhas"
$files = Get-ChildItem -Path $localThemePath -Recurse -File

foreach ($file in $files) {
    $relativePath = $file.FullName.Substring($localThemePath.Path.Length).Replace("\", "/")
    $remoteFilePath = "$remotePath$relativePath"
    $remoteDir = Split-Path -Path $remoteFilePath -Parent
    
    # Criar diretório se necessário
    New-SFTPItem -SessionId $sftp.SessionId -Path $remoteDir -ItemType Directory -ErrorAction SilentlyContinue
    
    Write-Host "Uploading: $file.Name -> $remoteFilePath"
    $uploadStream = [System.IO.File]::OpenRead($file.FullName)
    Set-SFTPContent -SessionId $sftp.SessionId -Path $remoteFilePath -Stream $uploadStream -Force
    $uploadStream.Close()
}

Write-Host "`nTema enviado com sucesso para: $remotePath"
Write-Host "Agora ative o tema em: https://wordpress.com/themes/aculpaedasovelhas.com"

# Desconectar
Remove-SFTPSession -SessionId $sftp.SessionId
