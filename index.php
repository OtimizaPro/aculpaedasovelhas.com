<?php
// Fallback template forwarding to the hero front page when no other template is available.
if (file_exists(__DIR__ . '/front-page.php')) {
    require __DIR__ . '/front-page.php';
    return;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <main>
        <h1><?php esc_html_e('A Culpa é das Ovelhas', 'aculpa'); ?></h1>
        <p><?php esc_html_e('Instale o front-page.php para ver o banner.', 'aculpa'); ?></p>
    </main>
    <?php wp_footer(); ?>
</body>
</html>
