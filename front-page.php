<?php
/**
 * Front Page Template - CoreNest Inspired Design
 * 
 * @package ACulpaEDasOvelhas
 */

get_header();
?>

<main class="main">

    <!-- HERO SECTION [01/05] -->
    <section class="hero section" id="hero">
        <div class="hero-grid">
            <div class="hero-content">
                <!-- Pílula de Status removida -->
                
                <h1 class="display-xl hero-title animate-fade-in-up animate-delay-1">
                    A Culpa é das Ovelhas
                </h1>
                
                <p class="hero-description animate-fade-in-up animate-delay-2">
                    Revelação, tecnologia e responsabilidade civil alinhadas para despertar consciências e reescrever sistemas injustos.
                </p>

                <ul class="hero-highlights animate-fade-in-up animate-delay-3">
                    <li>📜 Tradução Inovadora dos Códices Bíblicos diretamente do Grego, Hebraico e Aramaico para o Pt-Br Literal Rígido e Fiel</li>
                    <li>🧠 Sistema de Estudos Bíblicos online GRATUITO</li>
                    <li>🤖 AN Agent que apoia estudos complexos assistidos por IA</li>
                </ul>
                
                <div class="hero-ctas animate-fade-in-up animate-delay-4">
                    <a href="<?php echo esc_url(aco_get_page_link('o-livrinho', '/o-livrinho')); ?>" class="btn btn--primary">
                        O LIVRINHO - A CULPA É DAS OVELHAS
                    </a>
                    <a href="<?php echo esc_url(aco_get_page_link('manifesto', '/manifesto')); ?>" class="btn btn--outline">
                        LER NOSSO MANIFESTO
                    </a>
                    <a href="<?php echo esc_url(aco_get_page_link('artigos', '/artigos')); ?>" class="btn btn--outline">
                        LER OS ARTIGOS
                    </a>
                </div>
            </div>

            <aside class="hero-panel animate-fade-in-up animate-delay-5">
                <div class="hero-panel-header">
                    <span>Conheça nosso Agente de IA Especialista em Filologia dos Códices</span>
                    <strong>Agente desenvolvido pelo Autor para apoiar a Desvelação DEFINITIVA do Enigma 666</strong>
                </div>
                <div class="hero-panel-body">
                    <!-- Estatísticas removidas -->
                    <p class="panel-note">“A Verdade não negocia.” Atualizações semanais com novas notas, traduções e chaves estratégicas para a comunidade.</p>
                </div>
            </aside>
        </div>
    </section>

    <!-- ABOUT SECTION [02/05] -->
    <section class="about section" id="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Sobre o Projeto</h2>
                <p class="section-subtitle">Uma jornada de descoberta e responsabilidade.</p>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <p>
                        "A Culpa é das Ovelhas" é mais do que um site; é um movimento. 
                        Nascido da necessidade de trazer à luz verdades profundas e esquecidas, 
                        o projeto combina pesquisa teológica rigorosa com tecnologia de ponta 
                        para oferecer uma nova perspectiva sobre as escrituras e a nossa 
                        responsabilidade no mundo.
                    </p>
                    <a href="<?php echo esc_url(aco_get_page_link('o-autor', '/o-autor')); ?>" class="btn btn--link">
                        Conheça o Autor
                    </a>
                </div>
                <div class="about-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-placeholder.jpg" alt="Sobre o Projeto">
                </div>
            </div>
        </div>
    </section>

    <!-- BIBLE SYSTEM SECTION [03/05] -->
    <section class="bible-system section" id="bible-system">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Bíblia Nova Belém AN Study</h2>
                <p class="section-subtitle">Tradução Literal Rígida dos Códices.</p>
            </div>
            <div class="bible-system-content">
                <p>
                    Acesse nossa ferramenta de estudo bíblico, com uma tradução inovadora 
                    e fiel aos manuscritos originais. Uma experiência de leitura e pesquisa 
                    sem precedentes para quem busca a verdade sem filtros.
                </p>
                <a href="<?php echo esc_url(aco_get_page_link('biblia', '/biblia')); ?>" class="btn btn--primary">
                    Acessar o Sistema Bíblico
                </a>
            </div>
        </div>
    </section>

    <!-- ARTICLES SECTION [04/05] -->
    <section class="articles section" id="articles">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Artigos Recentes</h2>
                <p class="section-subtitle">Reflexões e descobertas do nosso autor.</p>
            </div>
            <div class="articles-grid">
                <?php
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ));
                ?>
                <?php if ($recent_posts->have_posts()) : ?>
                    <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                        <article class="article-card">
                            <div class="article-card-content">
                                <h3 class="article-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="article-card-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn btn--link">Leia Mais</a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>Nenhum artigo encontrado.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION SECTION [05/05] -->
    <section class="cta section" id="cta">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Faça Parte da Mudança</h2>
                <p class="cta-text">
                    Sua jornada de descoberta começa agora. Explore, questione e junte-se a nós.
                </p>
                <a href="<?php echo esc_url(aco_get_page_link('manifesto', '/manifesto')); ?>" class="btn btn--primary">
                    Leia o Manifesto
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
