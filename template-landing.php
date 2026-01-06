<?php
/**
 * Template Name: Landing Page
 * Description: Full-width landing page template with all blocks
 */

get_header(); ?>

<main class="site-main">
    <!-- Hero Section -->
    <?php include get_stylesheet_directory() . '/blocks/hero/hero.php'; ?>
    
    <!-- Inscription CTA Section -->
    <?php include ACADEMIA_THEME_DIR . '/blocks/inscription-cta/inscription-cta.php'; ?>

    <!-- Course Curriculum Section -->
    <?php include ACADEMIA_THEME_DIR . '/blocks/course-curriculum/course-curriculum.php'; ?>

    <!-- Benefits Section -->
    <?php include ACADEMIA_THEME_DIR . '/blocks/benefits/benefits.php'; ?>
</main>

<?php get_footer(); ?>
