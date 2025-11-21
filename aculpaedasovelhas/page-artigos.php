<?php
/*
Template Name: Artigos
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artigos | A Culpa é das Ovelhas</title>
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
                <li><a href="<?php echo home_url('/artigos'); ?>" class="active">Artigos</a></li>
                <li><a href="<?php echo home_url('/#assinar'); ?>" class="btn-subscribe">ASSINAR</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="section-container">
            <h1 class="section-title">Artigos & Publicações</h1>
            
            <div class="feed">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                );
                $query = new WP_Query($args);

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                            <header class="entry-header">
                                <span class="post-date"><?php echo get_the_date('d \d\e F \d\e Y'); ?></span>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                            </header>
                            
                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more">Ler artigo completo →</a>
                            </footer>
                        </article>
                    <?php endwhile;
                    
                    // Paginação
                    echo '<div class="pagination">';
                    echo paginate_links(array(
                        'total' => $query->max_num_pages,
                        'prev_text' => '« Anterior',
                        'next_text' => 'Próximo »',
                    ));
                    echo '</div>';
                    
                    wp_reset_postdata();
                else : ?>
                    <div style="text-align: center; padding: 4rem;">
                        <h3>Nenhum artigo encontrado.</h3>
                        <p>Em breve, novas revelações serão publicadas aqui.</p>
                    </div>
                <?php endif; ?>
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