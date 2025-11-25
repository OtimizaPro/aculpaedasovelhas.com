param(
    [string]$WpCliExecutable = "wp",
    [string]$WpStudioPath = "$env:USERPROFILE\Studio\httpsotimizaprolocal",
    [string]$WordpressPath = "",
    [string]$ThemeDirectory = "aculpaedasovelhas",
    [string]$PageTitle = "Bíblia Online do Manifesto",
    [string]$PageSlug = "biblia-online",
    [string]$TemplateFile = "page-biblia.php"
)

$ErrorActionPreference = 'Stop'

function Invoke-WpCli {
    param(
        [string[]]$Arguments
    )

    Write-Host "[wp] $($Arguments -join ' ')" -ForegroundColor Cyan
    $result = & $WpCliExecutable @Arguments
    if ($LASTEXITCODE -ne 0) {
        throw "WP-CLI command failed: $($Arguments -join ' ')"
    }
    return $result
}

$wordpressPath = if ([string]::IsNullOrWhiteSpace($WordpressPath)) {
    Join-Path $WpStudioPath 'wordpress'
} else {
    $WordpressPath
}

if (-not (Test-Path $wordpressPath)) {
    throw "WordPress path não encontrado: $wordpressPath"
}

$themePath = Join-Path -Path $wordpressPath -ChildPath ("wp-content/themes/" + $ThemeDirectory)
$templatePath = Join-Path $themePath $TemplateFile
if (-not (Test-Path $templatePath)) {
    throw "Template $TemplateFile não encontrado em $themePath"
}

$pathArg = "--path=$wordpressPath"

$pageId = Invoke-WpCli @($pathArg, 'post', 'list', '--post_type=page', '--status=publish,draft', "--name=$PageSlug", '--field=ID').Trim()

if (-not $pageId) {
    Write-Host "Criando página $PageTitle..." -ForegroundColor Green
    $pageId = Invoke-WpCli @(
        $pathArg,
        'post', 'create',
        '--post_type=page',
        '--post_status=publish',
        "--post_title=$PageTitle",
        "--post_name=$PageSlug",
        '--porcelain'
    ).Trim()
} else {
    Write-Host "Página já existe (ID $pageId); atualizando template e status." -ForegroundColor Yellow
    Invoke-WpCli @($pathArg, 'post', 'update', $pageId, '--post_status=publish', "--post_title=$PageTitle") | Out-Null
}

Invoke-WpCli @($pathArg, 'post', 'meta', 'update', $pageId, '_wp_page_template', $TemplateFile) | Out-Null
Write-Host "Template aplicado ao post $pageId" -ForegroundColor Green

$menuCsv = Invoke-WpCli @($pathArg, 'menu', 'list', '--fields=term_id,name', '--format=csv')
$menuId = $menuCsv |
    Where-Object { $_ -match ',' } |
    Select-Object -Skip 1 -First 1

if ($menuId) {
    $menuTermId = ($menuId -split ',')[0]
    Write-Host "Garantindo item no menu (term_id=$menuTermId)..." -ForegroundColor Green
    Invoke-WpCli @($pathArg, 'menu', 'item', 'add-post', $menuTermId, $pageId, "--title=$PageTitle", '--allow-root') | Out-Null
} else {
    Write-Warning 'Nenhum menu registrado; pulei a etapa de criação de item.'
}

Invoke-WpCli @($pathArg, 'cache', 'flush') | Out-Null
Write-Host "Provisionamento concluído para a página $PageTitle (ID $pageId)." -ForegroundColor Green
