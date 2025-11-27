# Histórico de Deploys – otimiza.pro

## Deploy 2025-11-26 – Criação página Artigos e ajustes de fluxo

**Data/Hora:** 2025-11-26
**Responsável:** (preencher)
**Ambiente:** Produção
**Site:** <https://otimiza.pro>

**Branch:** main
**Commit(s):** (preencher com hash ou link do commit)

**Escopo do deploy:**

- Criação/ativação da página de listagem de artigos (`page-artigos.php`)
- Garantia de enqueue do script `assets/js/artigos.js` via `functions.php`
- Documentação do fluxo de deploy no arquivo `DEPLOY.md`
- Organização do script `publish-post.ps1` para publicação via Outlook + `.env`

**Passos executados:**

- Edição de arquivos na pasta local `C:\Projetos\AN Agent - otimiza.pro`
- `git checkout main`
- `git add .`
- `git commit -m "Cria página Artigos e documenta fluxo de deploy"`
- `git push origin main`
- Atualização do código no servidor (git pull ou sincronização SFTP)
- Validação manual no navegador em:
  - `https://otimiza.pro`
  - `https://otimiza.pro/artigos`

**Resultado:**

- [ ] OK – deploy concluído sem erros visíveis
- [ ] Com pendências – ver observações

**Observações:**

- (anotar qualquer erro, correção rápida, ajuste de menu, etc.)

## Deploy 2025-02-20 – Novo Layout Microsoft Account

**Data/Hora:** 2025-02-20
**Responsável:** GitHub Copilot
**Ambiente:** Produção
**Site:** <https://otimiza.pro>

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

## Deploy 2025-11-26 – Rebranding Completo para Otimiza Pro

**Data/Hora:** 2025-11-26
**Responsável:** GitHub Copilot
**Ambiente:** Produção
**Site:** <https://otimiza.pro>

**Branch:** main
**Commit(s):** (será gerado)

**Escopo do deploy:**

- Rebranding total de "A Culpa é das Ovelhas" para "Otimiza Pro".
- Refatoração de prefixos de funções PHP (`acu_` -> `otimiza_`).
- Criação de arquivos de tema faltantes (`header.php`, `footer.php`, `single.php`).
- Atualização de URLs e textos em toda a documentação e templates.
- Ajustes no Dockerfile e configurações de ambiente.

**Passos executados:**

- `git add .`
- `git commit -m "Rebranding completo para Otimiza Pro e correções estruturais"`
- `git push origin main`

**Resultado:**

- [ ] Código enviado para repositório.
- [ ] Validação em produção pendente.

**Observações:**

- Verificar se o servidor de produção atualizou corretamente os arquivos PHP refatorados para evitar erros fatais.
