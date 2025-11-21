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
        <section class="profile-header">
            <div class="profile-content">
                <div class="profile-info">
                    <h1>Anderson Belem</h1>
                    <p class="bio">Fundador e CEO Otimiza Benefícios. Escrevo sobre liderança, inovação e sociedade.</p>
                    <div class="social-links">
                        <a href="https://medium.com/@Anderson.Otimiza" target="_blank">Medium</a>
                        <a href="https://linkedin.com" target="_blank">LinkedIn</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="feed">
            <h2>Últimas Publicações</h2>
            
            <?php if ( have_posts() ) : ?>
                <div class="post-list">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                            <header class="entry-header">
                                <span class="post-date"><?php echo get_the_date('M d, Y'); ?></span>
                                <h3 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                            </header>
                            
                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more">Ler mais</a>
                            </footer>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <div class="pagination">
                    <?php
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => 'Anterior',
                        'next_text' => 'Próximo',
                    ) );
                    ?>
                </div>

            <?php else : ?>
                <p>Nenhum artigo encontrado. Comece a escrever no painel do WordPress!</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 A Culpa é das Ovelhas</p>
    </footer>
    <script src="<?php echo get_template_directory_uri(); ?>/script.js"></script>
    <?php wp_footer(); ?>
</body>
</html>