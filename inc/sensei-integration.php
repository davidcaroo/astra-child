<?php
/**
 * Sensei LMS Integration
 * 
 * Helper functions for integrating Sensei LMS with Emprende Sin Límites theme
 * 
 * @package Emprende_Sin_Limites
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if Sensei LMS is active
 * 
 * @return bool
 */
function esl_is_sensei_active() {
    return class_exists('Sensei_Main');
}

/**
 * Get Sensei courses
 * 
 * @param array $args Query arguments
 * @return WP_Query
 */
function esl_get_sensei_courses($args = array()) {
    // Default arguments
    $defaults = array(
        'post_type' => 'course',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    // Merge with custom arguments
    $args = wp_parse_args($args, $defaults);
    
    return new WP_Query($args);
}

/**
 * Get course price
 * 
 * @param int $course_id Course post ID
 * @return string Formatted price or 'Gratis'
 */
function esl_get_course_price($course_id) {
    if (!esl_is_sensei_active()) {
        return 'Gratis';
    }
    
    // Get WooCommerce product ID if exists
    $wc_post_id = get_post_meta($course_id, '_course_woocommerce_product', true);
    
    if ($wc_post_id && function_exists('wc_get_product')) {
        $product = wc_get_product($wc_post_id);
        if ($product) {
            $price = $product->get_price();
            if ($price > 0) {
                return wc_price($price);
            }
        }
    }
    
    return 'Gratis';
}

/**
 * Get course student count
 * 
 * @param int $course_id Course post ID
 * @return int Number of students
 */
function esl_get_course_student_count($course_id) {
    if (!esl_is_sensei_active()) {
        return 0;
    }
    
    global $wpdb;
    
    $count = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM {$wpdb->comments} 
        WHERE comment_post_ID = %d 
        AND comment_type = 'sensei_course_status'
        AND comment_approved IN ('in-progress', 'complete')",
        $course_id
    ));
    
    return intval($count);
}

/**
 * Get course lesson count
 * 
 * @param int $course_id Course post ID
 * @return int Number of lessons
 */
function esl_get_course_lesson_count($course_id) {
    if (!esl_is_sensei_active() || !function_exists('Sensei')) {
        return 0;
    }
    
    $lessons = Sensei()->course->course_lessons($course_id);
    return is_array($lessons) ? count($lessons) : 0;
}

/**
 * Get course difficulty/level
 * 
 * @param int $course_id Course post ID
 * @return string Difficulty level
 */
function esl_get_course_difficulty($course_id) {
    $difficulty = get_post_meta($course_id, '_course_difficulty', true);
    
    if (empty($difficulty)) {
        return 'Todos los niveles';
    }
    
    // Map Sensei difficulty to Spanish
    $difficulty_map = array(
        'beginner' => 'Principiante',
        'intermediate' => 'Intermedio',
        'advanced' => 'Avanzado',
    );
    
    return isset($difficulty_map[$difficulty]) ? $difficulty_map[$difficulty] : ucfirst($difficulty);
}

/**
 * Get course duration in hours
 * 
 * @param int $course_id Course post ID
 * @return string Duration text
 */
function esl_get_course_duration($course_id) {
    $lesson_count = esl_get_course_lesson_count($course_id);
    
    if ($lesson_count === 0) {
        return 'Por definir';
    }
    
    // Estimate: ~30 minutes per lesson
    $hours = ceil(($lesson_count * 30) / 60);
    
    return $hours . ' horas';
}

/**
 * Check if course has certification
 * 
 * @param int $course_id Course post ID
 * @return bool
 */
function esl_course_has_certificate($course_id) {
    if (!esl_is_sensei_active()) {
        return false;
    }
    
    $certificate_id = get_post_meta($course_id, '_course_certificate', true);
    return !empty($certificate_id);
}

/**
 * Get course categories
 * 
 * @param int $course_id Course post ID
 * @return array Array of category objects
 */
function esl_get_course_categories($course_id) {
    return get_the_terms($course_id, 'course-category');
}

/**
 * Get course rating (if reviews are enabled)
 * 
 * @param int $course_id Course post ID
 * @return float Average rating
 */
function esl_get_course_rating($course_id) {
    // Check if comments/reviews are enabled
    $comments = get_comments(array(
        'post_id' => $course_id,
        'status' => 'approve',
        'type' => 'comment',
    ));
    
    if (empty($comments)) {
        return 0;
    }
    
    // Calculate average rating from comment meta (if using a rating system)
    $total = 0;
    $count = 0;
    
    foreach ($comments as $comment) {
        $rating = get_comment_meta($comment->comment_ID, 'rating', true);
        if ($rating) {
            $total += intval($rating);
            $count++;
        }
    }
    
    return $count > 0 ? round($total / $count, 1) : 0;
}

