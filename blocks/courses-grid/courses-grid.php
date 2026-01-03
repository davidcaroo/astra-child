<?php
/**
 * Courses Grid Block
 * Displays courses from Sensei LMS
 */

// Get courses from Sensei if active, otherwise show fallback
$courses_query = null;
$has_sensei = function_exists('esl_is_sensei_active') && esl_is_sensei_active();

if ($has_sensei) {
    // Get courses from Sensei
    $courses_query = esl_get_sensei_courses(array(
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
    ));
    
    // Get course categories for filtering
    $categories = get_terms(array(
        'taxonomy' => 'course-category',
        'hide_empty' => true,
    ));
} else {
    $categories = array();
}
?>

<section class="courses-section section-lg">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-badge">Nuestros Cursos</span>
            <h2 class="section-title">Aprende con los Mejores Cursos</h2>
            <p class="section-description">
                Descubre nuestra selección de cursos diseñados para impulsar tu carrera en marketing, ventas y emprendimiento.
            </p>
        </div>

        <!-- Category Filters -->
        <?php if ($has_sensei && !empty($categories) && !is_wp_error($categories)) : ?>
        <div class="courses-filters">
            <button class="filter-btn active" data-category="all">Todos</button>
            <?php foreach ($categories as $category) : ?>
                <button class="filter-btn" data-category="<?php echo esc_attr($category->slug); ?>">
                    <?php echo esc_html($category->name); ?>
                </button>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Courses Grid -->
        <div class="courses-grid">
            <?php if ($has_sensei && $courses_query && $courses_query->have_posts()) : ?>
                <?php while ($courses_query->have_posts()) : $courses_query->the_post(); ?>
                    <?php
                    $course_id = get_the_ID();
                    $course_data = esl_get_formatted_course_data($course_id);
                    
                    // Get category slugs for filtering
                    $category_slugs = array();
                    if (!empty($course_data['categories']) && !is_wp_error($course_data['categories'])) {
                        foreach ($course_data['categories'] as $cat) {
                            $category_slugs[] = $cat->slug;
                        }
                    }
                    $category_attr = !empty($category_slugs) ? implode(' ', $category_slugs) : 'uncategorized';
                    ?>
                    
                    <div class="course-card" data-category="<?php echo esc_attr($category_attr); ?>">
                        <div class="course-image">
                            <?php if (!empty($course_data['thumbnail'])) : ?>
                                <img src="<?php echo esc_url($course_data['thumbnail']); ?>" alt="<?php echo esc_attr($course_data['title']); ?>">
                            <?php else : ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/course-placeholder.jpg" alt="<?php echo esc_attr($course_data['title']); ?>">
                            <?php endif; ?>
                            
                            <?php if ($course_data['is_enrolled']) : ?>
                                <span class="course-badge badge-enrolled">Inscrito</span>
                            <?php elseif ($course_data['has_certificate']) : ?>
                                <span class="course-badge badge-certificate">Con Certificado</span>
                            <?php endif; ?>
                            
                            <span class="course-level"><?php echo esc_html($course_data['difficulty']); ?></span>
                        </div>
                        
                        <div class="course-content">
                            <div class="course-meta">
                                <?php if (!empty($course_data['categories']) && !is_wp_error($course_data['categories'])) : ?>
                                    <span class="course-category">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                                            <path d="M2 4L8 2L14 4V8C14 11.5 11 14 8 14C5 14 2 11.5 2 8V4Z"/>
                                        </svg>
                                        <?php echo esc_html($course_data['categories'][0]->name); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ($course_data['rating'] > 0) : ?>
                                    <span class="course-rating">
                                        <span class="stars">★</span>
                                        <?php echo esc_html($course_data['rating']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <h3 class="course-title">
                                <a href="<?php echo esc_url($course_data['permalink']); ?>">
                                    <?php echo esc_html($course_data['title']); ?>
                                </a>
                            </h3>
                            
                            <p class="course-excerpt">
                                <?php echo esc_html(wp_trim_words($course_data['excerpt'], 15)); ?>
                            </p>
                            
                            <div class="course-info">
                                <div class="info-item">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                                        <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                        <path d="M8 4V8L11 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" fill="none"/>
                                    </svg>
                                    <span><?php echo esc_html($course_data['duration']); ?></span>
                                </div>
                                <div class="info-item">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                                        <path d="M8 8a3 3 0 100-6 3 3 0 000 6zm0 1c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                    <span><?php echo esc_html($course_data['students']); ?> estudiantes</span>
                                </div>
                                <?php if ($course_data['has_certificate']) : ?>
                                    <div class="info-item">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                                            <path d="M4 0a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V2a2 2 0 00-2-2H4zm0 1h8a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V2a1 1 0 011-1z"/>
                                        </svg>
                                        <span>Certificado</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="course-footer">
                                <div class="course-price"><?php echo wp_kses_post($course_data['price']); ?></div>
                                <a href="<?php echo esc_url($course_data['enrollment_url']); ?>" class="btn btn-primary">
                                    <?php echo $course_data['is_enrolled'] ? 'Continuar' : 'Ver Curso'; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php elseif ($has_sensei) : ?>
                <!-- No courses found -->
                <div class="no-courses">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="30" stroke="currentColor" stroke-width="2"/>
                        <path d="M32 20v16M32 44h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <h3>No hay cursos disponibles</h3>
                    <p>Pronto agregaremos nuevos cursos. ¡Mantente atento!</p>
                </div>
            <?php else : ?>
                <!-- Sensei not active - Fallback -->
                <div class="no-courses">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="30" stroke="currentColor" stroke-width="2"/>
                        <path d="M32 20v16M32 44h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <h3>Sensei LMS no está activo</h3>
                    <p>Por favor, instala y activa el plugin Sensei LMS para mostrar los cursos.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.courses-section {
    background: var(--color-gray-50);
}

.section-header {
    max-width: 700px;
    margin: 0 auto var(--spacing-3xl);
}

.section-badge {
    display: inline-block;
    padding: var(--spacing-sm) var(--spacing-lg);
    background: var(--gradient-primary);
    color: var(--color-white);
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-semibold);
    border-radius: var(--radius-full);
    margin-bottom: var(--spacing-md);
}

