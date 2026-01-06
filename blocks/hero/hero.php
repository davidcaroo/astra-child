<!-- 
  Hero Block - Main landing section
  Modern, eye-catching hero with gradient background
-->
<section class="hero-section">
    <div class="hero-background">
        <div class="hero-gradient-overlay"></div>
        <div class="hero-pattern"></div>
    </div>
    
    <div class="container">
        <div class="hero-content">
            <div class="hero-text animate-on-scroll fade-in">
                <span class="hero-badge">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M10 2L12.5 7.5L18 8.5L14 12.5L15 18L10 15.5L5 18L6 12.5L2 8.5L7.5 7.5L10 2Z" fill="currentColor"/>
                    </svg>
                    #1 en Emprendimiento Digital
                </span>
                
                <?php 
                $hero_title = get_theme_mod('academia_hero_title', 'Crece Inteligente: Emprendimiento con Propósito y Estrategia');
                $hero_description = get_theme_mod('academia_hero_description', 'Certificación gratuita por <a href="https://escuelaplika.com/" target="_blank" class="aplika-link"><img src="' . get_stylesheet_directory_uri() . '/assets/images/aplika-logo.png" alt="Aplika" class="aplika-logo-inline"></a> Formación integral para emprendedores que buscan impacto real, estrategia de negocio y crecimiento sostenible.');
                $primary_btn_text = get_theme_mod('academia_hero_primary_btn_text', 'Inscribirme Gratis');
                $primary_btn_link = get_theme_mod('academia_hero_primary_btn_link', 'https://docs.google.com/forms/d/e/1FAIpQLSffLNmhX5l172AwtWo_ZVty_1k_yAwnWMtErTY4ALjAVcC2Sw/viewform');
                $secondary_btn_text = get_theme_mod('academia_hero_secondary_btn_text', 'Ver Módulos');
                $secondary_btn_link = get_theme_mod('academia_hero_secondary_btn_link', '#curriculum');

                $display_title = str_replace('Inteligente', '<span class="gradient-text">Inteligente</span>', esc_html($hero_title));
                ?>
                <h1 class="hero-title">
                    <?php echo $display_title; ?>
                </h1>
                
                <div class="hero-description">
                    <?php echo wp_kses($hero_description, array(
                        'a' => array('href' => array(), 'target' => array(), 'class' => array()),
                        'img' => array('src' => array(), 'alt' => array(), 'class' => array())
                    )); ?>
                </div>
                
                <div class="hero-cta">
                    <a href="<?php echo esc_url($primary_btn_link); ?>" class="btn btn-primary btn-lg">
                        <?php echo esc_html($primary_btn_text); ?>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M7 4L13 10L7 16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url($secondary_btn_link); ?>" class="btn btn-secondary btn-lg">
                        <?php echo esc_html($secondary_btn_text); ?>
                    </a>
                </div>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">10</div>
                        <div class="stat-label">Módulos de Valor</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Gratis y Online</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">Oficial</div>
                        <div class="stat-label">Certificación Plika</div>
                    </div>
                </div>
            </div>
            
            <div class="hero-image animate-on-scroll slide-in-right">
                <div class="hero-image-wrapper">
                    <?php 
                    $hero_image = get_theme_mod('academia_hero_image');
                    if (empty($hero_image)) {
                        $hero_image = get_stylesheet_directory_uri() . '/assets/images/hero-illustration.svg';
                    }
                    ?>
                    <img src="<?php echo esc_url($hero_image); ?>" alt="Estudiante aprendiendo online" class="hero-img">

                    
                    <!-- Floating Cards -->
                    <div class="floating-card card-1">
                        <div class="card-icon">📊</div>
                        <div class="card-text">
                            <strong>Marketing Analytics</strong>
                            <span>En progreso</span>
                        </div>
                    </div>
                    
                    <div class="floating-card card-2">
                        <div class="card-icon">✓</div>
                        <div class="card-text">
                            <strong>Ventas B2B</strong>
                            <span>Completado</span>
                        </div>
                    </div>
                    
                    <div class="floating-card card-3">
                        <div class="card-icon">🎯</div>
                        <div class="card-text">
                            <strong>+500 estudiantes</strong>
                            <span>Este mes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: var(--spacing-4xl) 0;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
}

.hero-gradient-overlay {
    position: absolute;
    inset: 0;
    background: var(--gradient-primary);
    opacity: 0.95;
}

.hero-pattern {
    position: absolute;
    inset: 0;
    background-image: 
        radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
}

.hero-content {
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-3xl);
    align-items: center;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-sm) var(--spacing-lg);
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-full);
    color: var(--color-white);
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-semibold);
    margin-bottom: var(--spacing-lg);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.hero-title {
    font-size: var(--font-size-6xl);
    font-weight: var(--font-weight-extrabold);
    color: var(--color-white);
    line-height: 1.1;
    margin-bottom: var(--spacing-lg);
}

.gradient-text {
    background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-description {
    font-size: var(--font-size-xl);
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.7;
    margin-bottom: var(--spacing-2xl);
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.aplika-logo-inline {
    height: 32px;
    width: auto;
    vertical-align: middle;
    transition: transform 0.2s ease;
    background: rgba(255, 255, 255, 0.1);
    padding: 4px 8px;
    border-radius: 6px;
}

.aplika-logo-inline:hover {
    transform: scale(1.1);
    background: rgba(255, 255, 255, 0.2);
}

.hero-cta {
    display: flex;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-3xl);
}

.hero-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--spacing-xl);
    padding-top: var(--spacing-2xl);
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: var(--font-size-4xl);
    font-weight: var(--font-weight-extrabold);
    color: var(--color-white);
    font-family: var(--font-heading);
}

.stat-label {
    font-size: var(--font-size-sm);
    color: rgba(255, 255, 255, 0.8);
    margin-top: var(--spacing-xs);
}

.hero-image-wrapper {
    position: relative;
}

.hero-img {
    width: 100%;
    height: auto;
    filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.2));
}

.floating-card {
    position: absolute;
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    padding: var(--spacing-md) var(--spacing-lg);
    background: var(--color-white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    animation: float 3s ease-in-out infinite;
}

.floating-card.card-1 {
    top: 10%;
    right: -10%;
    animation-delay: 0s;
}

.floating-card.card-2 {
    bottom: 30%;
    left: -5%;
    animation-delay: 1s;
}

.floating-card.card-3 {
    bottom: 10%;
    right: 10%;
    animation-delay: 2s;
}

.card-icon {
    font-size: var(--font-size-2xl);
}

.card-text strong {
    display: block;
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-semibold);
    color: var(--color-gray-900);
}

.card-text span {
    font-size: var(--font-size-xs);
    color: var(--color-gray-500);
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

@media (max-width: 1024px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: var(--spacing-2xl);
    }
    
    .hero-title {
        font-size: var(--font-size-4xl);
    }
    
    .hero-image {
        order: -1;
    }
}

@media (max-width: 768px) {
    .hero-cta {
        flex-direction: column;
    }
    
    .hero-stats {
        grid-template-columns: 1fr;
        gap: var(--spacing-md);
    }
    
    .floating-card {
        display: none;
    }
}
</style>
