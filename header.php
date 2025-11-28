<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    
    <!-- Preconnect to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                <?php bloginfo('name'); ?>
            </a>
            
            <!-- Navigation -->
            <nav class="nav-menu" id="nav-menu">
                <a href="<?php echo esc_url(home_url('/manifesto')); ?>">Manifesto</a>
                <a href="<?php echo esc_url(home_url('/o-livrinho')); ?>">O Livrinho</a>
                <a href="<?php echo esc_url(home_url('/biblia')); ?>">Biblia</a>
                <a href="<?php echo esc_url(home_url('/artigos')); ?>">Artigos</a>
                <a href="<?php echo esc_url(home_url('/o-autor')); ?>">O Autor</a>
            </nav>
            
            <!-- Actions -->
            <div class="nav-actions">
                <button class="theme-toggle" id="theme-toggle" title="Mudar tema">
                    <span class="theme-toggle-text"></span>
                    <i class="fas fa-sun"></i>
                    <i class="fas fa-moon"></i>
                </button>
                
                <button class="menu-toggle" id="menu-toggle" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>

<main class="site-main">
