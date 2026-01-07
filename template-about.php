<?php
/**
 * Template Name: Página Nosotros (Professional About)
 * Description: Premium layout for About Us page with instructors CPT integration.
 * 
 * @package Academia_Pro
 */

get_header(); ?>

<main id="main" class="site-main about-page">
    
    <!-- Hero Section -->
    <?php 
    $hero_title = get_theme_mod('academia_about_hero_title', 'Nuestra Misión: Empoderar a los Emprendedores del Futuro');
    ?>
    <section class="about-hero">
        <div class="about-hero-background">
            <div class="hero-overlay"></div>
            <div class="hero-pattern"></div>
        </div>
        <div class="container">
            <div class="about-hero-content animate-on-scroll fade-in">
                <nav class="breadcrumb-nav">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Inicio', 'academia-pro'); ?></a>
                    <span class="separator">/</span>
                    <span class="current"><?php the_title(); ?></span>
                </nav>
                <h1 class="about-hero-title"><?php echo esc_html($hero_title); ?></h1>
            </div>
        </div>
    </section>

    <!-- Academy Story Section -->
    <?php 
    $history_title = get_theme_mod('academia_about_history_title', 'Nuestra Historia');
    $history_content = get_theme_mod('academia_about_history_content', 'Emprende Sin Límites nace con una visión clara: democratizar el acceso a la educación de marketing y ventas de alto nivel.');
    $history_image = get_theme_mod('academia_about_history_image');
    if (empty($history_image)) {
        $history_image = get_stylesheet_directory_uri() . '/assets/images/about-history-placeholder.jpg';
    }
    ?>
    <section class="academy-history section">
        <div class="container">
            <div class="history-grid">
                <div class="history-image-wrapper animate-on-scroll slide-in-left">
                    <div class="image-frame">
                        <img src="<?php echo esc_url($history_image); ?>" alt="Nuestra Historia" class="history-img">
                        <div class="image-accent"></div>
                    </div>
                </div>
                <div class="history-text animate-on-scroll fade-in">
                    <span class="section-badge">Sobre Nosotros</span>
                    <h2 class="section-title"><?php echo esc_html($history_title); ?></h2>
                    <div class="section-content">
                        <?php echo wpautop(esc_html($history_content)); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instructors Section -->
    <section class="instructors-section section bg-gray">
        <div class="container">
            <div class="section-header text-center animate-on-scroll fade-in">
                <span class="section-badge">Equipo Experto</span>
                <h2 class="section-title">Nuestros Instructores</h2>
                <p class="section-description">
                    Profesionales en activo que combinan experiencia real con una metodología clara y pasión por enseñar.
                </p>
            </div>

            <?php
            $instructors_query = new WP_Query(array(
                'post_type' => 'instructor',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
            ));

            if ($instructors_query->have_posts()) : ?>
                <div class="instructors-grid">
                    <?php while ($instructors_query->have_posts()) : $instructors_query->the_post(); 
                        $thumbnail_id = get_post_thumbnail_id();
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                        if (!$thumbnail_url) {
                            $thumbnail_url = get_stylesheet_directory_uri() . '/assets/images/instructor-placeholder.jpg';
                        }
                    ?>
                        <div class="instructor-card animate-on-scroll fade-in" data-instructor-id="<?php the_ID(); ?>">
                            <div class="instructor-image">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                <div class="instructor-overlay">
                                    <button class="btn btn-primary btn-sm open-instructor-modal">Ver Perfil</button>
                                </div>
                            </div>
                            <div class="instructor-info">
                                <h3 class="instructor-name"><?php the_title(); ?></h3>
                                <div class="instructor-role"><?php the_excerpt(); ?></div>
                            </div>
                            
                            <!-- Hidden Modal Content -->
                            <div id="instructor-modal-content-<?php the_ID(); ?>" class="instructor-modal-data" style="display:none;">
                                <div class="modal-instructor-header">
                                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                    <div class="header-text">
                                        <h3><?php the_title(); ?></h3>
                                        <p class="role"><?php echo strip_tags(get_the_excerpt()); ?></p>
                                    </div>
                                </div>
                                <div class="modal-instructor-body">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <p class="text-center">Próximamente estaremos presentando a nuestro equipo docente.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Sponsors Section -->
    <?php 
    $sponsors_title = get_theme_mod('academia_about_sponsors_title', 'Impulsados por los Mejores');
    $sponsor_logo_size = get_theme_mod('academia_about_sponsor_logo_size', 60);
    ?>
    <section class="sponsors-section section">
        <div class="container">
            <h2 class="sponsors-title text-center animate-on-scroll fade-in"><?php echo esc_html($sponsors_title); ?></h2>
            <div class="sponsors-grid animate-on-scroll fade-in" style="--sponsor-logo-size: <?php echo esc_attr($sponsor_logo_size); ?>px;">
                <?php 
                for ($i = 1; $i <= 10; $i++) :
                    $sponsor_logo = get_theme_mod('academia_about_sponsor_' . $i);
                    if ($sponsor_logo) : ?>
                         <div class="sponsor-item">
                             <img src="<?php echo esc_url($sponsor_logo); ?>" alt="Patrocinador <?php echo $i; ?>">
                         </div>
                    <?php endif;
                endfor; 
                ?>
            </div>
        </div>
    </section>

    <!-- Modal for Instructor Details -->
    <div id="instructor-modal" class="modal">
        <div class="modal-backdrop"></div>
        <div class="modal-container">
            <button class="modal-close">&times;</button>
            <div id="modal-content-placeholder"></div>
        </div>
    </div>

</main>

<?php get_footer(); ?>
