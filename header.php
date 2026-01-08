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
                    
                    <div class="user-profile-dropdown">
                        <!-- Trigger -->
                        <div class="profile-trigger">
                            <?php echo get_avatar($current_user->ID, 35, '', '', array('class' => 'user-avatar')); ?>
                            <span class="user-name"><?php echo esc_html($current_user->display_name); ?></span>
                            <span class="dropdown-chevron">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </span>
                        </div>

                        <!-- Menu -->
                        <div class="profile-menu-content">
                            <div class="profile-header-info">
                                <span class="profile-email"><?php echo esc_html($current_user->user_email); ?></span>
                            </div>

                            <?php if (function_exists('esl_is_sensei_active') && esl_is_sensei_active()) : ?>
                                <a href="<?php echo esc_url(get_permalink(Sensei()->settings->get('my_course_page'))); ?>" class="profile-menu-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="margin-right: 8px;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    Mis Cursos
                                </a>
                            <?php endif; ?>

                            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="profile-menu-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="margin-right: 8px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                </svg>
                                Cambiar Contraseña
                            </a>

                            <div class="profile-menu-divider"></div>

                            <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="profile-menu-item logout-red">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="margin-right: 8px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Cerrar Sesión
                            </a>
                        </div>
                    </div>
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
        grid-template-columns: auto auto !important;
        justify-content: space-between;
        gap: 15px;
        padding: 0 15px;
    }
    
    .header-nav,
    .header-actions {
        display: none !important;
    }
    
    .mobile-toggle {
        display: flex !important;
        margin-left: auto;
    }

    .mobile-menu-overlay {
        display: block !important;
    }
}

@media (max-width: 768px) {
    .header-container {
        padding: 0 15px;
    }
    
    .header-wrapper {
        height: 70px;
    }
    
    .logo-image {
        height: 35px;
    }
    
    .mobile-menu-overlay {
        top: 70px;
    }
}

/* Ensure mobile menu structure is correct for the logic in main.js */
.mobile-menu-overlay {
    display: none; /* Default hidden */
}

/* Prevent body scroll when mobile menu is open */
body.mobile-menu-open {
    overflow: hidden !important;
}

/* Fix Astra Header Breakpoint */
.ast-header-break-point .site-header {
    display: block !important;
}

/* User Dropdown Styles */
.user-profile-dropdown {
    position: relative;
    cursor: pointer;
}

.profile-trigger {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 6px 12px;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.profile-trigger:hover {
    background: var(--color-gray-50);
}

.dropdown-chevron {
    color: var(--color-gray-500);
    display: flex;
    align-items: center;
    transition: transform 0.2s ease;
}

.user-profile-dropdown:hover .dropdown-chevron {
    transform: rotate(180deg);
}

.profile-menu-content {
    position: absolute;
    top: 100%;
    right: 0;
    min-width: 240px;
    background: var(--color-white);
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
    padding: 8px;
    margin-top: 12px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    z-index: 1100;
    border: 1px solid var(--color-gray-200);
}

.user-profile-dropdown:hover .profile-menu-content {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

/* Bridge to prevent closing when moving mouse */
.user-profile-dropdown::after {
    content: '';
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    height: 12px;
}

.profile-header-info {
    padding: 12px 16px;
    border-bottom: 1px solid var(--color-gray-200);
    margin-bottom: 8px;
}

.profile-email {
    display: block;
    color: var(--color-gray-500);
    font-size: 13px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.profile-menu-item {
    display: flex;
    align-items: center;
    padding: 10px 16px;
    color: var(--color-gray-700);
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.2s ease;
}

.profile-menu-item:hover {
    background: var(--color-gray-50);
    color: var(--color-primary);
}

.profile-menu-divider {
    height: 1px;
    background: var(--color-gray-200);
    margin: 8px 0;
}

.logout-red:hover {
    background: #FEF2F2; /* Light Red */
    color: #DC2626 !important; /* Red */
}


