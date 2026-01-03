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
