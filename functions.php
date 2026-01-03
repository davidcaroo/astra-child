<?php
/**
 * Academia Pro - Astra Child Theme Functions
 * 
 * @package Academia_Pro
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('ACADEMIA_VERSION', '1.0.0');
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
        'footer' => __('Footer Menu', 'academia-pro'),
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

    // Hero Title
    $wp_customize->add_setting('academia_hero_title', array(
        'default'           => 'Emprende Sin Límites y Alcanza Tu Máximo Potencial',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_hero_title', array(
        'label'    => __('Título del Hero', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'text',
    ));

    // Hero Description
    $wp_customize->add_setting('academia_hero_description', array(
        'default'           => 'Aprende de expertos y domina las habilidades más demandadas en marketing digital, emprendimiento y ventas. Transforma tu idea en un negocio exitoso sin barreras.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('academia_hero_description', array(
        'label'    => __('Descripción del Hero', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'textarea',
    ));

    // Hero Primary Button Text
    $wp_customize->add_setting('academia_hero_primary_btn_text', array(
        'default'           => 'Explorar Cursos',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_hero_primary_btn_text', array(
        'label'    => __('Texto Botón Primario', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'text',
    ));

    // Hero Primary Button Link
    $wp_customize->add_setting('academia_hero_primary_btn_link', array(
        'default'           => 'https://emprendesinlimites.co/resumen-cursos/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('academia_hero_primary_btn_link', array(
        'label'    => __('Link Botón Primario', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'url',
    ));

    // Hero Secondary Button Text
    $wp_customize->add_setting('academia_hero_secondary_btn_text', array(
        'default'           => 'Ver Demo Gratis',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_hero_secondary_btn_text', array(
        'label'    => __('Texto Botón Secundario', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'text',
    ));

    // Hero Secondary Button Link
    $wp_customize->add_setting('academia_hero_secondary_btn_link', array(
        'default'           => '#demo',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('academia_hero_secondary_btn_link', array(
        'label'    => __('Link Botón Secundario', 'academia-pro'),
        'section'  => 'academia_hero_section',
        'type'     => 'url',
    ));

    // --- CTA Section ---
    $wp_customize->add_section('academia_cta_section', array(
        'title'    => __('Sección CTA (Final)', 'academia-pro'),
        'priority' => 35,
    ));

    // CTA Title
    $wp_customize->add_setting('academia_cta_title', array(
        'default'           => 'Comienza Tu Transformación Profesional Hoy',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_cta_title', array(
        'label'    => __('Título CTA', 'academia-pro'),
        'section'  => 'academia_cta_section',
        'type'     => 'text',
    ));

    // CTA Primary Button Text
    $wp_customize->add_setting('academia_cta_primary_btn_text', array(
        'default'           => 'Inscríbete Ahora',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('academia_cta_primary_btn_text', array(
        'label'    => __('Texto Botón Primario', 'academia-pro'),
        'section'  => 'academia_cta_section',
        'type'     => 'text',
    ));

    // CTA Primary Button Link
    $wp_customize->add_setting('academia_cta_primary_btn_link', array(
        'default'           => 'https://emprendesinlimites.co/resumen-cursos/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('academia_cta_primary_btn_link', array(
        'label'    => __('Link Botón Primario', 'academia-pro'),
        'section'  => 'academia_cta_section',
        'type'     => 'url',
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
