<?php
/**
 * Template Name: Artigos (Blog)
 * Description: Sistema de blog para publicação de artigos
 */
get_header();
?>

<main class="artigos-page">
    <section class="artigos-hero">
        <div class="hero-content">
            <span class="hero-badge">Conhecimento · Fé · Razão</span>
            <h1>Artigos</h1>
            <p class="hero-subtitle">Reflexões apologéticas, estudos bíblicos e análises teológicas</p>
        </div>
    </section>

    <section class="artigos-filters">
        <div class="filters-wrapper">
            <div class="search-box">
                <input type="text" id="artigos-search" placeholder="Buscar artigos..." />
                <span class="search-icon">🔍</span>
            </div>
            
            <div class="filter-pills">
                <button class="filter-pill active" data-category="all">Todos</button>
                <button class="filter-pill" data-category="apologetica">Apologética</button>
                <button class="filter-pill" data-category="teologia">Teologia</button>
                <button class="filter-pill" data-category="biblia">Estudos Bíblicos</button>
                <button class="filter-pill" data-category="cultura">Cultura & Sociedade</button>
            </div>
        </div>
    </section>

    <section class="artigos-grid">
        <div class="grid-container">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 12,
                'paged' => $paged,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            
            $artigos_query = new WP_Query($args);
            
            if ($artigos_query->have_posts()) :
                while ($artigos_query->have_posts()) : $artigos_query->the_post();
                    $categories = get_the_category();
                    $cat_names = array();
                    if ($categories) {
                        foreach ($categories as $cat) {
                            $cat_names[] = $cat->name;
                        }
                    }
                    $cat_list = !empty($cat_names) ? implode(', ', $cat_names) : 'Sem categoria';
                    ?>
                    
                    <article class="artigo-card" data-category="<?php echo esc_attr(strtolower($categories[0]->slug ?? 'all')); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="card-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-content">
                            <div class="card-meta">
                                <span class="meta-date"><?php echo get_the_date('d M Y'); ?></span>
                                <span class="meta-separator">•</span>
                                <span class="meta-category"><?php echo esc_html($cat_list); ?></span>
                            </div>
                            
                            <h2 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="card-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>
                            
                            <div class="card-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more">Ler artigo →</a>
                                <span class="read-time"><?php echo acu_estimate_reading_time(get_the_content()); ?> min</span>
                            </div>
                        </div>
                    </article>
                    
                <?php endwhile; ?>
                
                <div class="pagination-wrapper">
                    <?php
                    echo paginate_links(array(
                        'total' => $artigos_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '← Anterior',
                        'next_text' => 'Próximo →',
                        'type' => 'list'
                    ));
                    ?>
                </div>
                
            <?php else : ?>
                
                <div class="no-posts">
                    <div class="no-posts-icon">📝</div>
                    <h3>Nenhum artigo encontrado</h3>
                    <p>Ainda não há artigos publicados ou sua busca não retornou resultados.</p>
                </div>
                
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>

    <section class="artigos-newsletter">
        <div class="newsletter-content">
            <h2>Receba novos artigos</h2>
            <p>Assine nossa newsletter e seja notificado sobre novos conteúdos</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Seu melhor e-mail" required />
                <button type="submit">Assinar</button>
            </form>
        </div>
    </section>
</main>

<?php get_footer(); ?>
