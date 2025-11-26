<#
.SYNOPSIS
    Publica artigos no WordPress via e-mail usando Jetpack Post by Email

.DESCRIPTION
    Script para enviar posts para WordPress automaticamente via email.
    Carrega credenciais do arquivo .env

.PARAMETER Title
    Título do post

.PARAMETER Content
    Conteúdo do post (aceita Markdown que será convertido para HTML)

.PARAMETER Categories
    Categorias separadas por vírgula

.PARAMETER Tags
    Tags separadas por vírgula

.PARAMETER Status
    Status do post: publish, draft, pending, private

.PARAMETER Delay
    Agendar publicação (ex: "+2 hours", "+1 day")

.EXAMPLE
    .\publish-post.ps1 -Title "Novo Artigo" -Content "Conteúdo aqui" -Categories "Teologia" -Status "publish"
#>

param(
    [Parameter(Mandatory=$true)]
    [string]$Title,
    
    [Parameter(Mandatory=$true)]
    [string]$Content,
    
    [string]$Categories = "",
    [string]$Tags = "",
    [string]$Status = "draft",
    [string]$Delay = "",
    [string]$FromEmail = "",
    [string]$FromName = "WordPress Publisher"
)

# Carregar variáveis do .env
if (Test-Path ".env") {
    Get-Content ".env" | ForEach-Object {
        if ($_ -match '^([^=]+)=(.*)$') {
            [Environment]::SetEnvironmentVariable($matches[1], $matches[2], "Process")
        }
    }
} else {
    Write-Error "Arquivo .env não encontrado!"
    exit 1
}

$postByEmailAddress = [Environment]::GetEnvironmentVariable("POST_BY_EMAIL_ADDRESS", "Process")

if ([string]::IsNullOrEmpty($postByEmailAddress)) {
    Write-Error "POST_BY_EMAIL_ADDRESS não configurado no .env"
    exit 1
}

# Construir corpo do email com shortcodes
$emailBody = $Content

if ($Categories) {
    $emailBody += "`n`n[category $Categories]"
}

if ($Tags) {
    $emailBody += "`n[tags $Tags]"
}

if ($Status) {
    $emailBody += "`n[status $Status]"
}

if ($Delay) {
    $emailBody += "`n[delay $Delay]"
}

$emailBody += "`n`n[end]"

# Configurar cliente SMTP
$smtpServer = "smtp.gmail.com"
$smtpPort = 587

if ([string]::IsNullOrEmpty($FromEmail)) {
    Write-Host "Usando Send-MailMessage com configuração padrão do sistema..."
    
    try {
        # Tentar enviar via cliente de email padrão
        $outlook = New-Object -ComObject Outlook.Application
        $mail = $outlook.CreateItem(0)
        $mail.To = $postByEmailAddress
        $mail.Subject = $Title
        $mail.Body = $emailBody
        $mail.Send()
        
        Write-Host "✅ Email enviado com sucesso via Outlook!" -ForegroundColor Green
        Write-Host "Post: '$Title'" -ForegroundColor Cyan
        Write-Host "Status: $Status" -ForegroundColor Yellow
    }
    catch {
        Write-Error "Falha ao enviar email via Outlook: $_"
        Write-Host "`n📧 Envie manualmente:" -ForegroundColor Yellow
        Write-Host "Para: $postByEmailAddress"
        Write-Host "Assunto: $Title"
        Write-Host "`nCorpo:"
        Write-Host $emailBody
    }
}
else {
    Write-Host "⚠️ Envio SMTP direto não implementado nesta versão." -ForegroundColor Yellow
    Write-Host "Use Outlook ou copie o conteúdo abaixo:" -ForegroundColor Yellow
    Write-Host "`n📧 Email para enviar:" -ForegroundColor Cyan
    Write-Host "Para: $postByEmailAddress"
    Write-Host "Assunto: $Title"
    Write-Host "`nCorpo:"
    Write-Host $emailBody
}
