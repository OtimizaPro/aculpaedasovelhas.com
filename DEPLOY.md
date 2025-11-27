# Fluxo de Deploy – aculpaedasovelhas.com

Este documento descreve o fluxo de deploy padrão para o site **aculpaedasovelhas.com**.

## 1. Atualizar arquivos na pasta local (VS Code)

1. Abra o projeto no VS Code na pasta:
   - `C:\Projetos\AN Agent - site  aculpaedasovelhas.com`
2. Faça as alterações necessárias nos arquivos do tema / scripts, por exemplo:
   - `front-page.php`, `index.php`, `page-*.php`
   - `functions.php`, `style.css`, `assets/js/*.js`
   - `publish-post.ps1`, `.env.example` (se necessário)
3. Salve todos os arquivos e, se aplicável, teste localmente (lint, navegação básica, etc.).

## 2. Enviar alterações para o GitHub (Push)

Você pode usar Git pelo terminal, GitHub Desktop, GitHub CLI ou integração do VS Code.

### 2.1. Via Git (terminal / VS Code)

```powershell
cd "C:\Projetos\AN Agent - site  aculpaedasovelhas.com"

# Garantir que está no branch de produção
git checkout main

# Verificar alterações
git status

# Adicionar arquivos alterados
git add .

# Criar commit com mensagem descritiva
git commit -m "Descreva aqui a mudança do deploy"

# Enviar para o repositório remoto
git push origin main
```

### 2.2. Via GitHub Desktop

1. Abra o repositório no **GitHub Desktop**.
2. Revise a lista de arquivos modificados.
3. Escreva uma mensagem de commit descritiva.
4. Clique em **Commit to main**.
5. Clique em **Push origin** para enviar ao GitHub.

### 2.3. Via GitHub CLI / VS Code (Source Control / GitHub Actions)

1. Use a aba **Source Control** do VS Code para stage/commit/push, ou
2. Use GitHub CLI (`gh`) se preferir linha de comando, ou
3. Configure GitHub Actions para automatizar passos adicionais (como testes ou build), se necessário.

## 3. Atualizar e validar o site remoto (aculpaedasovelhas.com)

O site de produção está em **<https://aculpaedasovelhas.com>**.

### 3.1. Atualizar código no servidor

A sincronização entre o repositório GitHub e o servidor pode ser feita de várias formas, conforme a infraestrutura atual:

- **Se o repositório está clonado no servidor** (recomendado):
  - Acesse a pasta do tema no servidor (por exemplo, `wp-content/themes/aculpa-theme`).
  - Execute:

    ```bash
    git checkout main
    git pull origin main
    ```

  - Isso traz para o servidor o mesmo código que está no GitHub.

- **Se usa SFTP / WinSCP**:
  - Sincronize manualmente os arquivos da pasta local `C:\Projetos\AN Agent - site  aculpaedasovelhas.com` com a pasta do tema no servidor.
  - Garanta que os arquivos principais (PHP, CSS, JS, etc.) foram atualizados.

### 3.2. Abrir e ler o site de destino

Após o deploy, é necessário validar o resultado diretamente no site remoto:

1. Abra no navegador:
   - Página inicial: `https://aculpaedasovelhas.com`
   - Páginas específicas alteradas (por exemplo, página **Artigos**):
     - `https://aculpaedasovelhas.com/artigos` (ou a URL configurada pelo WordPress).
2. No VS Code, o GitHub Copilot pode auxiliar na leitura e revisão dos arquivos **locais** que correspondem a esse site.
3. Se você usa extensões de acesso remoto (SSH/SFTP/Remote), pode abrir também a pasta do site no servidor dentro do VS Code; o Copilot consegue então ler esses arquivos abertos e ajudar na comparação/validação do deploy.

> Observação: o Copilot não acessa diretamente a URL do site via HTTP; a validação é feita lendo os arquivos abertos no VS Code (locais ou remotos via extensões) e comparando com o que se espera que esteja em produção.

## 4. Relatório de Deploy

Após cada deploy, recomenda-se registrar um pequeno relatório. Sugestão de modelo:

```text
Data/Hora: AAAA-MM-DD HH:MM
Responsável: Seu Nome
Ambiente: Produção
Site: https://aculpaedasovelhas.com

Branch: main
Commit(s): <hash ou link do commit/PR>

Escopo do deploy:
- Ex.: Criação/atualização da página Artigos (page-artigos.php)
- Ex.: Ajustes em functions.php (função X)
- Ex.: Atualização do script publish-post.ps1

Passos executados:
- git push origin main
- git pull origin main no servidor / sincronização via SFTP
- Validação manual no navegador (URLs verificadas)

Resultado:
- OK – deploy concluído sem erros visíveis
  ou
- Com pendências – ver observações

Observações:
- (Opcional) Detalhar qualquer comportamento inesperado, rollback, hotfix, etc.
```

Você pode manter esses registros em um arquivo `deploy-log.md` no repositório, em issues do GitHub ou em outra ferramenta de documentação interna.