.section-title {
    font-size: var(--font-size-4xl);
    color: var(--color-gray-900);
    margin-bottom: var(--spacing-md);
}

.section-description {
    font-size: var(--font-size-lg);
    color: var(--color-gray-600);
}

.courses-filters {
    display: flex;
    justify-content: center;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-3xl);
    flex-wrap: wrap;
}

.filter-btn {
    padding: var(--spacing-md) var(--spacing-xl);
    background: var(--color-white);
    color: var(--color-gray-700);
    border: 2px solid var(--color-gray-200);
    border-radius: var(--radius-lg);
    font-size: var(--font-size-base);
    font-weight: var(--font-weight-semibold);
    cursor: pointer;
    transition: all var(--transition-base);
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--gradient-primary);
    color: var(--color-white);
    border-color: transparent;
    transform: translateY(-2px);
    box-shadow: var(--shadow-blue);
}

.courses-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: var(--spacing-xl);
    margin-bottom: var(--spacing-3xl);
}

.course-card {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all var(--transition-base);
    border: 1px solid var(--color-gray-100);
}

.course-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-2xl);
}

.course-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.course-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-slow);
}

.course-card:hover .course-image img {
    transform: scale(1.1);
}

.course-badge {
    position: absolute;
    top: var(--spacing-md);
    left: var(--spacing-md);
    padding: var(--spacing-xs) var(--spacing-md);
    background: var(--gradient-accent);
    color: var(--color-white);
    font-size: var(--font-size-xs);
    font-weight: var(--font-weight-bold);
    border-radius: var(--radius-sm);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge-enrolled {
    background: var(--color-success);
}

.badge-certificate {
    background: var(--gradient-primary);
}

.course-level {
    position: absolute;
    top: var(--spacing-md);
    right: var(--spacing-md);
    padding: var(--spacing-xs) var(--spacing-md);
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(10px);
    color: var(--color-white);
    font-size: var(--font-size-xs);
    font-weight: var(--font-weight-semibold);
    border-radius: var(--radius-sm);
}

.course-content {
    padding: var(--spacing-xl);
}

.course-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-md);
}

.course-category {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    color: var(--color-primary);
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-semibold);
}

.course-rating {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
}

.course-rating .stars {
    color: #FFB300;
}

.course-title {
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-gray-900);
    margin-bottom: var(--spacing-md);
    line-height: 1.3;
}

.course-title a {
    color: inherit;
    text-decoration: none;
    transition: color var(--transition-base);
}

.course-title a:hover {
    color: var(--color-primary);
}

.course-excerpt {
    color: var(--color-gray-600);
    font-size: var(--font-size-sm);
    line-height: 1.6;
    margin-bottom: var(--spacing-lg);
}

.course-info {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-md);
    padding: var(--spacing-lg) 0;
    border-top: 1px solid var(--color-gray-200);
    border-bottom: 1px solid var(--color-gray-200);
    margin-bottom: var(--spacing-lg);
}

.info-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    color: var(--color-gray-600);
    font-size: var(--font-size-sm);
}

.info-item svg {
    color: var(--color-primary);
    flex-shrink: 0;
}

.course-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.course-price {
    font-size: var(--font-size-2xl);
    font-weight: var(--font-weight-extrabold);
    color: var(--color-primary);
}

/* No courses message */
.no-courses {
    grid-column: 1 / -1;
    text-align: center;
    padding: var(--spacing-4xl) var(--spacing-xl);
}

.no-courses svg {
    color: var(--color-gray-400);
    margin-bottom: var(--spacing-xl);
}

.no-courses h3 {
    font-size: var(--font-size-2xl);
    color: var(--color-gray-900);
    margin-bottom: var(--spacing-md);
}

.no-courses p {
    font-size: var(--font-size-lg);
    color: var(--color-gray-600);
}

@media (max-width: 768px) {
    .courses-grid {
        grid-template-columns: 1fr;
    }
    
    .course-footer {
        flex-direction: column;
        gap: var(--spacing-md);
        align-items: stretch;
    }
    
    .course-footer .btn {
        width: 100%;
    }
}
</style>

<script>
// Course filtering
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const courseCards = document.querySelectorAll('.course-card');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter courses
            courseCards.forEach(card => {
                const cardCategories = card.getAttribute('data-category');
                
                if (category === 'all' || cardCategories.includes(category)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
