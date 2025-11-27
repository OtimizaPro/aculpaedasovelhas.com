<?php
/* LEITURA OBRIGATÓRIA: ./DEFINICOES_DO_PROJETO.md */

require_once __DIR__ . '/includes/bible-system.php';

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
});

// Estimar tempo de leitura
function otimiza_estimated_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return max(1, $reading_time);
}

add_action('wp_enqueue_scripts', function () {
    $version = wp_get_theme()->get('Version') ?: '0.1.0';

    wp_enqueue_style(
        'otimiza-theme-style',
        get_stylesheet_uri(),
        [],
        $version
    );

    wp_enqueue_script(
        'otimiza-theme-toggle',
        get_template_directory_uri() . '/assets/js/theme-toggle.js',
        [],
        $version,
        true
    );

    if (is_page_template('page-biblia.php')) {
        wp_enqueue_script(
            'otimiza-bible-ui',
            get_template_directory_uri() . '/assets/js/bible.js',
            [],
            $version,
            true
        );
    }
    
    if (is_page_template('page-artigos.php')) {
        wp_enqueue_script(
            'otimiza-artigos-ui',
            get_template_directory_uri() . '/assets/js/artigos.js',
            [],
            $version,
            true
        );
    }
});
