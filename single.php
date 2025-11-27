<?php get_header(); ?>

<main class="ms-main-content">
    <div class="ms-content-wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="ms-article" style="max-width: 800px; margin: 0 auto;">
                <header class="ms-page-header">
                    <div class="card-meta" style="margin-bottom: 1rem; display: flex; gap: 0.5rem; color: var(--text-muted);">
                        <span class="meta-date"><?php echo get_the_date('d M Y'); ?></span>
                        <span class="meta-separator">•</span>
                        <span class="meta-category"><?php the_category(', '); ?></span>
                        <span class="meta-separator">•</span>
                        <span class="read-time"><?php echo function_exists('otimiza_estimated_reading_time') ? otimiza_estimated_reading_time() : '5'; ?> min</span>
                    </div>
                    <h1><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="article-featured-image" style="margin-bottom: 2rem; border-radius: 1rem; overflow: hidden;">
                        <?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto;']); ?>
                    </div>
                <?php endif; ?>

                <div class="ms-article-content" style="font-size: 1.1rem; line-height: 1.8; color: var(--text-muted);">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>