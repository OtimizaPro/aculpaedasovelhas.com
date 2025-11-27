<?php
/* LEITURA OBRIGATÓRIA: ./DEFINICOES_DO_PROJETO.md */

require_once __DIR__ . '/includes/bible-system.php';

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
});

/**
 * Atribuir templates automaticamente baseado no slug da página
 * Isso evita a necessidade de configurar manualmente no WP-Admin
 */
add_filter('template_include', function ($template) {
    if (is_page()) {
        $slug = get_post_field('post_name', get_queried_object_id());
        
        $template_map = [
            'o-livrinho'  => 'page-o-livrinho.php',
            'manifesto'   => 'page-manifesto.php',
            'biblia'      => 'page-biblia.php',
            'artigos'     => 'page-artigos.php',
            'o-autor'     => 'page-o-autor.php',
            'painel'      => 'page-painel.php',
            'an-agent'    => 'page-an-agent.php',
        ];
        
        if (isset($template_map[$slug])) {
            $new_template = locate_template($template_map[$slug]);
            if ($new_template) {
                return $new_template;
            }
        }
    }
    return $template;
});

// Estimar tempo de leitura
function aculpa_estimated_reading_time() {
    $content = get_post_field('post_content', get_queried_object_id());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return max(1, $reading_time);
}

add_action('wp_enqueue_scripts', function () {
    $version = wp_get_theme()->get('Version') ?: '0.1.0';

    wp_enqueue_style(
        'aculpa-theme-style',
        get_stylesheet_uri(),
        [],
        $version
    );

    wp_enqueue_script(
        'aculpa-theme-toggle',
        get_template_directory_uri() . '/assets/js/theme-toggle.js',
        [],
        $version,
        true
    );

    // Carregar scripts específicos baseado no slug da página
    $slug = is_page() ? get_post_field('post_name', get_queried_object_id()) : '';
    
    if ($slug === 'biblia') {
        wp_enqueue_script(
            'aculpa-bible-ui',
            get_template_directory_uri() . '/assets/js/bible.js',
            [],
            $version,
            true
        );
    }
    
    if ($slug === 'artigos') {
        wp_enqueue_script(
            'aculpa-artigos-ui',
            get_template_directory_uri() . '/assets/js/artigos.js',
            [],
            $version,
            true
        );
    }
});
