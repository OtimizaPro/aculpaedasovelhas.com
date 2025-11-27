<?php
/**
 * Front Page Template - CoreNest Inspired Design
 * 
 * @package ACulpaEDasOvelhas
 */

get_header();
?>

<!-- HERO SECTION [01/05] -->
<section class="hero section" id="hero">
    <div class="section-indicator">
        <span class="section-number">[01/05]</span>
        <span class="section-label">HERO</span>
    </div>
    
    <div class="hero-content">
        <p class="hero-subtitle animate-fade-in-up">Revelacao & Responsabilidade Civil</p>
        
        <h1 class="display-xl hero-title animate-fade-in-up animate-delay-1">
            A Culpa e<br>das Ovelhas
        </h1>
        
        <p class="hero-description animate-fade-in-up animate-delay-2">
            Um manifesto sobre verdades ocultas, responsabilidade espiritual e o despertar 
            daqueles que tem ouvidos para ouvir.
        </p>
        
        <div class="hero-ctas animate-fade-in-up animate-delay-3">
            <a href="<?php echo esc_url(home_url('/manifesto')); ?>" class="btn btn--primary">
                Leia o Manifesto
            </a>
            <a href="<?php echo esc_url(home_url('/o-livrinho')); ?>" class="btn btn--outline">
                Baixar O Livrinho
            </a>
        </div>
    </div>
</section>

<!-- INTRO SECTION [02/05] -->
<section class="section section--auto intro-section" id="intro">
    <div class="section-indicator">
        <span class="section-number">[02/05]</span>
        <span class="section-label">INTRO</span>
    </div>
    
    <div class="container">
        <div class="intro-grid">
            <div class="intro-text">
                <h2 class="display-md">Por que as ovelhas?</h2>
                <p>
                    Durante seculos, fomos ensinados a seguir cegamente. A aceitar sem questionar. 
                    A confiar em sistemas que nos mantém adormecidos.
                </p>
                <p>
                    Este projeto nasceu da necessidade de revelar o que foi escondido. 
                    De trazer a luz verdades que libertam - para aqueles que estao prontos para ouvir.
                </p>
                <a href="<?php echo esc_url(home_url('/o-autor')); ?>" class="btn btn--ghost">
                    Conheca o Autor →
                </a>
            </div>
            <div class="intro-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/intro-image.jpg" 
                     alt="Revelacao" 
                     onerror="this.style.display='none'">
            </div>
        </div>
    </div>
</section>

<!-- MARQUEE -->
<div class="marquee-section">
    <div class="marquee-track">
        <span class="marquee-item">Revelacao</span>
        <span class="marquee-item">•</span>
        <span class="marquee-item">Responsabilidade</span>
        <span class="marquee-item">•</span>
        <span class="marquee-item">Verdade</span>
        <span class="marquee-item">•</span>
        <span class="marquee-item">Liberdade</span>
        <span class="marquee-item">•</span>
        <span class="marquee-item">Despertar</span>
        <span class="marquee-item">•</span>
        <span class="marquee-item">Revelacao</span>
        <span class="marquee-item">•</span>
        <span class="marquee-item">Responsabilidade</span>
        <span class="marquee-item">•</span>
        <span class="marquee-item">Verdade</span>
        <span class="marquee-item">•</span>
        <span class="marquee-item">Liberdade</span>
        <span class="marquee-item">•</span>
        <span class="marquee-item">Despertar</span>
        <span class="marquee-item">•</span>
    </div>
</div>

<!-- STACK SECTION [03/05] -->
<section class="section section--auto stack-section" id="stack">
    <div class="section-indicator">
        <span class="section-number">[03/05]</span>
        <span class="section-label">CONTEUDO</span>
    </div>
    
    <div class="container">
        <div class="stack-header">
            <h2 class="display-md">O que voce encontra aqui</h2>
            <p class="text-secondary">Recursos para sua jornada de descoberta</p>
        </div>
        
        <div class="stack-grid">
            <!-- Card 1: O Livrinho -->
            <a href="<?php echo esc_url(home_url('/o-livrinho')); ?>" class="stack-card">
                <div class="stack-card-icon">📖</div>
                <h3>O Livrinho</h3>
                <p>
                    O documento fundacional. Um guia compacto que revela as verdades essenciais 
                    sobre responsabilidade civil e espiritual.
                </p>
            </a>
            
            <!-- Card 2: Biblia Online -->
            <a href="<?php echo esc_url(home_url('/biblia')); ?>" class="stack-card">
                <div class="stack-card-icon">📜</div>
                <h3>Biblia Online</h3>
                <p>
                    Acesse as Escrituras com comentarios e estudos que revelam significados 
                    ocultos e conexoes profundas.
                </p>
            </a>
            
            <!-- Card 3: Artigos -->
            <a href="<?php echo esc_url(home_url('/artigos')); ?>" class="stack-card">
                <div class="stack-card-icon">✍️</div>
                <h3>Artigos</h3>
                <p>
                    Reflexoes, analises e revelacoes sobre temas que impactam nossa 
                    compreensao do mundo e de nos mesmos.
                </p>
            </a>
        </div>
    </div>
</section>

<!-- VISION SECTION [04/05] -->
<section class="section vision-section" id="vision">
    <div class="section-indicator">
        <span class="section-number">[04/05]</span>
        <span class="section-label">VISAO</span>
    </div>
    
    <div class="container">
        <div class="vision-content">
            <h2 class="display-md">Para os que tem<br>ouvidos para ouvir</h2>
            <p>
                Este nao e um projeto para todos. E para aqueles que sentem que algo esta errado. 
                Para os que questionam. Para os que buscam alem das aparencias.
            </p>
            <p>
                Se voce chegou ate aqui, talvez seja hora de descobrir o que esta por tras 
                do veu que cobre nossos olhos.
            </p>
            <a href="<?php echo esc_url(home_url('/manifesto')); ?>" class="btn btn--outline">
                Leia o Manifesto Completo
            </a>
        </div>
    </div>
</section>

<!-- LATEST POSTS [05/05] -->
<section class="section section--auto" id="posts" style="background: var(--bg-secondary);">
    <div class="section-indicator">
        <span class="section-number">[05/05]</span>
        <span class="section-label">ARTIGOS</span>
    </div>
    
    <div class="container">
        <div class="stack-header">
            <h2 class="display-md">Ultimas publicacoes</h2>
            <p class="text-secondary">Reflexoes e revelacoes recentes</p>
        </div>
        
        <div class="cards-grid">
            <?php
            $recent_posts = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));
            
            if ($recent_posts->have_posts()) :
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>
            <article class="card">
                <?php if (has_post_thumbnail()) : ?>
                <div class="card-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <?php endif; ?>
                
                <div class="card-body">
                    <div class="card-meta">
                        <?php echo get_the_date('d M Y'); ?>
                    </div>
                    <h3 class="card-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="card-excerpt">
                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                    </p>
                </div>
            </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Em breve</h3>
                    <p class="card-excerpt">Novos artigos estao sendo preparados. Volte em breve!</p>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        <div style="text-align: center; margin-top: 3rem;">
            <a href="<?php echo esc_url(home_url('/artigos')); ?>" class="btn btn--outline">
                Ver todos os artigos
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
