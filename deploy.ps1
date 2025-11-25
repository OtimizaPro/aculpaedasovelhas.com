# deploy.ps1: Script para compactar e enviar o tema para um servidor WordPress.

# --- CONFIGURAÇÕES (PREENCHA AQUI) ---
$HostName = "sftp.wp.com" # Ex: sftp.sua-hospedagem.com
$UserName = "aculpaedasovelhascom.wordpress.com"
$RemotePath = "/wp-content/themes/" # Ex: /wp-content/themes/ ou /sites/meusite/wp-content/themes/

# --- LÓGICA DO SCRIPT ---

# 1. Define o nome do tema e do arquivo ZIP
$ThemeFolderName = "aculpaedasovelhas"
$ZipFileName = "aculpaedasovelhas.zip"
$LocalPath = Get-Location

# 2. Verifica se a pasta do tema existe
if (-not (Test-Path -Path $ThemeFolderName)) {
    Write-Error "A pasta do tema '$ThemeFolderName' não foi encontrada no diretório atual."
    exit
}

# 3. Compacta a pasta do tema
Write-Host "Compactando o tema '$ThemeFolderName' para '$ZipFileName'..."
Compress-Archive -Path $ThemeFolderName -DestinationPath $ZipFileName -Force

# 4. Envia o arquivo .zip para o servidor via SFTP
Write-Host "Enviando '$ZipFileName' para '$HostName'..."
try {
    # Este comando usa o cliente SFTP do OpenSSH, padrão no Windows/macOS/Linux.
    # Ele pedirá sua senha de forma interativa e segura.
    sftp "$($UserName)@$($HostName)" << EOF
put $ZipFileName $RemotePath
bye
EOF
    Write-Host "Arquivo enviado com sucesso para a pasta de temas!"
    Write-Host "Próximo passo: Acesse seu painel do WordPress, vá para 'Aparência > Temas', encontre 'A Culpa é das Ovelhas' e clique em 'Ativar'."

} catch {
    Write-Error "Ocorreu um erro durante o envio via SFTP. Verifique suas credenciais e o caminho remoto."
    Write-Error $_.Exception.Message
} finally {
    # 5. Remove o arquivo .zip local após o envio
    Remove-Item -Path $ZipFileName
    Write-Host "Arquivo .zip local foi removido."
}
