<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Culpa é das Ovelhas</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <nav>
            <div class="logo">A Culpa é das Ovelhas</div>
            <ul>
                <li><a href="#home">Início</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home" class="hero">
            <h1>A Culpa é das Ovelhas</h1>
            <p>Onde a responsabilidade é fofa e lanosa.</p>
            <button>Saiba Mais</button>
        </section>
        <section id="sobre">
            <h2>Sobre Nós</h2>
            <p>Bem-vindo ao nosso espaço. Aqui discutimos tudo sobre o universo ovino e além.</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 A Culpa é das Ovelhas</p>
    </footer>
    <script src="<?php echo get_template_directory_uri(); ?>/script.js"></script>
    <?php wp_footer(); ?>
</body>
</html>