<?php
/*
Template Name: AN Agent
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AN Agent | A Culpa é das Ovelhas</title>
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
                <li><a href="<?php echo home_url('/comunidade'); ?>">Comunidade</a></li>
                <li><a href="<?php echo home_url('/biblia'); ?>">Bíblia</a></li>
                <li><a href="<?php echo home_url('/an-agent'); ?>" class="active">AN Agent</a></li>
                <li><a href="<?php echo home_url('/apoie'); ?>" class="btn-subscribe">APOIE</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="section-container">
            <h1 class="section-title">AN Agent - Estudo Bíblico com IA</h1>
            <div class="entry-content" style="max-width: 800px; margin: 0 auto;">
                <p>O <strong>AN Agent</strong> é uma ferramenta revolucionária de Estudo Bíblico apoiada por Inteligência Artificial.</p>
                <p>Ele possui acesso a um banco de dados completo da Bíblia, permitindo análises profundas, correlações complexas e insights que auxiliam no entendimento das Escrituras.</p>
                
                <h3>Recursos</h3>
                <ul>
                    <li>Busca semântica avançada em toda a Bíblia.</li>
                    <li>Análise de contexto histórico e cultural.</li>
                    <li>Comparação de traduções e originais.</li>
                    <li>Assistente de estudo personalizado.</li>
                </ul>

                <div style="text-align: center; margin-top: 3rem;">
                    <a href="#" class="btn-primary">ACESSAR AN AGENT (BETA)</a>
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