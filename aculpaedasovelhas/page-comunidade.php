<?php
/*
Template Name: Comunidade
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidade | A Culpa é das Ovelhas</title>
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
                <li><a href="<?php echo home_url('/comunidade'); ?>" class="active">Comunidade</a></li>
                <li><a href="<?php echo home_url('/biblia'); ?>">Bíblia</a></li>
                <li><a href="<?php echo home_url('/an-agent'); ?>">AN Agent</a></li>
                <li><a href="<?php echo home_url('/apoie'); ?>" class="btn-subscribe">APOIE</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="section-container">
            <h1 class="section-title">Nossa Comunidade</h1>
            <div class="entry-content" style="max-width: 800px; margin: 0 auto;">
                <p>Bem-vindo à comunidade "A Culpa é das Ovelhas".</p>
                <p>Estamos construindo uma plataforma de rede social dedicada a conectar aqueles que buscam a Verdade.</p>
                <p>Aqui, você poderá interagir, compartilhar estudos e fortalecer sua fé em um ambiente livre de censura e focado no crescimento espiritual.</p>
                
                <div style="background: #f9f9f9; padding: 2rem; border-radius: 8px; margin-top: 2rem; text-align: center;">
                    <h3>Em Breve</h3>
                    <p>A plataforma social está em desenvolvimento. Inscreva-se para ser notificado do lançamento.</p>
                    <a href="<?php echo home_url('/apoie'); ?>" class="btn-primary">Quero apoiar o projeto</a>
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