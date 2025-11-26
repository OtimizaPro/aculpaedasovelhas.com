<?php
/* LEITURA OBRIGATÓRIA: ./DEFINICOES_DO_PROJETO.md */
/**
 * Template Name: Artigos (Painel + Blog)
 * Description: Microsoft Account Inspired Layout with Blog Grid
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | Painel</title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class('ms-account-page'); ?>>

    <header class="ms-header">
        <div class="ms-header-content">
            <div class="ms-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </div>
            <div class="ms-user-menu">
                <!-- Placeholder for user icon -->
                <div class="ms-user-avatar"></div>
            </div>
        </div>
    </header>

    <main class="ms-main-content">
        <div class="ms-content-wrapper">
            <div class="ms-page-header">
                <h1>Bem-vindo ao seu painel</h1>
                <p class="ms-subtitle">Gerencie seu conteúdo, explore as ferramentas e acompanhe o desenvolvimento do manifesto.</p>
            </div>

            <div class="ms-card-grid">
                <div class="ms-card">
                    <div class="ms-card-icon">📜</div>
                    <div class="ms-card-content">
                        <h3>O Livrinho</h3>
                        <p>Acesse o manifesto completo, com todas as chaves e revelações.</p>
                        <a href="<?php echo esc_url(home_url('/o-livrinho')); ?>" class="ms-card-link">Ler agora &rarr;</a>
                    </div>
                </div>

                <div class="ms-card">
                    <div class="ms-card-icon">📰</div>
                    <div class="ms-card-content">
                        <h3>Artigos Recentes</h3>
                        <p>Explore os últimos estudos, contestações e insights publicados.</p>
                        <a href="#blog-grid" class="ms-card-link">Ver todos &rarr;</a>
                    </div>
                </div>

                <div class="ms-card">
                    <div class="ms-card-icon">📖</div>
                    <div class="ms-card-content">
                        <h3>Bíblia Online</h3>
                        <p>Navegue pela tradução proprietária e comentada da Revelação.</p>
                        <a href="<?php echo esc_url(home_url('/biblia')); ?>" class="ms-card-link">Acessar a Bíblia &rarr;</a>
                    </div>
                </div>

                <div class="ms-card">
                    <div class="ms-card-icon">🤖</div>
                    <div class="ms-card-content">
                        <h3>AN Agent</h3>
                        <p>Interaja com a IA para estudos assistidos e aprofundados.</p>
                        <a href="<?php echo esc_url(home_url('/an-agent')); ?>" class="ms-card-link">Ativar AN Agent &rarr;</a>
                    </div>
                </div>
                
                <div class="ms-card">
                    <div class="ms-card-icon">✉️</div>
                    <div class="ms-card-content">
                        <h3>Contato</h3>
                        <p>Envie suas perguntas, sugestões ou feedback para a equipe.</p>
                        <a href="#" class="ms-card-link">Entrar em contato &rarr;</a>
                    </div>
                </div>

                 <div class="ms-card">
                    <div class="ms-card-icon">⚙️</div>
                    <div class="ms-card-content">
                        <h3>Em Breve</h3>
                        <p>Novas ferramentas e seções serão adicionadas aqui.</p>
                        <a href="#" class="ms-card-link">Saiba mais &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Blog System Integration -->
            <div id="blog-grid" class="ms-blog-section" style="margin-top: 4rem; border-top: 1px solid var(--border); padding-top: 3rem;">
                <div class="ms-page-header">
                    <h2>Biblioteca de Artigos</h2>
                    <p class="ms-subtitle">Reflexões apologéticas, estudos bíblicos e análises teológicas</p>
                </div>

                <section class="artigos-filters" style="background: transparent; padding: 0; margin-bottom: 2rem;">
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

                <section class="artigos-grid" style="padding: 0;">
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
                                            <span class="read-time"><?php echo function_exists('acu_estimated_reading_time') ? acu_estimated_reading_time() : '5'; ?> min</span>
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
            </div>

        </div>
    </main>

    <?php wp_footer(); ?>
</body>
</html>
