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

## Deploy 2025-02-20 – Novo Layout Microsoft Account

**Data/Hora:** 2025-02-20
**Responsável:** GitHub Copilot
**Ambiente:** Produção
**Site:** <https://aculpaedasovelhas.com>

**Branch:** main
**Commit(s):** c9d69f9 (Bump version), 09e8c18 (Force front-page.php)

**Escopo do deploy:**

- Substituição completa do layout da Home (`front-page.php`) pelo novo design estilo "Microsoft Account".
- Criação de `page-painel.php` como template alternativo.
- Atualização de `style.css` com novas variáveis e classes (`.ms-*`).
- Bump de versão do tema para 0.2.0.

**Passos executados:**

- `git push origin main`
- Tentativa de forçar atualização via `front-page.php` direto.

**Resultado:**

- [x] Código enviado para repositório.
- [ ] Validação visual pendente (aguardando propagação/cache).

**Observações:**

- O site pode apresentar cache agressivo. Se o layout não mudar, verificar configurações de cache no servidor ou plugin.

## Deploy 2025-11-26 – Conteúdo "O Livrinho", "Manifesto" e "O Autor"

**Data/Hora:** 2025-11-26 23:15
**Responsável:** GitHub Copilot
**Ambiente:** Produção
**Site:** <https://aculpaedasovelhas.com>

**Branch:** main
**Commit(s):** 3ceadf5 (Manifesto), 289ed5a (O Autor), e015c1a (O Livrinho)

**Escopo do deploy:**

- **O Livrinho (`page-o-livrinho.php`):** Inserção do conteúdo "Verdades Ocultas", interpretação bíblica e notas técnicas.
- **Manifesto (`page-manifesto.php`):** Atualização para o texto integral da "Edição 666".
- **O Autor (`page-o-autor.php`):** Criação da página de biografia e testemunho.
- **Funcionalidades:** Implementação de alternância de tema Light/Dark (JS + CSS).
- **Correções:** Ajuste no layout de Artigos e redirecionamento do Index.

**Passos executados:**

- `git push origin main` (acionando GitHub Actions para deploy SFTP).
- Validação de código local.

**Resultado:**

- [x] Código enviado e implantado com sucesso.
- [ ] **Pendente:** Configuração manual no WP-Admin (Atribuir templates às páginas "Manifesto", "O Autor" e "O Livrinho").

**Observações:**

- As páginas foram implantadas, mas requerem associação manual de Template no painel do WordPress para serem visualizadas corretamente nas URLs `/manifesto`, `/o-autor` e `/o-livrinho`.
