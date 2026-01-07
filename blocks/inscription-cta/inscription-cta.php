<?php
/**
 * Inscription CTA Block
 * High-impact section for Google Form registration
 * Now fully customizable via WordPress Customizer
 */

// Get Customizer values with defaults
$show_section = get_theme_mod('academia_inscription_show', true);

// Exit early if section is hidden
if (!$show_section) {
    return;
}

$badge_text = get_theme_mod('academia_inscription_badge', 'Primer Paso Obligatorio');
$title = get_theme_mod('academia_inscription_title', 'Caracterización e Inscripción Académica');
$description = get_theme_mod('academia_inscription_description', 'Antes de acceder a nuestros cursos, es fundamental realizar tu proceso de caracterización. Esto nos permite conocer tu perfil y brindarte una ruta de aprendizaje optimizada para tu éxito profesional.');
$benefit_1 = get_theme_mod('academia_inscription_benefit_1', 'Perfilado profesional personalizado');
$benefit_2 = get_theme_mod('academia_inscription_benefit_2', 'Acceso prioritario a nuevas convocatorias');
$benefit_3 = get_theme_mod('academia_inscription_benefit_3', 'Asesoría inicial sin costo');
$button_text = get_theme_mod('academia_inscription_button_text', 'Completar Inscripción Ahora');
$button_url = get_theme_mod('academia_inscription_button_url', 'https://docs.google.com/forms/d/e/1FAIpQLSffLNmhX5l172AwtWo_ZVty_1k_yAwnWMtErTY4ALjAVcC2Sw/viewform');
$image_url = get_theme_mod('academia_inscription_image', get_stylesheet_directory_uri() . '/assets/images/inscription-visual.png');
?>

<section class="inscription-cta-section section">
    <div class="container">
        <div class="inscription-card animate-on-scroll fade-in">
            <div class="inscription-grid">
                <!-- Left Column: Content -->
                <div class="inscription-content">
                    <?php if (!empty($badge_text)) : ?>
                        <span class="inscription-badge"><?php echo esc_html($badge_text); ?></span>
                    <?php endif; ?>
                    
                    <?php if (!empty($title)) : ?>
                        <h2 class="inscription-title"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                    
                    <?php if (!empty($description)) : ?>
                        <p class="inscription-text">
                            <?php echo esc_html($description); ?>
                        </p>
                    <?php endif; ?>
                    
                    <?php if (!empty($benefit_1) || !empty($benefit_2) || !empty($benefit_3)) : ?>
                        <ul class="inscription-benefits">
                            <?php if (!empty($benefit_1)) : ?>
                                <li>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <?php echo esc_html($benefit_1); ?>
                                </li>
                            <?php endif; ?>
                            
                            <?php if (!empty($benefit_2)) : ?>
                                <li>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <?php echo esc_html($benefit_2); ?>
                                </li>
                            <?php endif; ?>
                            
                            <?php if (!empty($benefit_3)) : ?>
                                <li>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <?php echo esc_html($benefit_3); ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($button_text) && !empty($button_url)) : ?>
                        <div class="inscription-actions">
                            <a href="<?php echo esc_url($button_url); ?>" target="_blank" class="btn btn-primary btn-lg">
                                <?php echo esc_html($button_text); ?>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Right Column: Visual -->
                <div class="inscription-visual">
                    <div class="visual-wrapper">
                        <?php if (!empty($image_url)) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="floating-image">
                        <?php endif; ?>
                        <div class="visual-blur-blob"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.inscription-cta-section {
    padding: var(--spacing-4xl) 0;
    background-color: var(--color-gray-50);
}

.inscription-card {
    background: var(--color-white);
    border-radius: var(--radius-2xl);
    padding: var(--spacing-3xl);
    box-shadow: var(--shadow-blue-lg);
    border: 1px solid var(--color-gray-100);
    overflow: hidden;
    position: relative;
    transition: transform var(--transition-base);
}

.inscription-card:hover {
    transform: translateY(-5px);
}

.inscription-grid {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: var(--spacing-3xl);
    align-items: center;
}

.inscription-badge {
    display: inline-block;
    padding: var(--spacing-xs) var(--spacing-md);
    background: rgba(0, 102, 255, 0.1);
    color: var(--color-primary);
    border-radius: var(--radius-full);
    font-size: var(--font-size-xs);
    font-weight: var(--font-weight-bold);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: var(--spacing-md);
}

.inscription-title {
    font-size: var(--font-size-4xl);
    font-weight: var(--font-weight-extrabold);
    color: var(--color-gray-900);
    line-height: 1.2;
    margin-bottom: var(--spacing-lg);
}

.inscription-text {
    font-size: var(--font-size-lg);
    color: var(--color-gray-600);
    margin-bottom: var(--spacing-xl);
}

.inscription-benefits {
    list-style: none;
    padding: 0;
    margin-bottom: var(--spacing-2xl);
}

.inscription-benefits li {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    font-size: var(--font-size-base);
    color: var(--color-gray-700);
    margin-bottom: var(--spacing-sm);
    font-weight: var(--font-weight-medium);
}

.inscription-benefits li svg {
    color: var(--color-success);
    flex-shrink: 0;
}

.inscription-visual {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.visual-wrapper {
    position: relative;
    width: 100%;
    max-width: 400px;
}

.floating-image {
    width: 100%;
    height: auto;
    border-radius: var(--radius-xl);
    position: relative;
    z-index: 2;
    animation: float 6s ease-in-out infinite;
}

.visual-blur-blob {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 80%;
    height: 80%;
    background: var(--gradient-primary);
    filter: blur(60px);
    opacity: 0.2;
    border-radius: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

@media (max-width: 992px) {
    .inscription-grid {
        grid-template-columns: 1fr;
        gap: var(--spacing-2xl);
    }
    
    .inscription-content {
        text-align: center;
    }
    
    .inscription-benefits li {
        justify-content: center;
    }
    
    .inscription-visual {
        order: -1;
    }
    
    .inscription-title {
        font-size: var(--font-size-3xl);
    }
}

@media (max-width: 576px) {
    .inscription-card {
        padding: var(--spacing-xl) var(--spacing-md);
    }
    
    .inscription-title {
        font-size: var(--font-size-2xl);
    }
}
</style>
