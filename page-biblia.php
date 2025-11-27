<?php
/**
 * Template Name: Bíblia Online
 * Description: Seção inspirada no catálogo da Bíblia Falada, com filtros e status dos comentários.
 */

require_once get_template_directory() . '/includes/bible-system.php';

$books = otimiza_bible_get_books();
$summary = otimiza_bible_get_summary();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | Bíblia Online</title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bible-page'); ?>>
<section class="bible-hero">
    <div class="bible-hero__pill">Beta litúrgico · Manifesto vivo</div>
    <h1>Bíblia Online do Manifesto</h1>
    <p>Baseado no Novo Testamento da comunidade A Bíblia Falada, porém traduzido e comentado com o nosso contexto civil, jurídico e profético.</p>
    <div class="bible-hero__metrics">
        <article>
            <span>Total de livros</span>
            <strong><?php echo esc_html($summary['books']); ?></strong>
        </article>
        <article>
            <span>Livros prontos</span>
            <strong><?php echo esc_html($summary['ready']); ?></strong>
        </article>
        <article>
            <span>Capítulos comentados</span>
            <strong><?php echo esc_html($summary['progress']); ?>%</strong>
        </article>
    </div>
</section>
<section class="bible-controls">
    <div class="bible-controls__search">
        <label for="bible-search">Buscar livro ou palavra-chave</label>
        <input id="bible-search" type="search" placeholder="Mateus, parábola, Radar..." autocomplete="off">
    </div>
    <div class="bible-controls__filters" role="group" aria-label="Status do comentário">
        <button class="filter-chip is-active" data-filter="all">Todos</button>
        <button class="filter-chip" data-filter="Versão pronta">Versão pronta</button>
        <button class="filter-chip" data-filter="Comentário ativo">Comentário ativo</button>
        <button class="filter-chip" data-filter="Tradução em revisão">Tradução em revisão</button>
        <button class="filter-chip" data-filter="Nova revelação">Nova revelação</button>
    </div>
</section>
<section class="bible-grid" id="bible-grid">
    <?php foreach ($books as $book) : ?>
        <?php
        $progress = $book['chapters'] ? round(($book['commented'] / $book['chapters']) * 100) : 0;
        ?>
        <article class="bible-card" data-book="<?php echo esc_attr(strtolower($book['book'])); ?>" data-status="<?php echo esc_attr($book['status']); ?>" data-category="<?php echo esc_attr($book['category']); ?>">
            <header>
                <span class="bible-card__category"><?php echo esc_html($book['category']); ?></span>
                <h2><?php echo esc_html($book['book']); ?></h2>
                <p class="bible-card__status">
                    <span><?php echo esc_html($book['status']); ?></span>
                    <strong><?php echo esc_html($progress); ?>%</strong>
                </p>
            </header>
            <p class="bible-card__insight"><?php echo esc_html($book['insight']); ?></p>
            <ul class="bible-card__chapters">
                <?php for ($i = 1; $i <= $book['chapters']; $i++) : ?>
                    <li class="<?php echo $i <= $book['commented'] ? 'is-ready' : ''; ?>"><?php echo esc_html($i); ?></li>
                <?php endfor; ?>
            </ul>
            <footer>
                <span class="bible-card__update">Atualizado em <?php echo esc_html($book['last_update']); ?></span>
                <div class="bible-card__actions">
                    <a class="btn-chip" href="<?php echo esc_url(home_url('/biblia/' . $book['slug'])); ?>">Ler comentários</a>
                    <?php if ($book['audio']) : ?>
                        <a class="btn-chip" href="<?php echo esc_url(home_url('/audio/' . $book['slug'])); ?>">Ouvir</a>
                    <?php endif; ?>
                    <button class="btn-chip btn-chip--ghost" type="button" data-book-insight="<?php echo esc_attr($book['book']); ?>">Insights</button>
                </div>
            </footer>
        </article>
    <?php endforeach; ?>
</section>
<section class="bible-note">
    <h3>Por que manter um sistema paralelo?</h3>
    <p>O projeto “Bíblia Online do Manifesto” nasce para preservar a mesma organização e facilidade de navegação de abibliafalada.com.br, porém traduzindo cada capítulo para os símbolos e disputas atuais. As notas são reescritas semanalmente e carregam links para ensaios, frameworks contestados e relatórios do Radar Espiritual.</p>
</section>
<?php wp_footer(); ?>
</body>
</html>
