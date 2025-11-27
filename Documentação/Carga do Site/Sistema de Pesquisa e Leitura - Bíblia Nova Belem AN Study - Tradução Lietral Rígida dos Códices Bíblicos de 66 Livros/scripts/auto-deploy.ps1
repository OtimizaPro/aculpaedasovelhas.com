$ErrorActionPreference = "Stop"

Write-Host "🚀 Iniciando Auto-Deploy..." -ForegroundColor Cyan

# Configura suporte a caminhos longos
git config core.longpaths true

# Adiciona todas as alterações
Write-Host "➕ Adicionando arquivos..." -ForegroundColor Cyan
git add .
if ($LASTEXITCODE -ne 0) {
    Write-Host "❌ Erro ao adicionar arquivos." -ForegroundColor Red
    exit $LASTEXITCODE
}

# Verifica status
$status = git status --porcelain
if ($status) {
    $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    $message = "Auto-deploy: $timestamp"
    
    Write-Host "📦 Commitando: $message" -ForegroundColor Yellow
    git commit -m "$message"
    
    Write-Host "⬆️ Enviando para o repositório remoto..." -ForegroundColor Yellow
    git push
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host "✅ Deploy realizado com sucesso!" -ForegroundColor Green
    } else {
        Write-Host "❌ Erro ao enviar para o remoto." -ForegroundColor Red
    }
} else {
    Write-Host "✨ Nada a commitar. Tudo atualizado." -ForegroundColor Green
}
