<?php
/* LEITURA OBRIGATÓRIA: ./DEFINICOES_DO_PROJETO.md */
/**
 * Template Name: O Livrinho
 * Description: Página do Livrinho - Manifesto e Download
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | O Livrinho</title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class('livrinho-page'); ?>>

    <!-- Navigation (Simplified for consistency) -->
    <nav class="ms-header" style="position: absolute; width: 100%; background: transparent; border: none;">
        <div class="ms-header-content">
            <div class="ms-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </div>
            <div class="ms-user-menu" style="display: flex; gap: 1rem; align-items: center;">
                <button id="theme-toggle" class="theme-toggle-btn" aria-label="Alternar tema">☀️</button>
                <a href="<?php echo esc_url(home_url('/artigos')); ?>" style="color: var(--text-muted); text-decoration: none; font-size: 0.9rem;">Voltar ao Painel</a>
            </div>
        </div>
    </nav>

    <section class="hero-banner" style="min-height: 60vh; display: flex; align-items: center;">
        <div class="hero-inner" style="text-align: center; display: block;">
            <div class="hero-copy" style="margin: 0 auto; max-width: 800px;">
                <span class="hero-pill">Manifesto</span>
                <h1>O Livrinho</h1>
                <p style="margin: 1.5rem auto;">A síntese do Evangelho e as chaves da responsabilidade civil em uma única folha. Uma mensagem que cabe no bolso e muda uma vida.</p>
                
                <div class="hero-ctas" style="justify-content: center;">
                    <a class="btn-hero-primary" href="#download">Baixar PDF</a>
                    <a class="btn-hero-secondary" href="#leitura">Ler Online</a>
                </div>
            </div>
        </div>
        <div class="hero-noise" aria-hidden="true"></div>
    </section>

    <main id="leitura" class="livrinho-content">
        <div class="content-wrapper">
            <div class="ms-page-header" style="text-align: center; margin-bottom: 4rem;">
                <h2>Os 4 Pilares</h2>
                <p class="ms-subtitle" style="margin: 0 auto;">A estrutura fundamental da mensagem.</p>
            </div>
            
            <div class="content-blocks">
                <div class="content-block">
                    <span class="block-number">1</span>
                    <div>
                        <h3>O Problema</h3>
                        <p>Todos pecaram e estão destituídos da glória de Deus. O pecado não é apenas um erro moral, é uma desconexão fundamental da fonte da Vida, gerando morte física e espiritual.</p>
                    </div>
                </div>

                <div class="content-block">
                    <span class="block-number">2</span>
                    <div>
                        <h3>A Solução</h3>
                        <p>Deus amou o mundo de tal maneira que deu seu Filho unigênito. A cruz não foi um acidente, foi o pagamento judicial e substitutivo pela nossa dívida.</p>
                    </div>
                </div>

                <div class="content-block">
                    <span class="block-number">3</span>
                    <div>
                        <h3>A Resposta</h3>
                        <p>Arrependimento e fé. Não é sobre religião ou rituais, mas sobre uma mudança de mente (metanoia) e confiança total na obra consumada de Cristo.</p>
                    </div>
                </div>

                <div class="content-block">
                    <span class="block-number">4</span>
                    <div>
                        <h3>A Promessa</h3>
                        <p>Quem crê no Filho tem a vida eterna. Uma nova natureza é implantada, e a responsabilidade civil do Reino começa agora.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section id="download" class="livrinho-download">
        <div class="download-content">
            <h2>Leve com você</h2>
            <p>O formato original foi desenhado para ser impresso em uma folha A4 e dobrado.</p>
            
            <div class="download-options">
                <a href="#" class="download-btn primary">
                    <span class="btn-icon">⬇️</span>
                    <span class="btn-text">
                        <strong>Download PDF</strong>
                        <small>Versão para Impressão (A4)</small>
                    </span>
                </a>
            </div>

            <div class="print-specs" style="margin-top: 3rem;">
                <h3>Instruções</h3>
                <ul style="text-align: left;">
                    <li>1. Imprima em papel A4 (Sulfite ou Couché).</li>
                    <li>2. Dobre ao meio na horizontal.</li>
                    <li>3. Dobre ao meio na vertical duas vezes (formato sanfona).</li>
                </ul>
            </div>
        </div>
    </section>

    <?php wp_footer(); ?>
</body>
</html>
