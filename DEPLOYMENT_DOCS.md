# Documentação de Implantação: A Culpa é das Ovelhas

Este documento registra o processo de configuração do ambiente de desenvolvimento local (VS Code) integrado ao WordPress.com via GitHub.

## 🎯 Objetivo
Desenvolver o site localmente usando HTML/CSS/PHP e implantar automaticamente no WordPress.com ao fazer um `git push`.

## ❌ O que deu errado (Desafios enfrentados)

1.  **Site Estático vs. Tema WordPress:**
    *   *Problema:* Inicialmente, criamos um site HTML estático (`index.html`). O WordPress não aceita isso nativamente como tema; ele exige arquivos PHP e uma estrutura específica.
    *   *Correção:* Convertemos `index.html` para `index.php`, adicionamos cabeçalhos obrigatórios no `style.css` e criamos arquivos auxiliares (`functions.php`, `screenshot.png`).

2.  **Caminho de Implantação (O maior obstáculo):**
    *   *Problema:* Ao configurar a implantação no WordPress.com apontando para a raiz (`/`), os arquivos ficavam "soltos" no servidor e o WordPress não os reconhecia como um tema.
    *   *Tentativa Falha:* Tentamos criar a estrutura de pastas `wp-content/themes/...` dentro do Git. O WordPress.com bloqueou isso por segurança ou conflito de caminhos.
    *   *Erro de Configuração:* Em um momento, o destino foi configurado para `/wp-content/plugins/...`, o que fez o código ser tratado como plugin, e não tema.

3.  **Conexões Presas:**
    *   *Problema:* O WordPress.com impedia criar uma nova conexão correta dizendo "Já existe uma implantação".
    *   *Correção:* Foi necessário excluir a conexão antiga antes de criar a nova.

## ✅ O que deu certo (A Solução Final)

Para que o sistema funcione perfeitamente, chegamos à seguinte arquitetura:

### 1. Estrutura no GitHub
Em vez de deixar os arquivos soltos na raiz do repositório, movemos tudo para uma subpasta:
```text
/ (raiz do repositório)
└── aculpaedasovelhas/  <-- Pasta do tema
    ├── index.php
    ├── style.css
    ├── functions.php
    ├── script.js
    └── screenshot.png
```

### 2. Configuração no WordPress.com
A configuração vencedora na tela de **Implantações** foi:

*   **Repositório:** `OtimizaPro/aculpaedasovelhas.com`
*   **Modo:** `Simples`
*   **Diretório de Destino:** `/wp-content/themes/`

**Por que funcionou?**
Ao apontar o destino para `/wp-content/themes/`, o WordPress pega a pasta `aculpaedasovelhas` do nosso Git e a coloca dentro da pasta de temas. O resultado final no servidor fica:
`/wp-content/themes/aculpaedasovelhas/index.php` (Exatamente o que o WordPress precisa).

## 🚀 Como trabalhar daqui para frente

O fluxo agora é 100% automatizado:

1.  **Edite** os arquivos no seu VS Code (dentro da pasta `aculpaedasovelhas`).
2.  **Salve** as alterações.
3.  **Envie para o GitHub** (via terminal ou interface do VS Code):
    ```powershell
    git add .
    git commit -m "Descrição da mudança"
    git push
    ```
4.  **Aguarde** cerca de 30 segundos. O WordPress.com puxará as mudanças automaticamente.

---
*Gerado por GitHub Copilot em 21/11/2025*