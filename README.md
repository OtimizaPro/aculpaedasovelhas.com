# A Culpa é das Ovelhas – Tema WordPress

Tema mínimo reconstruído para servir como landing hero inspirado no modelo CoreNest Thesis. O repositório guarda somente os arquivos necessários do tema ativo (banner hero completo e estilos associados) além das instruções abaixo para desenvolvimento, deploy e testes.

## Estrutura do projeto

```text
aculpaedasovelhas.com/
├── aculpaedasovelhas/           # Tema WordPress
│   ├── assets/js/bible.js        # UI da Bíblia Online (busca + filtros)
│   ├── front-page.php            # Landing com o banner manifesto
│   ├── functions.php             # Title-tag, assets e include do sistema bíblico
│   ├── includes/bible-system.php # Fonte de dados (livros, progresso, métricas)
│   ├── index.php                 # Fallback simples, inclui front-page
│   ├── page-biblia.php           # Nova seção semelhante ao catálogo da Bíblia Falada
│   └── style.css                 # Estilos globais + hero + seção bíblica
├── visualization/               # Artefatos diversos (não usados pelo tema)
├── __blobstorage__/             # Azurite (mock do Azure Storage)
└── __queuestorage__/            # Azurite (mock de filas)
```

## Pré-requisitos

- WordPress 6.8+ (produção usa 6.8.3; ambiente local no WP Studio está em 6.9 RC).  
- PHP 8.3.  
- Git instalado tanto localmente quanto no servidor de produção.  
- Acesso ao painel WP Studio para o ambiente `https://otimiza.pro.local` (porta `localhost:8882`) quando precisar sincronizar com o remoto.

## Desenvolvimento local

1. **Clonar o repositório** para `C:\Projetos\AN Agent - site  aculpaedasovelhas.com` (ou caminho de sua preferência).  
2. **Instalar o tema**: copie `aculpaedasovelhas/` para `wp-content/themes/` do seu site local (o WP Studio já aponta para `C:\Users\AndersonBelem\Studio\httpsotimizaprolocal`). Substitua a pasta existente se necessário.  
3. **Ativar o tema** em `localhost:8882/wp-admin` → Aparência → Temas → “A Culpa é das Ovelhas”.  
4. **Editar**: utilize VS Code/PowerShell seguindo as instruções do repositório. Lembre-se de manter o código ASCII e comentar apenas trechos complexos.  
5. **Testar no navegador** abrindo `https://otimiza.pro.local` (HTTPS desativado no momento). Confirme que o banner hero aparece com os botões “Ler o Manifesto” e “Ativar AN Agent”.

## Fluxo de deploy (produção `aculpaedasovelhas.com`)

1. **Commit local**

   ```powershell
   git status
   git add .
   git commit -m "<descrição>"
   git push origin main
   ```

2. **Automação hospedagem**: o host WordPress (tela "Implantações") está conectado ao repositório `OtimizaPro/aculpaedasovelhas.com`. Assim que o push chega em `main`, a plataforma inicia um deploy automático (duração ≈30 s). O status deve aparecer como *Implantado*.
3. **Deploy manual (caso precise)**: conecte-se ao servidor e execute `git fetch && git pull origin main` dentro do diretório do site, ou faça upload do tema compactado (`zip`) via painel WP.

## Testes pós-deploy

1. **Smoke HTTP**

   ```powershell
   Invoke-WebRequest https://aculpaedasovelhas.com -UseBasicParsing
   ```

   Deve retornar `StatusCode 200`.
2. **Verificação visual**: abra o site em um navegador e confirme:
   - Pill “Manifesto vivo · 2025” e título “A Culpa é das Ovelhas”.
   - Lista de destaques (tradução proprietária, frameworks, AN Agent).
   - Painel lateral “Radar Espiritual” com métricas 31/07.
3. **WP Admin**: confira em Aparência → Temas que “A Culpa é das Ovelhas” está ativo e que não surgiram avisos de compatibilidade.

## Notas adicionais

- O tema é deliberadamente minimalista. Para adicionar novas seções ou páginas, crie arquivos adicionais (ex.: `page-*.php`) mantendo a mesma paleta e estrutura descrita em `style.css`.
- Os diretórios `__blobstorage__` e `__queuestorage__` pertencem ao Azurite e não participam do deploy do tema; apenas ignore-os durante commits.
- Sempre que modificar `style.css`, mantenha o cabeçalho do tema atualizado (`Version`) para facilitar cache bust no WordPress.
- **Seção Bíblia Online:** a página usa o template `Bíblia Online`. No WordPress, crie/edite uma página e escolha esse template para carregar o catálogo. Os dados exibidos ficam em `includes/bible-system.php`; basta ampliar o array de livros (campos `book`, `chapters`, `commented`, `status`, etc.) e publicar.
- A busca e filtros da Bíblia rodam em JavaScript puro (`assets/js/bible.js`). Caso precise consumir uma API futura, troque a função `acu_bible_get_books()` por integrações externas ou leituras via REST.
- **Automação WP-CLI:** use `scripts/provision-biblia-page.ps1` para criar/atualizar a página automaticamente. O script chama `wp post create`, aplica o template `page-biblia.php`, publica a página e adiciona ao primeiro menu encontrado. Exemplo:

   ```powershell
   pwsh ./scripts/provision-biblia-page.ps1 `
      -WpCliExecutable "C:/Users/AndersonBelem/AppData/Local/Programs/wp-cli/wp.bat" `
      -WpStudioPath "C:/Users/AndersonBelem/Studio/httpsotimizaprolocal" `
      -ThemeDirectory "aculpaedasovelhas"
   ```

   Defina aliases `wp @production` no seu `wp-cli.yml` para executar o mesmo fluxo em WordPress.com via SSH Gateway.

Qualquer dúvida ou necessidade de ampliar a documentação (ex.: integração com AN Agent, scripts de sincronização do WP Studio), registre uma issue ou peça diretamente aqui.
