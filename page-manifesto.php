<?php
/**
 * Template: Manifesto
 * Design: CoreNest Inspired
 */
get_header();
?>

<section class="page-hero">
    <div class="container container--narrow">
        <div class="section-indicator" style="justify-content: center; position: relative; top: auto; left: auto; margin-bottom: 2rem;">
            <span class="section-number">[MANIFESTO]</span>
        </div>
        <h1 class="display-lg">O Manifesto</h1>
        <p>A declaracao fundamental sobre verdade, responsabilidade e despertar</p>
    </div>
</section>

<section class="page-content" style="background: var(--bg-secondary);">
    <div class="container container--narrow">
        <article style="font-size: 1.125rem; line-height: 2; color: var(--text-secondary);">
            
            <h2 style="color: var(--text-primary); margin: 3rem 0 1.5rem; font-size: 1.75rem;">A Culpa e das Ovelhas</h2>
            
            <p style="margin-bottom: 1.5rem;">
                Durante muito tempo, acreditamos que a responsabilidade estava apenas nas maos daqueles que lideram. 
                Que os pastores, os governantes, os que detem o poder eram os unicos culpados pelas mazelas do rebanho.
            </p>
            
            <p style="margin-bottom: 1.5rem;">
                Mas ha uma verdade incomoda que precisa ser revelada: <strong style="color: var(--text-primary);">a culpa tambem e das ovelhas</strong>.
            </p>
            
            <p style="margin-bottom: 1.5rem;">
                Cada um de nos carrega responsabilidade civil e espiritual por suas escolhas. 
                Por seguir cegamente. Por nao questionar. Por preferir o conforto da ignorancia 
                ao desconforto da verdade.
            </p>
            
            <blockquote style="border-left: 3px solid var(--text-muted); padding-left: 1.5rem; margin: 2rem 0; font-style: italic;">
                "O meu povo foi destruido, porque lhe faltou o conhecimento."
                <cite style="display: block; margin-top: 0.5rem; font-size: 0.875rem; color: var(--text-muted);">— Oseias 4:6</cite>
            </blockquote>
            
            <h2 style="color: var(--text-primary); margin: 3rem 0 1.5rem; font-size: 1.75rem;">O Despertar</h2>
            
            <p style="margin-bottom: 1.5rem;">
                Este manifesto nao e uma acusacao. E um convite ao despertar. 
                Uma chamada para aqueles que tem ouvidos para ouvir e olhos para ver.
            </p>
            
            <p style="margin-bottom: 1.5rem;">
                Voce nao pode mais dizer que nao sabia. A partir de agora, 
                a responsabilidade e sua.
            </p>
            
            <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border-color);">
                <a href="<?php echo esc_url(home_url('/o-livrinho')); ?>" class="btn btn--primary">
                    Baixar O Livrinho →
                </a>
            </div>
            
        </article>
    </div>
</section>

<?php get_footer(); ?>
