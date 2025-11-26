<?php
/* LEITURA OBRIGATÓRIA: ./DEFINICOES_DO_PROJETO.md */
/**
 * Template: Front Page
 * Builds the Thesis-inspired hero banner.
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
<body <?php body_class(); ?>>
    <button id="theme-toggle" class="theme-toggle-btn" style="position: absolute; top: 1.5rem; right: 1.5rem; z-index: 100;" aria-label="Alternar tema">☀️</button>
    <section class="hero-banner">
        <div class="hero-inner">
            <div class="hero-copy">
                <span class="hero-pill">Manifesto vivo · 2025</span>
                <h1>A Culpa é das Ovelhas</h1>
                <p>Revelação, tecnologia e responsabilidade civil alinhadas para despertar consciências e reescrever sistemas injustos.</p>
                <ul class="hero-highlights">
                    <li>📜 Tradução proprietária e comentada da Revelação</li>
                    <li>🧠 Frameworks contestados com provas e contexto</li>
                    <li>🤖 AN Agent conduzindo estudos assistidos por IA</li>
                </ul>
                <div class="hero-ctas">
                    <a class="btn-hero-primary" href="<?php echo esc_url(home_url('/o-livrinho')); ?>">O Livrinho</a>
                    <a class="btn-hero-secondary" href="<?php echo esc_url(home_url('/manifesto')); ?>">Ler Manifesto</a>
                    <a class="btn-hero-secondary" href="<?php echo esc_url(home_url('/artigos')); ?>">Artigos</a>
                </div>
            </div>
            <aside class="hero-panel" aria-label="Indicadores do manifesto">
                <div class="hero-panel-header">
                    <span>Radar Espiritual</span>
                    <strong>Tempo Real</strong>
                </div>
                <div class="hero-panel-body">
                    <div class="panel-stat">
                        <span class="stat-label">Capítulos Comentados</span>
                        <strong>31</strong>
                    </div>
                    <div class="panel-stat">
                        <span class="stat-label">Frameworks Contestados</span>
                        <strong>07</strong>
                    </div>
                    <div class="panel-divider"></div>
                    <p class="panel-note">“A Verdade não negocia.” Atualizações semanais com novas notas, traduções e chaves estratégicas para a comunidade.</p>
                </div>
            </aside>
        </div>
        <div class="hero-noise" aria-hidden="true"></div>
    </section>
    <?php wp_footer(); ?>
</body>
</html>
