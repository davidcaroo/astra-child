<?php
/**
 * Emprende Sin Límites - Astra Child Theme Functions
 * 
 * @package Academia_Pro
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('ACADEMIA_VERSION', '1.0.2');
define('ACADEMIA_THEME_DIR', get_stylesheet_directory());
define('ACADEMIA_THEME_URI', get_stylesheet_directory_uri());

/**
 * Enqueue parent and child theme styles
 */
function academia_enqueue_styles() {
    // Enqueue parent theme style
    wp_enqueue_style('astra-parent-style', get_template_directory_uri() . '/style.css', array(), ACADEMIA_VERSION);
    
    // Enqueue child theme style
    wp_enqueue_style('academia-style', get_stylesheet_uri(), array('astra-parent-style'), ACADEMIA_VERSION);
    
    // Enqueue global styles
    wp_enqueue_style('academia-global', ACADEMIA_THEME_URI . '/assets/css/global.css', array('academia-style'), ACADEMIA_VERSION);
    
    // Enqueue utilities styles
    wp_enqueue_style('academia-utilities', ACADEMIA_THEME_URI . '/assets/css/utilities.css', array('academia-global'), ACADEMIA_VERSION);
    
    // Enqueue layout fixes
    wp_enqueue_style('academia-layout-fixes', ACADEMIA_THEME_URI . '/assets/css/layout-fixes.css', array('academia-utilities'), ACADEMIA_VERSION);
    
    // Enqueue Google Fonts
    wp_enqueue_style('academia-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap', array(), null);

    // Enqueue About page assets
    if (is_page_template('template-about.php')) {
        wp_enqueue_style('academia-about', ACADEMIA_THEME_URI . '/assets/css/about.css', array('academia-layout-fixes'), ACADEMIA_VERSION);
        wp_enqueue_script('academia-about-js', ACADEMIA_THEME_URI . '/assets/js/about.js', array('jquery'), ACADEMIA_VERSION, true);
    }
}
add_action('wp_enqueue_scripts', 'academia_enqueue_styles', 15);

/**
 * Enqueue theme scripts
 */
function academia_enqueue_scripts() {
    // Enqueue main JavaScript file
    wp_enqueue_script('academia-main', ACADEMIA_THEME_URI . '/assets/js/main.js', array('jquery'), ACADEMIA_VERSION, true);
    
    // Localize script for AJAX
    wp_localize_script('academia-main', 'academiaData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('academia_nonce'),
        'themeUri' => ACADEMIA_THEME_URI
    ));
}
add_action('wp_enqueue_scripts', 'academia_enqueue_scripts');

/**
 * Theme setup
 */
function academia_theme_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'academia-pro'),
        'footer_links' => __('Footer - Enlaces Rápidos', 'academia-pro'),
        'footer_categories' => __('Footer - Categorías', 'academia-pro'),
    ));
}
add_action('after_setup_theme', 'academia_theme_setup');

/**
 * Add Customizer settings for Hero Section
 */
