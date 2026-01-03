<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">
        <div class="header-wrapper">
            <!-- Logo - Left -->
            <div class="header-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg" alt="Emprende Sin Límites" class="logo-image">
                    </a>
                <?php endif; ?>
            </div>
            
            <!-- Navigation - Center -->
            <nav class="header-nav" role="navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'container' => false,
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 2,
                ));
                ?>
            </nav>
            
            <!-- Actions - Right -->
            <div class="header-actions">
                <?php if (is_user_logged_in()) : ?>
                    <?php $current_user = wp_get_current_user(); ?>
                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="user-account">
                        <?php echo get_avatar($current_user->ID, 32, '', '', array('class' => 'user-avatar')); ?>
                        <span class="user-name"><?php echo esc_html($current_user->display_name); ?></span>
                    </a>
                    <?php if (function_exists('esl_is_sensei_active') && esl_is_sensei_active()) : ?>
                        <a href="<?php echo esc_url(get_permalink(Sensei()->settings->get('my_course_page'))); ?>" class="btn-login">
                            Mis Cursos
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="btn-login">
                        Cerrar Sesión
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url(wp_login_url(get_permalink())); ?>" class="btn-login">Iniciar Sesión</a>
                    <a href="<?php echo esc_url(wp_registration_url()); ?>" class="btn btn-primary">Registrarse</a>
                <?php endif; ?>
            </div>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-toggle" aria-label="Abrir menú" aria-expanded="false">
                <span class="hamburger-icon">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
                <span class="close-icon">
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay">
    <div class="mobile-menu-content">
        <nav class="mobile-nav" role="navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'mobile-nav-menu',
                'container' => false,
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 2,
            ));
            ?>
        </nav>
        <div class="mobile-menu-actions">
            <?php if (is_user_logged_in()) : ?>
                <?php if (function_exists('esl_is_sensei_active') && esl_is_sensei_active()) : ?>
                    <a href="<?php echo esc_url(get_permalink(Sensei()->settings->get('my_course_page'))); ?>" class="btn btn-secondary btn-block">Mis Cursos</a>
                <?php endif; ?>
                <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="btn btn-secondary btn-block">Cerrar Sesión</a>
            <?php else : ?>
                <a href="<?php echo esc_url(wp_login_url(get_permalink())); ?>" class="btn btn-secondary btn-block">Iniciar Sesión</a>
                <a href="<?php echo esc_url(wp_registration_url()); ?>" class="btn btn-primary btn-block">Registrarse</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
/* ============================================
   HEADER - MODERN NAVBAR
   ============================================ */

/* Header Container */
.site-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: var(--color-white);
    border-bottom: 1px solid var(--color-gray-200);
    transition: all 0.3s ease;
}

.site-header.scrolled {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
}

.header-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
}

.header-wrapper {
    display: grid;
    grid-template-columns: auto 1fr auto;
    align-items: center;
    gap: 40px;
    height: 80px;
}

/* Logo - Left */
.header-logo {
    display: flex;
    align-items: center;
}

.logo-link {
    display: flex;
    align-items: center;
    text-decoration: none;
}

.logo-image {
    height: 45px;
    width: auto;
    transition: transform 0.3s ease;
}

.logo-image:hover {
    transform: scale(1.05);
}

/* Navigation - Center */
.header-nav {
    display: flex;
    justify-content: center;
}

