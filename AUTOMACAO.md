# 🚀 AUTOMAÇÃO COMPLETA - A Culpa é das Ovelhas

## Visão Geral

Este projeto possui automação completa de deploy usando múltiplas tecnologias:

```
┌─────────────────────────────────────────────────────────────────┐
│                    FLUXO DE AUTOMAÇÃO                           │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│   [Commit/Push]                                                 │
│        │                                                        │
│        ▼                                                        │
│   ┌─────────────┐     ┌─────────────┐     ┌─────────────┐      │
│   │   GitHub    │────▶│   GitHub    │────▶│    SFTP     │      │
│   │   Actions   │     │  Validate   │     │   Deploy    │      │
│   └─────────────┘     └─────────────┘     └─────────────┘      │
│                             │                    │              │
│                             ▼                    ▼              │
│                       ┌─────────────┐     ┌─────────────┐      │
│                       │  WP REST    │     │   Cache     │      │
│                       │  API Pages  │     │   Clear     │      │
│                       └─────────────┘     └─────────────┘      │
│                             │                    │              │
│                             └────────┬───────────┘              │
│                                      ▼                          │
│                              ┌─────────────┐                    │
│                              │  Validate   │                    │
│                              │    Site     │                    │
│                              └─────────────┘                    │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

## 🔧 Ferramentas Disponíveis

### 1. GitHub Actions (CI/CD Automático)
**Arquivo:** `.github/workflows/deploy-theme.yml`

Acionado automaticamente em:
- Push para `main` ou `master`
- Pull Requests
- Dispatch manual

**Jobs:**
- ✅ Validate (PHP lint, validação de arquivos)
- 📦 Build (empacotamento do tema)
- 🚀 Deploy (SFTP para o servidor)
- 📄 Create Pages (via WP REST API)
- 🧹 Clear Cache (Jetpack/WP cache)
- ✔️ Validate (teste do site após deploy)

### 2. Script PowerShell Local
**Arquivo:** `automation/deploy.ps1`

```powershell
# Ver status completo
.\automation\deploy.ps1 -Action status

# Deploy completo
.\automation\deploy.ps1 -Action full

# Apenas SFTP
.\automation\deploy.ps1 -Action sftp

# Criar páginas WP
.\automation\deploy.ps1 -Action create-pages

# Limpar cache
.\automation\deploy.ps1 -Action cache
```

### 3. Script de Setup
**Arquivo:** `automation/setup-env.ps1`

```powershell
# Configurar credenciais interativamente
.\automation\setup-env.ps1
```

## ⚙️ Configuração Inicial

### Passo 1: Configurar .env Local

Execute o setup interativo:
```powershell
.\automation\setup-env.ps1
```

Ou configure manualmente o `.env`:
```env
WP_SITE_URL=https://aculpaedasovelhas.com
WP_ADMIN_USER=anderson
WP_APP_PASSWORD=xxxx xxxx xxxx xxxx xxxx xxxx

WP_FTP_SERVER=sftp.wp.com
WP_FTP_PORT=22
WP_FTP_USERNAME=seu_usuario
WP_FTP_PASSWORD=sua_senha
WP_FTP_REMOTE_DIR=/htdocs/wp-content/themes/aculpa-theme/
```

### Passo 2: Gerar WordPress Application Password

1. Acesse: `https://aculpaedasovelhas.com/wp-admin/users.php`
2. Clique em "Editar" no seu usuário
3. Role até "Application Passwords"
4. Nome: `GitHub Actions` ou `Automacao Local`
5. Clique "Add New Application Password"
6. Copie a senha gerada (formato: `xxxx xxxx xxxx xxxx xxxx xxxx`)

### Passo 3: Configurar GitHub Secrets

Acesse: https://github.com/OtimizaPro/aculpaedasovelhas.com/settings/secrets/actions

Adicione os secrets:

| Secret | Descrição |
|--------|-----------|
| `WP_FTP_SERVER` | Servidor SFTP (ex: `sftp.wp.com`) |
| `WP_FTP_PORT` | Porta SFTP (ex: `22`) |
| `WP_FTP_USERNAME` | Usuário SFTP |
| `WP_FTP_PASSWORD` | Senha SFTP |
| `WP_FTP_REMOTE_DIR` | Caminho remoto do tema |
| `WP_ADMIN_USER` | Usuário admin WP |
| `WP_APP_PASSWORD` | Application Password gerado |

## 📄 Templates e Páginas

O tema auto-atribui templates baseado no slug da página:

| Slug | Template | Descrição |
|------|----------|-----------|
| `o-livrinho` | `page-o-livrinho.php` | Livro interativo |
| `manifesto` | `page-manifesto.php` | Manifesto do projeto |
| `o-autor` | `page-o-autor.php` | Sobre o autor |
| `artigos` | `page-artigos.php` | Lista de artigos |
| `biblia` | `page-biblia.php` | Sistema bíblico |
| `painel` | `page-painel.php` | Painel admin |
| `an-agent` | `page-an-agent.php` | Sobre o AN Agent |

## 🔄 Fluxo de Trabalho

### Deploy Automático (Recomendado)

1. Faça suas alterações
2. Commit e push:
   ```bash
   git add .
   git commit -m "feat: descrição da alteração"
   git push origin main
   ```
3. O GitHub Actions faz o resto automaticamente!

### Deploy Manual (Quando Necessário)

```powershell
# Deploy completo local
.\automation\deploy.ps1 -Action full

# Ou passo a passo:
.\automation\deploy.ps1 -Action sftp
.\automation\deploy.ps1 -Action create-pages
.\automation\deploy.ps1 -Action cache
```

## 🔍 Verificação

### Verificar Status Local
```powershell
.\automation\deploy.ps1 -Action status
```

### Verificar GitHub Actions
Acesse: https://github.com/OtimizaPro/aculpaedasovelhas.com/actions

### Verificar Site
```powershell
# PowerShell
Invoke-WebRequest -Uri "https://aculpaedasovelhas.com" -Method Head
```

## 🐛 Troubleshooting

### Erro de SFTP
```powershell
# Verifique as credenciais
.\automation\deploy.ps1 -Action status

# Teste conexão manual
lftp -u usuario,senha sftp://servidor:porta -e "ls; exit"
```

### Templates não Aplicados
1. Verifique se o slug da página está correto
2. Limpe o cache: `.\automation\deploy.ps1 -Action cache`
3. Acesse WP-Admin e verifique os permalinks

### GitHub Actions Falhou
1. Verifique os secrets configurados
2. Veja os logs em Actions > Workflow runs
3. Execute manualmente via "Run workflow"

## 📁 Estrutura de Arquivos

```
automation/
├── deploy.ps1        # Script principal de deploy
├── setup-env.ps1     # Configurador de ambiente
└── README.md         # Esta documentação

.github/
└── workflows/
    └── deploy-theme.yml  # CI/CD automático

.env                  # Credenciais locais (NÃO COMITAR!)
.env.example          # Template de exemplo
```

## 🔐 Segurança

- ⚠️ NUNCA comite o arquivo `.env` (está no .gitignore)
- ⚠️ Use Application Passwords, não sua senha principal
- ⚠️ Revogue App Passwords não utilizados
- ⚠️ Mantenha os secrets do GitHub atualizados

---

**Última atualização:** $(date +%Y-%m-%d)
**Versão do Tema:** 0.2.0
**Mantido por:** AN Agent 🤖
