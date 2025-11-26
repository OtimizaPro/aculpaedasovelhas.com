# 🐳 Docker Setup - Otimiza AN Theme

Este diretório contém a configuração completa de Docker para desenvolvimento e deploy do tema WordPress.

## 📋 Pré-requisitos

- Docker Desktop instalado
- Conta Docker Hub: `andersonotimiza`

## 🚀 Desenvolvimento Local

### Iniciar ambiente completo (WordPress + MySQL + PHPMyAdmin)

```powershell
docker-compose up -d
```

Acesse:
- WordPress: http://localhost:8080
- PHPMyAdmin: http://localhost:8081

### Parar ambiente

```powershell
docker-compose down
```

### Ver logs

```powershell
docker-compose logs -f
```

## 🔨 Build Manual da Imagem

### Build simples

```powershell
.\.ci\docker-build.ps1
```

### Build com tag específica

```powershell
.\.ci\docker-build.ps1 -Tag "v1.0.0"
```

### Build e push para Docker Hub

```powershell
.\.ci\docker-build.ps1 -Tag "v1.0.0" -Push
```

## 🤖 CI/CD Automático (GitHub Actions)

O workflow `.github/workflows/deploy-theme.yml` faz automaticamente:

1. **Valida** código PHP/CSS
2. **Build** tema + imagem Docker
3. **Push** para Docker Hub
4. **Deploy** via SFTP para WordPress.com

### Configurar Secrets no GitHub

Adicione em: https://github.com/OtimizaPro/aculpaedasovelhas.com/settings/secrets/actions

```
DOCKER_USERNAME = andersonotimiza
DOCKER_PASSWORD = (seu Docker Hub password/token)
WP_FTP_SERVER = sftp.wp.com
WP_FTP_USERNAME = andersonotimiza-hyipz.wordpress.com
WP_FTP_PASSWORD = z9wYkSES61nLLaGp3G6f
WP_FTP_PORT = 22
WP_FTP_REMOTE_DIR = /htdocs/wp-content/themes/otimiza-an-theme/
```

## 📦 Estrutura de Imagens

### Repositório Docker Hub

```
andersonotimiza/otimiza-an-theme:latest
andersonotimiza/otimiza-an-theme:main-<sha>
```

### Usar imagem em produção

```bash
docker pull andersonotimiza/otimiza-an-theme:latest
docker run -p 80:80 andersonotimiza/otimiza-an-theme:latest
```

## 🔍 Comandos Úteis

### Listar containers rodando

```powershell
docker ps
```

### Ver imagens locais

```powershell
docker images | grep otimiza
```

### Limpar cache de build

```powershell
docker builder prune
```

### Rebuild forçado (sem cache)

```powershell
docker-compose build --no-cache
```

### Acessar container WordPress

```powershell
docker exec -it otimiza-wordpress bash
```

### Executar WP-CLI dentro do container

```powershell
docker exec -it otimiza-wordpress wp --info
docker exec -it otimiza-wordpress wp theme list
docker exec -it otimiza-wordpress wp plugin list
```

## 🔐 Segurança

- **NÃO commitar** senhas reais no `.env.example`
- Use `.env` local (já está no `.gitignore`)
- Senhas de produção **APENAS** em GitHub Secrets
- Docker Hub token pode ser gerado em: https://hub.docker.com/settings/security

## 📊 Monitoramento

### Healthcheck do container

```powershell
docker inspect --format='{{.State.Health.Status}}' otimiza-wordpress
```

### Logs de erro do WordPress

```powershell
docker exec otimiza-wordpress tail -f /var/www/html/wp-content/debug.log
```

## 🆘 Troubleshooting

### Container não inicia

```powershell
docker-compose logs wordpress
```

### Resetar completamente

```powershell
docker-compose down -v
docker-compose up -d --build
```

### Permissões de arquivo

```powershell
docker exec otimiza-wordpress chown -R www-data:www-data /var/www/html/wp-content/themes/otimiza-an-theme
```
