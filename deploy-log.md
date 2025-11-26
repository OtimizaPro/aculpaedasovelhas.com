# Histórico de Deploys – aculpaedasovelhas.com

## Deploy 2025-11-26 – Criação página Artigos e ajustes de fluxo

**Data/Hora:** 2025-11-26
**Responsável:** (preencher)
**Ambiente:** Produção
**Site:** <https://aculpaedasovelhas.com>

**Branch:** main
**Commit(s):** (preencher com hash ou link do commit)

**Escopo do deploy:**

- Criação/ativação da página de listagem de artigos (`page-artigos.php`)
- Garantia de enqueue do script `assets/js/artigos.js` via `functions.php`
- Documentação do fluxo de deploy no arquivo `DEPLOY.md`
- Organização do script `publish-post.ps1` para publicação via Outlook + `.env`

**Passos executados:**

- Edição de arquivos na pasta local `C:\Projetos\AN Agent - site  aculpaedasovelhas.com`
- `git checkout main`
- `git add .`
- `git commit -m "Cria página Artigos e documenta fluxo de deploy"`
- `git push origin main`
- Atualização do código no servidor (git pull ou sincronização SFTP)
- Validação manual no navegador em:
  - `https://aculpaedasovelhas.com`
  - `https://aculpaedasovelhas.com/artigos`

**Resultado:**

- [ ] OK – deploy concluído sem erros visíveis
- [ ] Com pendências – ver observações

**Observações:**

- (anotar qualquer erro, correção rápida, ajuste de menu, etc.)
