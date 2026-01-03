<?php
/**
 * Template Name: Plantilla General (Gutenberg)
 * 
 * Template for general pages with full Gutenberg support and premium header.
 * 
 * @package Academia_Pro
 */

get_header(); ?>

<main id="main" class="site-main general-page">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Page Header -->
        <header class="page-header">
            <div class="page-header-background">
                <div class="header-overlay"></div>
                <div class="header-pattern"></div>
            </div>
            
            <div class="container">
                <div class="header-content animate-on-scroll fade-in">
                    <nav class="breadcrumb-nav">
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Inicio', 'academia-pro'); ?></a>
                        <span class="separator">/</span>
                        <span class="current"><?php the_title(); ?></span>
                    </nav>
                    
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    
                    <?php if (has_excerpt()) : ?>
                        <div class="page-subtitle">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <!-- Page Content Area -->
        <article id="post-<?php the_ID(); ?>" <?php post_class('entry-content-wrapper'); ?>>
            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Páginas:', 'academia-pro'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
        </article>

    <?php endwhile; ?>
</main>

<style>
/* Page Header Styles */
.general-page .page-header {
    position: relative;
    padding: 100px 0 60px;
    background: var(--color-primary);
    color: var(--color-white);
    overflow: hidden;
    margin-bottom: 60px;
}

.page-header-background {
    position: absolute;
    inset: 0;
    z-index: 0;
}

.header-overlay {
    position: absolute;
    inset: 0;
    background: var(--gradient-primary);
    opacity: 0.9;
}

.header-pattern {
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    opacity: 0.5;
}

.header-content {
    position: relative;
    z-index: 1;
    max-width: 800px;
}

.breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 16px;
    font-size: 14px;
    opacity: 0.9;
}

.breadcrumb-nav a {
    color: var(--color-white);
    text-decoration: none;
    transition: opacity 0.2s ease;
}

.breadcrumb-nav a:hover {
    opacity: 1;
    text-decoration: underline;
}

.breadcrumb-nav .separator {
    opacity: 0.5;
}

.page-title {
    font-size: 48px;
    font-weight: 800;
    margin: 0;
    line-height: 1.2;
}

.page-subtitle {
    margin-top: 16px;
    font-size: 18px;
    opacity: 0.9;
    line-height: 1.6;
}

/* Entry Content Styles */
.entry-content-wrapper {
    padding-bottom: 80px;
}

.entry-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Gutenberg Support Fixes */
.entry-content > .alignfull {
    margin-left: calc(50% - 50vw);
    margin-right: calc(50% - 50vw);
    max-width: 100vw;
    width: 100vw;
}

.entry-content > .alignwide {
    margin-left: calc(50% - 600px);
    margin-right: calc(50% - 600px);
    max-width: 1200px;
}

@media (max-width: 1240px) {
    .entry-content > .alignwide {
        margin-left: 0;
        margin-right: 0;
        max-width: 100%;
    }
}

@media (max-width: 768px) {
    .general-page .page-header {
        padding: 80px 0 40px;
    }
    
    .page-title {
        font-size: 32px;
    }
}
</style>

<?php get_footer(); ?>