function academia_customize_register($wp_customize) {
    // Add Hero Section
    $wp_customize->add_section('academia_hero_section', array(
        'title'    => __('Sección Hero', 'academia-pro'),
        'priority' => 30,
    ));

    // Hero Badge Text
    $wp_customize->add_setting('academia_hero_badge_text', array(
        'default'           => '#1 en Emprendimiento Digital',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_hero_badge_text', array(
        'label'    => __('Texto del Badge del Hero', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'text',
    ));

    // Hero Title
    $wp_customize->add_setting('academia_hero_title', array(
        'default'           => 'Crece Inteligente: Emprendimiento con Propósito y Estrategia',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_hero_title', array(
        'label'    => __('Título del Hero', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'text',
    ));

    // Hero Description
    $wp_customize->add_setting('academia_hero_description', array(
        'default'           => 'Certificación gratuita por <a href="https://escuelaplika.com/" target="_blank" class="aplika-link"><img src="' . get_stylesheet_directory_uri() . '/assets/images/aplika-logo.png" alt="Aplika" class="aplika-logo-inline"></a> Formación integral para emprendedores que buscan impacto real, estrategia de negocio y crecimiento sostenible.',
        'sanitize_callback' => 'wp_kses_post', // Changed to allow HTML in description
    ));

    $wp_customize->add_control('academia_hero_description', array(
        'label'    => __('Descripción del Hero (soporta HTML)', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'textarea',
    ));

    // Hero Primary Button Text
    $wp_customize->add_setting('academia_hero_primary_btn_text', array(
        'default'           => 'Inscribirme Gratis',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_hero_primary_btn_text', array(
        'label'    => __('Texto Botón Primario', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'text',
    ));

    // Hero Primary Button Link
    $wp_customize->add_setting('academia_hero_primary_btn_link', array(
        'default'           => 'https://docs.google.com/forms/d/e/1FAIpQLSffLNmhX5l172AwtWo_ZVty_1k_yAwnWMtErTY4ALjAVcC2Sw/viewform',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('academia_hero_primary_btn_link', array(
        'label'    => __('Link Botón Primario', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'url',
    ));

    // Hero Secondary Button Text
    $wp_customize->add_setting('academia_hero_secondary_btn_text', array(
        'default'           => 'Ver Módulos',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_hero_secondary_btn_text', array(
        'label'    => __('Texto Botón Secundario', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'text',
    ));

    // Hero Secondary Button Link
    $wp_customize->add_setting('academia_hero_secondary_btn_link', array(
        'default'           => '#curriculum',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('academia_hero_secondary_btn_link', array(
        'label'    => __('Link Botón Secundario', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'url',
    ));

    // --- Inscription CTA Section ---
    $wp_customize->add_section('academia_inscription_section', array(
        'title'    => __('Sección Inscripción CTA', 'academia-pro'),
        'priority' => 32,
    ));

    // Show/Hide Inscription Section
    $wp_customize->add_setting('academia_inscription_show', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));

    $wp_customize->add_control('academia_inscription_show', array(
        'label'    => __('Mostrar Sección de Inscripción', 'academia-pro'),
        'section'  => 'academia_inscription_section',
        'type'     => 'checkbox',
    ));

    // Inscription Badge Text
    $wp_customize->add_setting('academia_inscription_badge', array(
        'default'           => 'Primer Paso Obligatorio',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_inscription_badge', array(
        'label'    => __('Texto del Badge', 'academia-pro'),
        'section'  => 'academia_inscription_section',
        'type'     => 'text',
    ));

    // Inscription Title
    $wp_customize->add_setting('academia_inscription_title', array(
        'default'           => 'Caracterización e Inscripción Académica',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_inscription_title', array(
        'label'    => __('Título Principal', 'academia-pro'),
        'section'  => 'academia_inscription_section',
        'type'     => 'text',
    ));

    // Inscription Description
    $wp_customize->add_setting('academia_inscription_description', array(
        'default'           => 'Antes de acceder a nuestros cursos, es fundamental realizar tu proceso de caracterización. Esto nos permite conocer tu perfil y brindarte una ruta de aprendizaje optimizada para tu éxito profesional.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('academia_inscription_description', array(
        'label'    => __('Descripción', 'academia-pro'),
        'section'  => 'academia_inscription_section',
        'type'     => 'textarea',
    ));

    // Benefit 1
    $wp_customize->add_setting('academia_inscription_benefit_1', array(
        'default'           => 'Perfilado profesional personalizado',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_inscription_benefit_1', array(
        'label'    => __('Beneficio 1', 'academia-pro'),
        'section'  => 'academia_inscription_section',
        'type'     => 'text',
    ));

    // Benefit 2
    $wp_customize->add_setting('academia_inscription_benefit_2', array(
        'default'           => 'Acceso prioritario a nuevas convocatorias',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_inscription_benefit_2', array(
        'label'    => __('Beneficio 2', 'academia-pro'),
        'section'  => 'academia_inscription_section',
        'type'     => 'text',
    ));

    // Benefit 3
    $wp_customize->add_setting('academia_inscription_benefit_3', array(
        'default'           => 'Asesoría inicial sin costo',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_inscription_benefit_3', array(
        'label'    => __('Beneficio 3', 'academia-pro'),
        'section'  => 'academia_inscription_section',
        'type'     => 'text',
    ));

    // Button Text
    $wp_customize->add_setting('academia_inscription_button_text', array(
        'default'           => 'Completar Inscripción Ahora',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_inscription_button_text', array(
        'label'    => __('Texto del Botón', 'academia-pro'),
        'section'  => 'academia_inscription_section',
        'type'     => 'text',
    ));

    // Button URL
    $wp_customize->add_setting('academia_inscription_button_url', array(
        'default'           => 'https://docs.google.com/forms/d/e/1FAIpQLSffLNmhX5l172AwtWo_ZVty_1k_yAwnWMtErTY4ALjAVcC2Sw/viewform',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('academia_inscription_button_url', array(
        'label'    => __('URL del Botón', 'academia-pro'),
        'section'  => 'academia_inscription_section',
        'type'     => 'url',
    ));

    // Inscription Image
    $wp_customize->add_setting('academia_inscription_image', array(
        'default'           => get_stylesheet_directory_uri() . '/assets/images/inscription-visual.png',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'academia_inscription_image', array(
        'label'    => __('Imagen de Inscripción', 'academia-pro'),
        'section'  => 'academia_inscription_section',
        'settings' => 'academia_inscription_image',
    )));

    // --- CTA Section ---
    $wp_customize->add_section('academia_cta_section', array(
        'title'    => __('Sección CTA (Final)', 'academia-pro'),
        'priority' => 35,
    ));

    // CTA Title
    $wp_customize->add_setting('academia_cta_title', array(
        'default'           => 'Comienza Tu Transformación con Crece Inteligente',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_cta_title', array(
        'label'    => __('Título CTA', 'academia-pro'),
        'section'  => 'academia_cta_section',
        'type'     => 'text',
    ));

    // CTA Primary Button Text
    $wp_customize->add_setting('academia_cta_primary_btn_text', array(
        'default'           => 'Inscribirme Gratis Hoy',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_cta_primary_btn_text', array(
        'label'    => __('Texto Botón Primario', 'academia-pro'),
        'section'  => 'academia_cta_section',
        'type'     => 'text',
    ));

    // CTA Primary Button Link
    $wp_customize->add_setting('academia_cta_primary_btn_link', array(
        'default'           => 'https://docs.google.com/forms/d/e/1FAIpQLSffLNmhX5l172AwtWo_ZVty_1k_yAwnWMtErTY4ALjAVcC2Sw/viewform',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('academia_cta_primary_btn_link', array(
        'label'    => __('Link Botón Primario', 'academia-pro'),
        'section'  => 'academia_cta_section',
        'type'     => 'url',
    ));

    // --- Footer Section ---
    $wp_customize->add_section('academia_footer_section', array(
        'title'    => __('Sección Footer', 'academia-pro'),
        'priority' => 40,
    ));

    // Footer Description
    $wp_customize->add_setting('academia_footer_description', array(
        'default'           => 'Transformando vidas a través de educación online de calidad en marketing, ventas y emprendimiento. Sin límites para tu crecimiento.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('academia_footer_description', array(
        'label'    => __('Descripción del Footer', 'academia-pro'),
        'section'  => 'academia_footer_section',
        'type'     => 'textarea',
    ));

    // Social Links
    $socials = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter (X)',
        'linkedin'  => 'LinkedIn',
        'instagram' => 'Instagram',
    );

    foreach ($socials as $id => $label) {
        $wp_customize->add_setting('academia_footer_social_' . $id, array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('academia_footer_social_' . $id, array(
            'label'    => sprintf(__('URL de %s', 'academia-pro'), $label),
            'section'  => 'academia_footer_section',
            'type'     => 'url',
        ));
    }

    // Contact Info
    $wp_customize->add_setting('academia_footer_email', array(
        'default'           => 'info@emprendesinlimites.co',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('academia_footer_email', array(
        'label'    => __('Email de Contacto', 'academia-pro'),
        'section'  => 'academia_footer_section',
        'type'     => 'email',
    ));

    $wp_customize->add_setting('academia_footer_phone', array(
        'default'           => '+1 (234) 567-890',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_footer_phone', array(
        'label'    => __('Teléfono de Contacto', 'academia-pro'),
        'section'  => 'academia_footer_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('academia_footer_hours', array(
        'default'           => 'Lun - Vie: 9:00 - 18:00',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_footer_hours', array(
        'label'    => __('Horarios de Atención', 'academia-pro'),
        'section'  => 'academia_footer_section',
        'type'     => 'text',
    ));

    // --- About Page Section ---
    $wp_customize->add_section('academia_about_section', array(
        'title'    => __('Página Nosotros', 'academia-pro'),
        'priority' => 45,
    ));

    // About Hero Title
    $wp_customize->add_setting('academia_about_hero_title', array(
        'default'           => 'Nuestra Misión: Empoderar a los Emprendedores del Futuro',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_about_hero_title', array(
        'label'    => __('Título Hero About', 'academia-pro'),
        'section'  => 'academia_about_section',
        'type'     => 'text',
    ));

    // About History Title
    $wp_customize->add_setting('academia_about_history_title', array(
        'default'           => 'Nuestra Historia',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_about_history_title', array(
        'label'    => __('Título Historia', 'academia-pro'),
        'section'  => 'academia_about_section',
        'type'     => 'text',
    ));

    // About History Content
    $wp_customize->add_setting('academia_about_history_content', array(
        'default'           => 'Emprende Sin Límites nace con una visión clara: democratizar el acceso a la educación de marketing y ventas de alto nivel para toda la comunidad hispanoahablante.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('academia_about_history_content', array(
        'label'    => __('Contenido Historia', 'academia-pro'),
        'section'  => 'academia_about_section',
        'type'     => 'textarea',
    ));

    // About History Image
    $wp_customize->add_setting('academia_about_history_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'academia_about_history_image', array(
        'label'    => __('Imagen Historia', 'academia-pro'),
        'section'  => 'academia_about_section',
    )));

    // Sponsors Title
    $wp_customize->add_setting('academia_about_sponsors_title', array(
        'default'           => 'Impulsados por los Mejores',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_about_sponsors_title', array(
        'label'    => __('Título Patrocinadores', 'academia-pro'),
        'section'  => 'academia_about_section',
        'type'     => 'text',
    ));

    // Sponsor Logos (1-10)
    for ($i = 1; $i <= 10; $i++) {
        $wp_customize->add_setting('academia_about_sponsor_' . $i, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'academia_about_sponsor_' . $i, array(
            'label'    => sprintf(__('Logo Patrocinador %d', 'academia-pro'), $i),
             'section'  => 'academia_about_section',
        )));
    }

    // Sponsor Logo Size Slider
    $wp_customize->add_setting('academia_about_sponsor_logo_size', array(
        'default'           => 60,
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('academia_about_sponsor_logo_size', array(
        'label'    => __('Tamaño de Logos (PX)', 'academia-pro'),
        'section'  => 'academia_about_section',
        'type'     => 'range',
        'input_attrs' => array(
            'min'  => 30,
            'max'  => 180,
            'step' => 1,
        ),
    ));
}
add_action('customize_register', 'academia_customize_register');

/**
 * Register widget areas
 */
function academia_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Column 1', 'academia-pro'),
        'id' => 'footer-1',
        'description' => __('Add widgets here to appear in footer column 1.', 'academia-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Column 2', 'academia-pro'),
        'id' => 'footer-2',
        'description' => __('Add widgets here to appear in footer column 2.', 'academia-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Column 3', 'academia-pro'),
        'id' => 'footer-3',
        'description' => __('Add widgets here to appear in footer column 3.', 'academia-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Column 4', 'academia-pro'),
        'id' => 'footer-4',
        'description' => __('Add widgets here to appear in footer column 4.', 'academia-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'academia_widgets_init');

/**
 * Custom excerpt length
 */
function academia_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'academia_excerpt_length');

/**
 * Custom excerpt more
 */
function academia_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'academia_excerpt_more');

/**
 * Add custom body classes
 */
function academia_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'academia-home';
    }
    return $classes;
}
add_filter('body_class', 'academia_body_classes');

/**
 * Include Sensei LMS integration
 */
if (file_exists(ACADEMIA_THEME_DIR . '/inc/sensei-integration.php')) {
    require_once ACADEMIA_THEME_DIR . '/inc/sensei-integration.php';
}

/**
 * Shortcode: Display Sensei Courses
 * Usage: [esl_courses count="3" category="marketing" orderby="date" columns="3"]
 */
function esl_courses_shortcode($atts) {
    // Parse attributes
    $atts = shortcode_atts(array(
        'count' => 6,
        'category' => '',
        'orderby' => 'date',
        'order' => 'DESC',
        'columns' => 3,
    ), $atts, 'esl_courses');
    
    // Check if Sensei is active
    if (!function_exists('esl_is_sensei_active') || !esl_is_sensei_active()) {
        return '<p class="esl-notice">Sensei LMS no está activo. Por favor, instala y activa el plugin.</p>';
    }
    
    // Build query args
    $query_args = array(
        'posts_per_page' => intval($atts['count']),
        'orderby' => sanitize_text_field($atts['orderby']),
        'order' => sanitize_text_field($atts['order']),
    );
    
    // Add category filter if specified
    if (!empty($atts['category'])) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'course-category',
                'field' => 'slug',
                'terms' => sanitize_text_field($atts['category']),
            ),
        );
    }
    
    // Get courses
    $courses_query = esl_get_sensei_courses($query_args);
    
    if (!$courses_query || !$courses_query->have_posts()) {
        return '<p class="esl-notice">No se encontraron cursos.</p>';
    }
    
    // Determine grid columns class
    $columns = intval($atts['columns']);
    $columns_class = 'esl-grid-cols-' . min(max($columns, 1), 4);
    
    // Start output buffering
    ob_start();
    ?>
    
    <div class="esl-courses-shortcode <?php echo esc_attr($columns_class); ?>">
        <?php while ($courses_query->have_posts()) : $courses_query->the_post(); ?>
            <?php
            $course_id = get_the_ID();
            $course_data = esl_get_formatted_course_data($course_id);
            ?>
            
            <div class="esl-course-card">
                <div class="esl-course-image">
                    <?php if (!empty($course_data['thumbnail'])) : ?>
                        <img src="<?php echo esc_url($course_data['thumbnail']); ?>" alt="<?php echo esc_attr($course_data['title']); ?>">
                    <?php endif; ?>
                    
                    <?php if ($course_data['is_enrolled']) : ?>
                        <span class="esl-badge esl-badge-enrolled">Inscrito</span>
                    <?php elseif ($course_data['has_certificate']) : ?>
                        <span class="esl-badge esl-badge-certificate">Certificado</span>
                    <?php endif; ?>
                </div>
                
                <div class="esl-course-content">
                    <h3 class="esl-course-title">
                        <a href="<?php echo esc_url($course_data['permalink']); ?>">
                            <?php echo esc_html($course_data['title']); ?>
                        </a>
                    </h3>
                    
                    <p class="esl-course-excerpt">
                        <?php echo esc_html(wp_trim_words($course_data['excerpt'], 12)); ?>
                    </p>
                    
                    <div class="esl-course-meta">
                        <span><?php echo esc_html($course_data['difficulty']); ?></span>
                        <span><?php echo esc_html($course_data['duration']); ?></span>
                    </div>
                    
                    <div class="esl-course-footer">
                        <span class="esl-price"><?php echo wp_kses_post($course_data['price']); ?></span>
                        <a href="<?php echo esc_url($course_data['enrollment_url']); ?>" class="btn btn-primary btn-sm">
                            <?php echo $course_data['is_enrolled'] ? 'Continuar' : 'Ver Curso'; ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    
    <style>
    .esl-courses-shortcode {
        display: grid;
        gap: 24px;
        margin: 32px 0;
    }
    
    .esl-grid-cols-1 { grid-template-columns: 1fr; }
    .esl-grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
    .esl-grid-cols-3 { grid-template-columns: repeat(3, 1fr); }
    .esl-grid-cols-4 { grid-template-columns: repeat(4, 1fr); }
    
    .esl-course-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .esl-course-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    }
    
    .esl-course-image {
        position: relative;
        height: 200px;
        overflow: hidden;
    }
    
    .esl-course-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .esl-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        padding: 4px 12px;
        font-size: 12px;
        font-weight: 600;
        border-radius: 4px;
        color: #fff;
    }
    
    .esl-badge-enrolled { background: #10b981; }
    .esl-badge-certificate { background: #0066FF; }
    
    .esl-course-content {
        padding: 20px;
    }
    
    .esl-course-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 12px;
    }
    
    .esl-course-title a {
        color: #1e293b;
        text-decoration: none;
    }
    
    .esl-course-title a:hover {
        color: #0066FF;
    }
    
    .esl-course-excerpt {
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 16px;
    }
    
    .esl-course-meta {
        display: flex;
        gap: 12px;
        font-size: 13px;
        color: #64748b;
        margin-bottom: 16px;
        padding-top: 16px;
        border-top: 1px solid #e2e8f0;
    }
    
    .esl-course-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .esl-price {
        font-size: 20px;
        font-weight: 800;
        color: #0066FF;
    }
    
    .esl-notice {
        padding: 16px 24px;
        background: #fef3c7;
        border-left: 4px solid #f59e0b;
        border-radius: 8px;
        color: #92400e;
        margin: 24px 0;
    }
    
    @media (max-width: 1024px) {
        .esl-grid-cols-4,
        .esl-grid-cols-3 {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 640px) {
        .esl-courses-shortcode {
            grid-template-columns: 1fr !important;
        }
    }
    </style>
    
    <?php
    return ob_get_clean();
}
add_shortcode('esl_courses', 'esl_courses_shortcode');

add_action( 'astra_header_after', function () {
    echo '<div style="background:red;color:white;padding:10px;text-align:center">
            HEADER ASTRA HOOK FUNCIONANDO
          </div>';
});

/**
 * Register Instructors Custom Post Type
 */
function academia_register_instructors_cpt() {
    $labels = array(
        'name'                  => _x('Instructores', 'Post Type General Name', 'academia-pro'),
        'singular_name'         => _x('Instructor', 'Post Type Singular Name', 'academia-pro'),
        'menu_name'             => __('Instructores', 'academia-pro'),
        'name_admin_bar'        => __('Instructor', 'academia-pro'),
        'all_items'             => __('Todos los Instructores', 'academia-pro'),
        'add_new_item'          => __('Añadir Nuevo Instructor', 'academia-pro'),
        'add_new'               => __('Añadir Nuevo', 'academia-pro'),
        'edit_item'             => __('Editar Instructor', 'academia-pro'),
        'update_item'           => __('Actualizar Instructor', 'academia-pro'),
        'featured_image'        => __('Foto de Perfil', 'academia-pro'),
        'set_featured_image'    => __('Asignar foto de perfil', 'academia-pro'),
        'remove_featured_image' => __('Eliminar foto de perfil', 'academia-pro'),
        'use_featured_image'    => __('Usar como foto de perfil', 'academia-pro'),
    );
    $args = array(
        'label'                 => __('Instructor', 'academia-pro'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-businessman',
        'has_archive'           => false,
        'show_in_rest'          => true,
    );
    register_post_type('instructor', $args);
}
add_action('init', 'academia_register_instructors_cpt', 0);

/**
 * ==========================================
 * Personalización del Login y Registro
 * ==========================================
 */

/**
 * 1. Cargar hoja de estilos personalizada para el login
 */
function academia_login_styles() {
    wp_enqueue_style( 
        'academia-login-style', 
        get_stylesheet_directory_uri() . '/assets/css/login-custom.css', 
        array(), 
        ACADEMIA_VERSION 
    );
}
add_action('login_enqueue_scripts', 'academia_login_styles');

/**
 * 2. Cambiar la URL del logo (al Home)
 */
function academia_login_header_url() {
    return home_url();
}
add_filter('login_headerurl', 'academia_login_header_url');

/**
 * 3. Cambiar el texto del atributo 'title' del logo
 */
function academia_login_header_title() {
    return get_bloginfo('name');
}
add_filter('login_headertext', 'academia_login_header_title');

/**
 * 4. Personalización del Formulario de Registro
 */

// A. Agregar campos personalizados
function academia_register_form() {
    $first_name = ( ! empty( $_POST['first_name'] ) ) ? trim( $_POST['first_name'] ) : '';
    $last_name = ( ! empty( $_POST['last_name'] ) ) ? trim( $_POST['last_name'] ) : '';
    ?>
    <p class="login-custom-field">
        <label for="first_name"><?php _e( 'Nombres', 'academia-pro' ) ?><br />
        <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr( $first_name ); ?>" size="25" required /></label>
    </p>

    <p class="login-custom-field">
        <label for="last_name"><?php _e( 'Apellidos', 'academia-pro' ) ?><br />
        <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr( $last_name ); ?>" size="25" required /></label>
    </p>

    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Lógica para autogenerar el nombre de usuario y ocultar el campo nativo
        var userLoginInput = document.querySelector('#user_login');
        var userLoginLabel = document.querySelector('label[for="user_login"]');
        
        if (userLoginInput) {
            // Ocultar el contenedor padre (usualmente un P) o el input mismo
            var container = userLoginInput.closest('p');
            if(container) {
                container.style.display = 'none';
            } else {
                userLoginInput.style.display = 'none';
                if(userLoginLabel) userLoginLabel.style.display = 'none';
            }
            
            // Función para actualizar el usuario
            function updateUserLogin() {
                var name = document.getElementById('first_name').value.toLowerCase().replace(/[^a-z0-9]/g, '');
                var last = document.getElementById('last_name').value.toLowerCase().replace(/[^a-z0-9]/g, '');
                var random = Math.floor(Math.random() * 10000);
                
                if (name || last) {
                    userLoginInput.value = (name + '.' + last + random).substring(0, 50);
                }
            }

            var fName = document.getElementById('first_name');
            var lName = document.getElementById('last_name');

            if(fName) fName.addEventListener('keyup', updateUserLogin);
            if(lName) lName.addEventListener('keyup', updateUserLogin);
            
            // Inicializar si ya hay valores (recarga por error)
            updateUserLogin();
        }
    });
    </script>
    <?php
}
add_action( 'register_form', 'academia_register_form' );

// B. Validar campos
function academia_registration_errors( $errors, $sanitized_user_login, $user_email ) {
    if ( empty( $_POST['first_name'] ) || ! empty( $_POST['first_name'] ) && trim( $_POST['first_name'] ) == '' ) {
        $errors->add( 'first_name_error', __( '<strong>Error</strong>: Por favor ingresa tus Nombres.', 'academia-pro' ) );
    }

    if ( empty( $_POST['last_name'] ) || ! empty( $_POST['last_name'] ) && trim( $_POST['last_name'] ) == '' ) {
        $errors->add( 'last_name_error', __( '<strong>Error</strong>: Por favor ingresa tus Apellidos.', 'academia-pro' ) );
    }

    return $errors;
}
add_filter( 'registration_errors', 'academia_registration_errors', 10, 3 );

// C. Guardar campos después del registro
function academia_user_register( $user_id ) {
    if ( ! empty( $_POST['first_name'] ) ) {
        update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
    }
    
    if ( ! empty( $_POST['last_name'] ) ) {
        update_user_meta( $user_id, 'last_name', trim( $_POST['last_name'] ) );
        
        // Actualizar el "display name" para que sea Nombre Apellido
        $display_name = trim( $_POST['first_name'] . ' ' . $_POST['last_name'] );
        wp_update_user( array( 
            'ID' => $user_id, 
            'display_name' => $display_name 
        ) );
    }
}
add_action( 'user_register', 'academia_user_register' );

/**
 * 5. Redirección después del Login
 * Evitar que los estudiantes vayan al wp-admin
 */
function academia_login_redirect( $redirect_to, $request, $user ) {
    // Si hay error o no hay usuario, devolver url por defecto
    if ( isset( $user->errors ) && is_array( $user->errors ) ) {
        return $redirect_to;
    }

    // Si es una petición válida de usuario
    if ( $user instanceof WP_User ) {
        // Si es administrador, dejar ir al dashboard
        if ( user_can( $user, 'manage_options' ) ) {
            return $redirect_to;
        }

        // Si es estudiante/suscriptor, enviar a "Mis Cursos" de Sensei
        if ( function_exists( 'Sensei' ) ) {
            $my_courses_page_id = Sensei()->settings->get( 'my_course_page' );
            if ( $my_courses_page_id ) {
                return get_permalink( $my_courses_page_id );
            }
        }
        
        // Fallback: Si no hay Sensei o página definida, ir al Home
        return home_url();
    }

    return $redirect_to;
}

/**
 * 6. Seguridad: Bloquear acceso a wp-admin para estudiantes
 */
function esl_block_admin_for_students() {
    // Si estamos en el admin y NO es una petición AJAX
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        $user = wp_get_current_user();

        // Si el usuario es suscriptor (estudiante)
        if ( in_array( 'subscriber', (array) $user->roles ) ) {
            // Redirigir a Sensei Mis Cursos si existe, sino al home
            if ( function_exists( 'Sensei' ) ) {
                $my_courses_page_id = Sensei()->settings->get( 'my_course_page' );
                $redirect_url = $my_courses_page_id ? get_permalink( $my_courses_page_id ) : home_url();
            } else {
                $redirect_url = home_url();
            }
            
            wp_redirect( $redirect_url );
            exit;
        }
    }
}
add_action( 'admin_init', 'esl_block_admin_for_students' );

/**
 * 7. UI: Ocultar barra de administración para estudiantes
 */
function esl_hide_admin_bar() {
    if ( ! current_user_can( 'manage_options' ) && ! is_admin() ) {
        show_admin_bar( false );
    }
}
add_action( 'after_setup_theme', 'esl_hide_admin_bar' );

/**
 * 8. Personalización de Emails (UI/UX)
 */

// A. Función Helper para generar el HTML del email
function academia_get_email_template($title, $message, $action_url = '', $action_text = '') {
    $logo_url = 'https://emprendesinlimites.co/wp-content/uploads/2026/01/cropped-Logo-de-Emprende-Sin-Limites.png';
    $site_name = get_bloginfo('name');
    $primary_color = '#0066FF';
    
    // Estructura HTML Responsive
    $html = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . esc_html($title) . '</title>
    </head>
    <body style="margin: 0; padding: 0; background-color: #f4f7fa; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; margin-top: 40px; margin-bottom: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
            <!-- Header -->
            <tr>
                <td align="center" style="padding: 40px 0; background-color: #ffffff; border-bottom: 1px solid #edf2f7;">
                    <img src="' . esc_url($logo_url) . '" alt="' . esc_attr($site_name) . '" width="200" style="display: block; width: 200px; height: auto;">
                </td>
            </tr>
            
            <!-- Content -->
            <tr>
                <td style="padding: 40px 40px 20px 40px;">
                    <h1 style="color: #1a202c; font-size: 24px; font-weight: 700; margin: 0 0 20px 0; text-align: center;">' . $title . '</h1>
                    <div style="color: #4a5568; font-size: 16px; line-height: 1.6;">
                        ' . $message . '
                    </div>
                </td>
            </tr>
            
            <!-- Action Button -->
            ';
            
    if (!empty($action_url) && !empty($action_text)) {
        $html .= '
            <tr>
                <td align="center" style="padding: 20px 40px 40px 40px;">
                    <a href="' . esc_url($action_url) . '" style="display: inline-block; padding: 14px 30px; background-color: ' . $primary_color . '; color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 16px; box-shadow: 0 2px 4px rgba(0, 102, 255, 0.2);">' . esc_html($action_text) . '</a>
                </td>
            </tr>';
    }
    
    $html .= '
            <!-- Footer -->
            <tr>
                <td style="background-color: #f8fafc; padding: 30px 40px; text-align: center; border-top: 1px solid #edf2f7;">
                    <p style="margin: 0; color: #718096; font-size: 14px;">&copy; ' . date('Y') . ' ' . esc_html($site_name) . '. Todos los derechos reservados.</p>
                    <p style="margin: 10px 0 0 0; color: #a0aec0; font-size: 12px;">Si no solicitaste este correo, puedes ignorarlo.</p>
                </td>
            </tr>
        </table>
    </body>
    </html>
    ';
    
    return $html;
}

// B. Permitir HTML en los correos
function academia_set_html_content_type() {
    return 'text/html';
}
add_filter('wp_mail_content_type', 'academia_set_html_content_type');

// C. Personalizar Correo de Bienvenida (Nuevo Usuario)
function academia_custom_new_user_email($wp_new_user_notification_email, $user, $blogname) {
    // Generar URL para establecer contraseña
    $key = get_password_reset_key($user);
    if (is_wp_error($key)) {
        return $wp_new_user_notification_email;
    }
    
    // Construir URLs
    $action_url = network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login');
    
    // Mensaje
    $message = '<p>¡Hola <strong>' . esc_html($user->first_name) . '</strong>!</p>';
    $message .= '<p>Gracias por unirte a <strong>Emprende Sin Límites</strong>. Tu cuenta ha sido creada exitosamente.</p>';
    $message .= '<p>Para comenzar tu aprendizaje, primero necesitas establecer una contraseña segura haciendo clic en el siguiente botón:</p>';
    
    // Sobrescribir asunto y mensaje
    $wp_new_user_notification_email['subject'] = 'Bienvenido a ' . $blogname . ' - Activa tu cuenta';
    $wp_new_user_notification_email['message'] = academia_get_email_template(
        '¡Bienvenido a Tu Futuro!', 
        $message, 
        $action_url, 
        'Establecer Contraseña'
    );
    $wp_new_user_notification_email['headers'] = array('Content-Type: text/html; charset=UTF-8');
    
    return $wp_new_user_notification_email;
}
add_filter('wp_new_user_notification_email', 'academia_custom_new_user_email', 10, 3);

// D. Personalizar Correo de Recuperación de Contraseña
function academia_custom_retrieve_password_message($message, $key, $user_login, $user_data) {
    // Construir URL
    $action_url = network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login');
    
    // Mensaje
    $msg_content = '<p>Hola <strong>' . esc_html($user_data->first_name) . '</strong>,</p>';
    $msg_content .= '<p>Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en Emprende Sin Límites.</p>';
    $msg_content .= '<p>Si fuiste tú, simplemente haz clic en el botón de abajo para crear una nueva contraseña:</p>';
    
    // Generar Plantilla
    $html_message = academia_get_email_template(
        'Recuperación de Contraseña',
        $msg_content,
        $action_url,
        'Restablecer Contraseña'
    );
    
    return $html_message;
}
add_filter('retrieve_password_message', 'academia_custom_retrieve_password_message', 10, 4);

/**
 * 9. Traducciones Sensei LMS
 */
function academia_translate_sensei_buttons( $text ) {
    if ( 'Start Course' === $text ) {
        return 'Comenzar Curso';
    }
    if ( 'Resume Course' === $text ) {
        return 'Continuar Curso';
    }
    if ( 'Register to take this course' === $text ) {
        return 'Regístrate para tomar este curso';
    }
    if ( 'Login to start this course' === $text ) {
        return 'Inicia sesión para empezar';
    }
    return $text;
}
add_filter( 'gettext', 'academia_translate_sensei_buttons', 20 );
