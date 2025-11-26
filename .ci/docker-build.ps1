# Script para build e push de imagem Docker
param(
    [string]$Tag = "latest",
    [string]$Registry = "andersonotimiza",
    [string]$ImageName = "otimiza-an-theme",
    [switch]$Push
)

Write-Host "🐳 Docker Build Script para Otimiza AN Theme" -ForegroundColor Cyan
Write-Host "=============================================" -ForegroundColor Cyan
Write-Host ""

# Verificar se Docker está rodando
try {
    docker info | Out-Null
    Write-Host "✅ Docker está rodando" -ForegroundColor Green
} catch {
    Write-Host "❌ Docker não está rodando. Inicie o Docker Desktop primeiro." -ForegroundColor Red
    exit 1
}

# Nome completo da imagem
$FullImageName = "$Registry/${ImageName}:$Tag"
Write-Host "📦 Imagem: $FullImageName" -ForegroundColor Yellow
Write-Host ""

# Build da imagem
Write-Host "🔨 Construindo imagem Docker..." -ForegroundColor Cyan
docker build -t $FullImageName .

if ($LASTEXITCODE -ne 0) {
    Write-Host "❌ Falha no build da imagem" -ForegroundColor Red
    exit 1
}

Write-Host "✅ Imagem construída com sucesso!" -ForegroundColor Green
Write-Host ""

# Também tagear como latest se não for latest
if ($Tag -ne "latest") {
    $LatestImageName = "$Registry/${ImageName}:latest"
    Write-Host "🏷️  Criando tag latest: $LatestImageName" -ForegroundColor Cyan
    docker tag $FullImageName $LatestImageName
}

# Push para Docker Hub (se solicitado)
if ($Push) {
    Write-Host "📤 Fazendo push para Docker Hub..." -ForegroundColor Cyan
    
    # Login no Docker Hub (se necessário)
    Write-Host "🔑 Verificando autenticação..." -ForegroundColor Yellow
    docker login
    
    if ($LASTEXITCODE -ne 0) {
        Write-Host "❌ Falha na autenticação" -ForegroundColor Red
        exit 1
    }
    
    # Push da imagem
    docker push $FullImageName
    
    if ($LASTEXITCODE -ne 0) {
        Write-Host "❌ Falha no push da imagem" -ForegroundColor Red
        exit 1
    }
    
    Write-Host "✅ Imagem enviada com sucesso!" -ForegroundColor Green
    
    # Push da tag latest também
    if ($Tag -ne "latest") {
        docker push "$Registry/${ImageName}:latest"
    }
}

Write-Host ""
Write-Host "✨ Build concluído!" -ForegroundColor Green
Write-Host ""
Write-Host "📋 Comandos úteis:" -ForegroundColor Cyan
Write-Host "  docker run -p 8080:80 $FullImageName" -ForegroundColor Gray
Write-Host "  docker-compose up -d" -ForegroundColor Gray
Write-Host "  docker images | grep $ImageName" -ForegroundColor Gray
