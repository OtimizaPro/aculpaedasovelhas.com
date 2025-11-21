<?php
/*
Template Name: Bíblia
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bíblia | A Culpa é das Ovelhas</title>
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
                <li><a href="<?php echo home_url('/biblia'); ?>" class="active">Bíblia</a></li>
                <li><a href="<?php echo home_url('/an-agent'); ?>">AN Agent</a></li>
                <li><a href="<?php echo home_url('/apoie'); ?>" class="btn-subscribe">APOIE</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="section-container">
            <h1 class="section-title">Projeto Bíblia</h1>
            <div class="entry-content" style="max-width: 800px; margin: 0 auto;">
                <p>Este é um projeto ambicioso de uma <strong>nova tradução literal rígida</strong> das Escrituras Sagradas.</p>
                <p>Nosso objetivo é trazer à luz o significado original dos textos, sem as influências de tradições ou interpretações denominacionais que se acumularam ao longo dos séculos.</p>
                
                <h3>Metodologia</h3>
                <ul>
                    <li>Consulta direta aos textos originais em Hebraico, Aramaico e Grego.</li>
                    <li>Uso de tecnologia de IA para análise linguística comparativa.</li>
                    <li>Compromisso absoluto com a fidelidade ao texto fonte.</li>
                </ul>

                <div style="background: #f0f4f8; padding: 2rem; border-left: 4px solid var(--primary-blue); margin-top: 2rem;">
                    <p><em>"Porque a palavra de Deus é viva e eficaz, e mais penetrante do que espada alguma de dois gumes..."</em> — Hebreus 4:12</p>
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