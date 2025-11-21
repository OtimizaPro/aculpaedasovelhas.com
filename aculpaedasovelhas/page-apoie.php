<?php
/*
Template Name: Apoie
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apoie | A Culpa é das Ovelhas</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <nav>
            <div class="logo">A Culpa é das Ovelhas</div>
            <ul>
                <li><a href="<?php echo home_url(); ?>">Início</a></li>
                <li><a href="<?php echo home_url('/o-livrinho'); ?>">O Livrinho</a></li>
                <li><a href="<?php echo home_url('/artigos'); ?>">Artigos</a></li>
                <li><a href="<?php echo home_url('/sobre'); ?>">O Autor</a></li>
                <li><a href="<?php echo home_url('/comunidade'); ?>">Comunidade</a></li>
                <li><a href="<?php echo home_url('/biblia'); ?>">Bíblia</a></li>
                <li><a href="<?php echo home_url('/an-agent'); ?>">AN Agent</a></li>
                <li><a href="<?php echo home_url('/apoie'); ?>" class="active btn-subscribe">APOIE</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="section-container">
            <h1 class="section-title">Apoie Nossos Projetos</h1>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 3rem;">
                Seu apoio é fundamental para mantermos a independência e continuarmos produzindo conteúdo de qualidade.
                Contribua para os projetos: <strong>Livros Livrinho, Artigos, A Culpa é das Ovelhas, Otimize-Se e Somente Jesus faz por você!</strong>
            </p>

            <div class="pricing-grid">
                <!-- Apoio Pontual -->
                <div class="pricing-card">
                    <h3>Apoio Pontual</h3>
                    <div class="price">R$ 50,00</div>
                    <p>Contribuição única</p>
                    <ul style="text-align: left; margin: 2rem 0; list-style: none;">
                        <li>✅ Ajude a manter o site no ar</li>
                        <li>✅ Apoie a produção de artigos</li>
                    </ul>
                    <a href="#" class="btn-primary">DOAR AGORA</a>
                </div>

                <!-- Assinatura Mensal -->
                <div class="pricing-card featured">
                    <div class="pricing-badge">RECOMENDADO</div>
                    <h3>Assinatura Mensal</h3>
                    <div class="price">R$ 27,90<span>/mês</span></div>
                    <ul style="text-align: left; margin: 2rem 0; list-style: none;">
                        <li>✅ Acesso antecipado a conteúdos</li>
                        <li>✅ Participação na Comunidade</li>
                        <li>✅ Apoio contínuo aos projetos</li>
                    </ul>
                    <a href="#" class="btn-primary">ASSINAR MENSAL</a>
                </div>

                <!-- Assinatura Anual -->
                <div class="pricing-card">
                    <h3>Assinatura Anual</h3>
                    <div class="price">R$ 252,00<span>/ano</span></div>
                    <p>Economia de 25%</p>
                    <ul style="text-align: left; margin: 2rem 0; list-style: none;">
                        <li>✅ Todos os benefícios da mensal</li>
                        <li>✅ E-books exclusivos</li>
                        <li>✅ Prioridade no suporte</li>
                    </ul>
                    <a href="#" class="btn-primary">ASSINAR ANUAL</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div style="text-align: center; padding: 2rem; border-top: 1px solid #eee;">
            <p>&copy; <?php echo date('Y'); ?> A Culpa é das Ovelhas</p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>