<?php

require_once __DIR__ . '/includes/bible-system.php';

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});

add_action('wp_enqueue_scripts', function () {
    $version = wp_get_theme()->get('Version') ?: '0.1.0';

    wp_enqueue_style(
        'aculpa-theme-style',
        get_stylesheet_uri(),
        [],
        $version
    );

    if (is_page_template('page-biblia.php')) {
        wp_enqueue_script(
            'aculpa-bible-ui',
            get_template_directory_uri() . '/assets/js/bible.js',
            [],
            $version,
            true
        );
    }
});
