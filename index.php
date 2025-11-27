<?php
// Fallback template: If this is the blog index or any other generic page, 
// we want to show the "Microsoft Dashboard" layout (which is in page-artigos.php),
// NOT the "Thesis" landing page (front-page.php).
if (file_exists(__DIR__ . '/page-artigos.php')) {
    require __DIR__ . '/page-artigos.php';
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
        <h1><?php esc_html_e('Otimiza Pro', 'otimiza'); ?></h1>
        <p><?php esc_html_e('Painel não encontrado.', 'otimiza'); ?></p>
    </main>
    <?php wp_footer(); ?>
</body>
</html>
