<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class('ms-account-page'); ?>>

    <header class="ms-header">
        <div class="ms-header-content">
            <div class="ms-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </div>
            <div class="ms-user-menu" style="display: flex; gap: 1rem; align-items: center;">
                <button id="theme-toggle" class="theme-toggle-btn" aria-label="Alternar tema">☀️</button>
                <!-- Placeholder for user icon -->
                <div class="ms-user-avatar"></div>
            </div>
        </div>
    </header>