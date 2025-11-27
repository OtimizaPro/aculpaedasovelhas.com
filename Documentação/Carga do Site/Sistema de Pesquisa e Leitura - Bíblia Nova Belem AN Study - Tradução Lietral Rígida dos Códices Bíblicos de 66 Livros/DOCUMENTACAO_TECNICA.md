# 📘 Documentação Técnica e Operacional - A Culpa é das Ovelhas

Este documento serve como guia definitivo para agentes (humanos ou IA) sobre a manutenção, desenvolvimento e deploy do projeto **A Culpa é das Ovelhas**.

---

## 1. 🤖 Diretrizes para Agentes (IA)

### Comportamento Esperado
1.  **Automação Primeiro:** Nunca peça ao usuário para executar comandos manuais de Git se houver um script de automação (`auto-deploy.ps1`). Execute-o diretamente.
2.  **Obediência Estrita:** Siga as instruções de texto e layout à risca. Se o usuário pedir emojis, use emojis. Se pedir literalidade, seja literal.
3.  **Verificação:** Antes de editar, leia o arquivo para entender o contexto. Após o deploy, use ferramentas de leitura web (`fetch_webpage`) para validar se possível.
4.  **Proatividade:** Se identificar erros de codificação (ex: caminhos longos no Windows), configure o ambiente (`core.longpaths`) automaticamente.

### Ferramentas Utilizadas pelo Agente
*   **Editores de Arquivo:** `create_file`, `replace_string_in_file` (para templates PHP).
*   **Terminal:** `run_in_terminal` (PowerShell) para execução de scripts.
*   **Leitura Web:** `fetch_webpage` para validar produção.

---

## 2. 🛠️ Stack Tecnológica e Dependências

### Estrutura do Projeto
O projeto é um tema WordPress customizado. A lógica reside na injeção de conteúdo estático via templates PHP para garantir fidelidade ao texto original.

*   **Linguagem:** PHP (Templates WordPress), HTML5, CSS3.
*   **Controle de Versão:** Git (GitHub).
*   **Automação:** PowerShell (`.ps1`).

### O que deve estar instalado (Ambiente de Desenvolvimento)
Para um novo desenvolvedor ou agente assumir o projeto, o ambiente deve conter:
1.  **Git:** Para versionamento.
2.  **PowerShell:** Shell padrão para execução dos scripts.
3.  **Ambiente Local WordPress (Opcional mas Recomendado):**
    *   *Sugestão:* **LocalWP** (mais fácil) ou **XAMPP/WAMP**.
    *   Isso é necessário para renderizar as funções do WP (`get_header()`, `get_footer()`) localmente.

---

## 3. 🚀 Como Efetuar o Deploy (Produção)

O processo de deploy foi **totalmente automatizado**. Não faça commits manuais a menos que seja para debug específico.

### Comando de Deploy
No terminal (PowerShell), execute:

```powershell
.\scripts\auto-deploy.ps1
```

### O que o script faz?
1.  Configura `git config core.longpaths true` (evita erros de nomes de arquivos longos comuns neste projeto).
2.  Adiciona (`git add .`) todas as alterações (novos templates, edições, exclusões).
3.  Verifica se há mudanças reais.
4.  Gera um commit com timestamp (`Auto-deploy: YYYY-MM-DD HH:mm:ss`).
5.  Envia para o repositório remoto (`git push origin main`).
6.  **O Servidor:** O ambiente de produção está configurado para "ouvir" a branch `main`. Assim que o push chega, o site é atualizado.

---

## 4. 🧪 Como Testar Localmente (Staging Local)

Como os arquivos são templates PHP do WordPress, eles **não funcionam** se você apenas clicar neles para abrir no navegador. Eles precisam de um servidor rodando WordPress.

### Passo a Passo para Teste Rápido:

1.  **Instale o [LocalWP](https://localwp.com/)** (Gratuito e rápido).
2.  **Crie um novo site** no LocalWP (ex: `ovelhas-local`).
3.  **Localize a pasta do tema:**
    *   No LocalWP, clique em "Go to site folder" -> `app/public/wp-content/themes/`.
4.  **Link Simbólico (Avançado) ou Cópia:**
    *   Copie a pasta `seu-tema` deste repositório para a pasta de themes do LocalWP.
    *   *Ou* configure o VS Code para salvar diretamente na pasta do LocalWP.
5.  **Ativação:**
    *   No Painel Admin do WordPress Local (`/wp-admin`), ative o tema.
    *   Crie páginas e defina o "Modelo" (Template) na barra lateral direita para corresponder ao arquivo (ex: Modelo "Home" para a página inicial, Modelo "O Livrinho" para a página do livro).

---

## 5. 🔧 Resolução de Problemas Comuns

### Problema: "Filename too long" no Git
*   **Causa:** O Windows tem limite de caracteres para caminhos de arquivo, e os nomes dos arquivos de texto bíblico são longos.
*   **Solução:** O script `auto-deploy.ps1` já executa `git config core.longpaths true`. Se falhar, rode manualmente.

### Problema: Alteração não aparece no site após Deploy
*   **Causa:** Cache de CDN, Cache do Servidor ou Cache do Navegador.
*   **Solução:**
    1.  Aguarde 2 a 5 minutos.
    2.  Abra o site em aba anônima.
    3.  Se tiver acesso ao painel WP, limpe o cache do plugin de otimização.

### Problema: Caracteres estranhos (Encoding)
*   **Causa:** Arquivos salvos em ANSI ou sem BOM.
*   **Solução:** Sempre salve os arquivos como **UTF-8**. O VS Code faz isso por padrão.

---

## 6. 📂 Estrutura de Arquivos Críticos

*   `wp-content/themes/seu-tema/`
    *   `front-page.php`: **Página Inicial** (Home).
    *   `page-manifesto.php`: Template do **Manifesto**.
    *   `page-o-livrinho.php`: Template da obra **"O Livrinho"**.
    *   `page-4-pilares.php`: Template dos **4 Pilares**.
    *   `functions.php`: Configurações globais do tema.
    *   `style.css`: Estilos globais.
*   `scripts/`
    *   `auto-deploy.ps1`: **Script Mestre de Automação**.

---

*Documentação gerada automaticamente por AN Agent.*
