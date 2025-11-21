<?php
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/script.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
