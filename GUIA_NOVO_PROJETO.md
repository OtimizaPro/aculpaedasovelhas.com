# Guia Passo a Passo: Configurando um Novo Projeto WordPress com GitHub (Do Zero)

Este guia documenta o processo exato para criar um ambiente de desenvolvimento local que sincroniza automaticamente com o WordPress.com, evitando os erros de "arquivos perdidos" ou "caminhos errados".

## Pré-requisitos
1. **Conta WordPress.com** com plano **Business** ou superior (necessário para acesso a SFTP/Banco de Dados e Deployments).
2. **Conta no GitHub**.
3. **VS Code** e **Git** instalados no seu computador.

---

## Passo 1: Estrutura de Pastas Local (O Segredo)
O erro mais comum é jogar os arquivos soltos na raiz. Para funcionar perfeitamente como um tema, precisamos de uma subpasta.

1. Crie uma pasta para o seu projeto no computador (ex: `MeuNovoSite`).
2. Dentro dela, crie uma **subpasta** com o nome do seu tema (ex: `meu-tema-customizado`).
3. A estrutura deve ficar assim:

```text
MeuNovoSite/ (Raiz do Repositório Git)
└── meu-tema-customizado/ (Pasta do Tema - ONDE SEU CÓDIGO VAI)
    ├── style.css
    ├── index.php
    └── functions.php
```

---

## Passo 2: Criando os Arquivos Essenciais
Dentro da subpasta `meu-tema-customizado`, crie os arquivos obrigatórios.

### 1. `style.css` (A Identidade do Tema)
O WordPress precisa deste cabeçalho para reconhecer o tema.

```css
/*
Theme Name: Meu Tema Customizado
Theme URI: https://github.com/SeuUsuario/SeuRepo
Author: Seu Nome
Author URI: https://seusite.com
Description: Um tema customizado desenvolvido localmente.
Version: 1.0.0
*/

body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
}
```

### 2. `index.php` (O Template Principal)
Converta seu HTML para PHP e adicione os "ganchos" do WordPress.

```php
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php wp_title(); ?></title>
    <!-- Importante: Carrega scripts e estilos do WP -->
    <?php wp_head(); ?>
</head>
<body>
    
    <h1>Olá, mundo! Este é meu novo tema.</h1>
    
    <!-- Importante: Carrega scripts do rodapé (como a barra de admin) -->
    <?php wp_footer(); ?>
</body>
</html>
```

---

## Passo 3: Configurando o GitHub
No terminal do VS Code, dentro da pasta `MeuNovoSite`:

1. **Inicialize o Git:**
   ```powershell
   git init
   ```

2. **Crie o repositório no GitHub:**
   - Vá em github.com -> New Repository.
   - Dê um nome e crie (pode ser público ou privado).

3. **Conecte e suba os arquivos:**
   ```powershell
   git add .
   git commit -m "Configuração inicial do tema"
   git branch -M main
   git remote add origin https://github.com/SEU-USUARIO/SEU-REPO.git
   git push -u origin main
   ```

---

## Passo 4: Conexão no WordPress.com (O Pulo do Gato)
É aqui que a mágica acontece. Se errar aqui, os arquivos não aparecem.

1. Acesse o painel do seu site no WordPress.com.
2. Vá em **Configurações** > **Hospedagem** (ou Hosting Configuration).
3. Procure por **Deployments** (ou Implantações) e clique para configurar o GitHub.
4. Conecte sua conta do GitHub e selecione o repositório `MeuNovoSite`.

### A Configuração Crucial:
O WordPress vai perguntar "O que você quer implantar e onde?".

*   **Source Path (Caminho de Origem):** Digite o nome da sua subpasta.
    *   Ex: `meu-tema-customizado/`
    *   *Não deixe em branco (root), senão ele copia arquivos inúteis do git.*

*   **Destination Path (Caminho de Destino):** Escolha "Themes" ou digite manualmente.
    *   O caminho deve ser: `/wp-content/themes/`

**Resultado esperado:** O WordPress vai pegar o conteúdo de `meu-tema-customizado/` do GitHub e colocar dentro de `/wp-content/themes/` no servidor. O nome da pasta final no servidor será o nome do repositório ou um ID gerado, mas o WordPress vai ler o `style.css` e reconhecer pelo "Theme Name".

---

## Passo 5: Ativar o Tema
1. Espere o deploy terminar no painel do WordPress.com (deve aparecer "Success").
2. Vá em **Aparência** > **Temas**.
3. Você verá "Meu Tema Customizado" na lista.
4. Clique em **Ativar**.

## Resumo do Fluxo de Trabalho Diário
1. Edite os arquivos no VS Code (dentro da subpasta).
2. Teste localmente (se tiver ambiente local) ou confie no código.
3. Rode no terminal:
   ```powershell
   git add .
   git commit -m "Alterei a cor do fundo"
   git push
   ```
4. Aguarde ~30 segundos.
5. Atualize seu site real. A mudança estará lá.
