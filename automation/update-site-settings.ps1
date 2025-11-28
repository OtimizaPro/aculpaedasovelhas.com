<#
.SYNOPSIS
    Atualiza as configurações do site WordPress via API REST.
.DESCRIPTION
    Este script envia uma requisição POST para o endpoint /wp-json/wp/v2/settings
    para atualizar configurações como o título do site.
    Ele utiliza as credenciais e a URL definidas no arquivo .env na raiz do projeto.
.PARAMETER Title
    O novo título para o site.
.EXAMPLE
    .\automation\update-site-settings.ps1 -Title "Novo Título do Site"
#>
param(
    [string]$Title = "A Culpa é das Ovelhas"
)

# --- Início do Bloco de Funções ---

# Função para carregar variáveis de ambiente de um arquivo .env
function Load-DotEnv {
    param([string]$Path = ".env")
    if (Test-Path $Path) {
        Get-Content $Path | ForEach-Object {
            $line = $_.Trim()
            if ($line -and $line -notlike '#*') {
                $parts = $line -split '=', 2
                if ($parts.Length -eq 2) {
                    $name = $parts[0].Trim()
                    $value = $parts[1].Trim()
                    [System.Environment]::SetEnvironmentVariable($name, $value, "Process")
                    # Write-Verbose "Variável carregada: $name"
                }
            }
        }
    } else {
        Write-Warning "Arquivo .env não encontrado em $Path"
    }
}

# --- Fim do Bloco de Funções ---

# --- Início do Script Principal ---

try {
    # Define o diretório de trabalho para a raiz do projeto
    $projectRoot = Split-Path -Path $PSScriptRoot -Parent
    Set-Location -Path $projectRoot

    # Carrega as variáveis de ambiente do arquivo .env
    Load-DotEnv -Path (Join-Path $projectRoot ".env")

    # Busca as variáveis de ambiente necessárias
    $wpSiteUrl = $env:WP_SITE_URL
    $wpAdminUser = $env:WP_ADMIN_USER
    $wpAppPassword = $env:WP_APP_PASSWORD

    # Validação das variáveis
    if (-not $wpSiteUrl -or -not $wpAdminUser -or -not $wpAppPassword) {
        throw "As variáveis de ambiente WP_SITE_URL, WP_ADMIN_USER e WP_APP_PASSWORD devem estar definidas no arquivo .env."
    }

    # Monta a URL da API
    $apiUrl = "$wpSiteUrl/wp-json/wp/v2/settings"

    # Cria o cabeçalho de autenticação (Basic Auth)
    $credentials = "$($wpAdminUser):$($wpAppPassword)"
    $encodedCredentials = [System.Convert]::ToBase64String([System.Text.Encoding]::ASCII.GetBytes($credentials))
    $headers = @{
        "Authorization" = "Basic $encodedCredentials"
        "Content-Type"  = "application/json"
    }

    # Corpo da requisição com o novo título
    $body = @{
        "title" = $Title
    } | ConvertTo-Json

    Write-Host "Tentando atualizar o título do site para '$Title' em $wpSiteUrl..."

    # Envia a requisição para a API
    $response = Invoke-RestMethod -Uri $apiUrl -Method Post -Headers $headers -Body $body

    Write-Host ""
    Write-Host "✅ Sucesso! O título do site foi atualizado."
    Write-Host "Novo Título: $($response.title)"

}
catch {
    Write-Error "❌ Falha ao atualizar as configurações do site."
    Write-Error $_.Exception.Message
    # Para mais detalhes em caso de erro de API, descomente a linha abaixo
    # Write-Error $_.Exception.Response.GetResponseStream() | ForEach-Object { (New-Object System.IO.StreamReader($_)).ReadToEnd() }
}
finally {
    # Limpa as variáveis de ambiente do processo para segurança
    [System.Environment]::SetEnvironmentVariable("WP_APP_PASSWORD", $null, "Process")
}

# --- Fim do Script Principal ---
