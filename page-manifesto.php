<?php
/* LEITURA OBRIGATÓRIA: ./DEFINICOES_DO_PROJETO.md */
/**
 * Template Name: Manifesto
 * Description: Texto integral do manifesto A Culpa é das Ovelhas
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | Manifesto</title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class('manifesto-page'); ?>>

    <!-- Navigation -->
    <nav class="ms-header" style="position: sticky; top: 0; z-index: 1000; background: var(--bg-dark); border-bottom: 1px solid var(--border);">
        <div class="ms-header-content">
            <div class="ms-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </div>
            <div class="ms-user-menu" style="display: flex; gap: 1rem; align-items: center;">
                <button id="theme-toggle" class="theme-toggle-btn" aria-label="Alternar tema">☀️</button>
                <a href="<?php echo esc_url(home_url('/o-livrinho')); ?>" class="btn-chip">Baixar O Livrinho</a>
            </div>
        </div>
    </nav>

    <main class="livrinho-content" style="padding-top: 4rem;">
        <div class="content-wrapper" style="max-width: 800px;">
            <header class="ms-page-header" style="text-align: center; margin-bottom: 4rem;">
                <span class="hero-pill" style="margin-bottom: 1rem;">Documento Oficial</span>
                <h1>Manifesto: Otimiza Pro</h1>
                <p class="ms-subtitle" style="margin: 0 auto;">A responsabilidade civil do Reino e a desconstrução de sistemas injustos.</p>
            </header>
            
            <article class="manifesto-text" style="color: var(--text-muted); line-height: 1.8; font-size: 1.1rem;">
                <p><em>Este é um espaço reservado para o texto integral do manifesto.</em></p>
                
                <h3>Introdução</h3>
                <p>Vivemos em tempos onde a terceirização da culpa se tornou a norma. Desde o Éden, a humanidade busca bodes expiatórios para suas próprias falhas. Mas o Reino de Deus opera sob uma lógica diferente: a da responsabilidade radical.</p>
                
                <h3>A Ilusão do Sistema</h3>
                <p>As estruturas religiosas e sociais muitas vezes perpetuam a dependência para manter o controle. Ovelhas são treinadas para serem passivas, aguardando um pastor que resolva tudo, quando na verdade foram chamadas para reinar.</p>
                
                <h3>A Verdadeira Identidade</h3>
                <p>Reconhecer que "a culpa é das ovelhas" não é um ato de condenação, mas de empoderamento. É assumir que temos a autoridade e o dever de mudar nossa realidade, guiados pela Revelação e não pela tradição.</p>
                
                <hr style="border: 0; border-top: 1px solid var(--border); margin: 3rem 0;">
                
                <div style="text-align: center;">
                    <p>Para ter acesso ao conteúdo completo e portátil, acesse O Livrinho.</p>
                    <a href="<?php echo esc_url(home_url('/o-livrinho')); ?>" class="cta-button">Ir para O Livrinho</a>
                </div>
            </article>
        </div>
    </main>

    <?php wp_footer(); ?>
</body>
</html>