.nav-menu {
    display: flex;
    align-items: center;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-menu > li {
    position: relative;
}

.nav-menu > li > a {
    display: block;
    padding: 10px 20px;
    color: var(--color-gray-700);
    font-family: var(--font-primary);
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.nav-menu > li > a:hover,
.nav-menu > li.current-menu-item > a,
.nav-menu > li.current_page_item > a {
    color: var(--color-primary);
    background: var(--color-gray-50);
}

/* Submenu Styles */
.nav-menu .sub-menu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 220px;
    background: var(--color-white);
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
    padding: 8px;
    margin-top: 8px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    list-style: none;
}

.nav-menu li:hover > .sub-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.nav-menu .sub-menu li a {
    display: block;
    padding: 10px 16px;
    color: var(--color-gray-700);
    font-size: 14px;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.2s ease;
}

.nav-menu .sub-menu li a:hover {
    color: var(--color-primary);
    background: var(--color-gray-50);
}

/* Actions - Right */
.header-actions {
    display: flex;
    align-items: center;
    gap: 12px;
}

.btn-login {
    padding: 10px 24px;
    color: var(--color-gray-700);
    font-family: var(--font-primary);
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.btn-login:hover {
    color: var(--color-primary);
    background: var(--color-gray-50);
}

.user-account {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 6px 12px;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.user-account:hover {
    background: var(--color-gray-50);
}

.user-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
}

.user-name {
    color: var(--color-gray-700);
    font-family: var(--font-primary);
    font-size: 15px;
    font-weight: 600;
}

.btn-block {
    width: 100%;
    text-align: center;
}

/* Mobile Toggle Button */
.mobile-toggle {
    display: none;
    position: relative;
    width: 44px;
    height: 44px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    z-index: 1001;
}

.hamburger-icon,
.close-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 24px;
    height: 18px;
    transition: opacity 0.3s ease;
}

.close-icon {
    opacity: 0;
}

.mobile-toggle.active .hamburger-icon {
    opacity: 0;
}

.mobile-toggle.active .close-icon {
    opacity: 1;
}

.hamburger-icon .line {
    display: block;
    width: 100%;
    height: 2px;
    background: var(--color-gray-700);
    border-radius: 2px;
    position: absolute;
    left: 0;
    transition: all 0.3s ease;
}

.hamburger-icon .line:nth-child(1) {
    top: 0;
}

.hamburger-icon .line:nth-child(2) {
    top: 50%;
    transform: translateY(-50%);
}

.hamburger-icon .line:nth-child(3) {
    bottom: 0;
}

.close-icon .line {
    display: block;
    width: 100%;
    height: 2px;
    background: var(--color-gray-700);
    border-radius: 2px;
    position: absolute;
    top: 50%;
    left: 0;
}

.close-icon .line:nth-child(1) {
    transform: translateY(-50%) rotate(45deg);
}

.close-icon .line:nth-child(2) {
    transform: translateY(-50%) rotate(-45deg);
}

/* Mobile Menu Overlay */
.mobile-menu-overlay {
    position: fixed;
    top: 80px;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--color-white);
    z-index: 999;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    overflow-y: auto;
}

.mobile-menu-overlay.active {
    opacity: 1;
    visibility: visible;
}

.mobile-menu-content {
    padding: 24px;
}

.mobile-nav-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.mobile-nav-menu li {
    border-bottom: 1px solid var(--color-gray-200);
}

.mobile-nav-menu li:last-child {
    border-bottom: none;
}

.mobile-nav-menu > li > a {
    display: block;
    padding: 16px 0;
    color: var(--color-gray-900);
    font-family: var(--font-primary);
    font-size: 16px;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.2s ease;
}

.mobile-nav-menu > li > a:hover,
.mobile-nav-menu > li.current-menu-item > a {
    color: var(--color-primary);
}

.mobile-nav-menu .sub-menu {
    list-style: none;
    padding-left: 20px;
    margin-top: 8px;
}

.mobile-nav-menu .sub-menu li a {
    display: block;
    padding: 12px 0;
    color: var(--color-gray-600);
    font-size: 15px;
    text-decoration: none;
}

.mobile-nav-menu .sub-menu li a:hover {
    color: var(--color-primary);
}

.mobile-menu-actions {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 32px;
    padding-top: 24px;
    border-top: 1px solid var(--color-gray-200);
}

/* Responsive Breakpoints */
@media (max-width: 1024px) {
    .header-wrapper {
        grid-template-columns: auto 1fr;
        gap: 20px;
    }
    
    .header-nav,
    .header-actions {
        display: none;
    }
    
    .mobile-toggle {
        display: block;
    }
}

@media (max-width: 768px) {
    .header-container {
        padding: 0 16px;
    }
    
    .header-wrapper {
        height: 70px;
    }
    
    .logo-image {
        height: 38px;
    }
    
    .mobile-menu-overlay {
        top: 70px;
    }
}

/* Prevent body scroll when mobile menu is open */
body.mobile-menu-open {
    overflow: hidden;
}
</style>
