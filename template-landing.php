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
    <?php include get_stylesheet_directory() . '/blocks/inscription-cta/inscription-cta.php'; ?>
    
    <!-- Courses Grid Section -->
    <?php include get_stylesheet_directory() . '/blocks/courses-grid/courses-grid.php'; ?>
    
    <!-- Benefits Section -->
    <?php include get_stylesheet_directory() . '/blocks/benefits/benefits.php'; ?>
    
    <!-- Metrics Section -->
    <?php include get_stylesheet_directory() . '/blocks/metrics/metrics.php'; ?>
    
    <!-- FAQ Section -->
    <?php include get_stylesheet_directory() . '/blocks/faq/faq.php'; ?>
    
    <!-- CTA Section -->
    <?php include get_stylesheet_directory() . '/blocks/cta/cta.php'; ?>
</main>

<?php get_footer(); ?>