/**
 * Check if user is enrolled in course
 * 
 * @param int $course_id Course post ID
 * @param int $user_id User ID (default: current user)
 * @return bool
 */
function esl_is_user_enrolled($course_id, $user_id = null) {
    if (!esl_is_sensei_active() || !function_exists('Sensei_Utils')) {
        return false;
    }
    
    if (null === $user_id) {
        $user_id = get_current_user_id();
    }
    
    return Sensei_Utils::user_started_course($course_id, $user_id);
}

/**
 * Get course enrollment URL
 * 
 * @param int $course_id Course post ID
 * @return string Enrollment URL
 */
function esl_get_course_enrollment_url($course_id) {
    if (!esl_is_sensei_active()) {
        return get_permalink($course_id);
    }
    
    // Check if course requires WooCommerce purchase
    $wc_product_id = get_post_meta($course_id, '_course_woocommerce_product', true);
    
    if ($wc_product_id && function_exists('wc_get_product')) {
        $product = wc_get_product($wc_product_id);
        if ($product) {
            return $product->add_to_cart_url();
        }
    }
    
    return get_permalink($course_id);
}

/**
 * Get formatted course data array
 * 
 * @param int $course_id Course post ID
 * @return array Formatted course data
 */
function esl_get_formatted_course_data($course_id) {
    $course = get_post($course_id);
    
    if (!$course) {
        return array();
    }
    
    return array(
        'id' => $course_id,
        'title' => get_the_title($course_id),
        'excerpt' => get_the_excerpt($course_id),
        'permalink' => get_permalink($course_id),
        'thumbnail' => get_the_post_thumbnail_url($course_id, 'medium'),
        'price' => esl_get_course_price($course_id),
        'students' => esl_get_course_student_count($course_id),
        'lessons' => esl_get_course_lesson_count($course_id),
        'duration' => esl_get_course_duration($course_id),
        'difficulty' => esl_get_course_difficulty($course_id),
        'has_certificate' => esl_course_has_certificate($course_id),
        'categories' => esl_get_course_categories($course_id),
        'rating' => esl_get_course_rating($course_id),
        'is_enrolled' => esl_is_user_enrolled($course_id),
        'enrollment_url' => esl_get_course_enrollment_url($course_id),
    );
}

/**
 * Render course card HTML
 * 
 * @param int $course_id Course post ID
 * @param array $args Additional arguments
 */
function esl_render_course_card($course_id, $args = array()) {
    $course_data = esl_get_formatted_course_data($course_id);
    
    if (empty($course_data)) {
        return;
    }
    
    // Extract data
    extract($course_data);
    
    // Default thumbnail
    if (empty($thumbnail)) {
        $thumbnail = get_stylesheet_directory_uri() . '/assets/images/course-placeholder.jpg';
    }
    
    ?>
    <div class="course-card">
        <div class="course-image">
            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>">
            <?php if ($is_enrolled) : ?>
                <span class="course-badge badge-enrolled">Inscrito</span>
            <?php elseif ($has_certificate) : ?>
                <span class="course-badge badge-certificate">Con Certificado</span>
            <?php endif; ?>
        </div>
        
        <div class="course-content">
            <div class="course-meta">
                <span class="course-level"><?php echo esc_html($difficulty); ?></span>
                <?php if ($rating > 0) : ?>
                    <span class="course-rating">
                        <span class="stars">★</span>
                        <?php echo esc_html($rating); ?>
                    </span>
                <?php endif; ?>
            </div>
            
            <h3 class="course-title">
                <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
            </h3>
            
            <p class="course-excerpt"><?php echo esc_html($excerpt); ?></p>
            
            <div class="course-info">
                <div class="info-item">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                        <path d="M8 0a8 8 0 100 16A8 8 0 008 0zm1 12H7V7h2v5zm0-6H7V4h2v2z"/>
                    </svg>
                    <span><?php echo esc_html($duration); ?></span>
                </div>
                <div class="info-item">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                        <path d="M8 8a3 3 0 100-6 3 3 0 000 6zm0 1c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    <span><?php echo esc_html($students); ?> estudiantes</span>
                </div>
                <?php if ($has_certificate) : ?>
                    <div class="info-item">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M4 0a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V2a2 2 0 00-2-2H4zm0 1h8a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V2a1 1 0 011-1z"/>
                        </svg>
                        <span>Certificado</span>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="course-footer">
                <div class="course-price"><?php echo wp_kses_post($price); ?></div>
                <a href="<?php echo esc_url($enrollment_url); ?>" class="btn btn-primary">
                    <?php echo $is_enrolled ? 'Continuar' : 'Ver Curso'; ?>
                </a>
            </div>
        </div>
    </div>
    <?php
}
