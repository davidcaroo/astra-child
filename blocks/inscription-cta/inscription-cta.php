<?php
/**
 * Inscription CTA Block
 * High-impact section for Google Form registration
 */
?>

<section class="inscription-cta-section section">
    <div class="container">
        <div class="inscription-card animate-on-scroll fade-in">
            <div class="inscription-grid">
                <!-- Left Column: Content -->
                <div class="inscription-content">
                    <span class="inscription-badge">Primer Paso Obligatorio</span>
                    <h2 class="inscription-title">Caracterización e Inscripción Académica</h2>
                    <p class="inscription-text">
                        Antes de acceder a nuestros cursos, es fundamental realizar tu proceso de caracterización. Esto nos permite conocer tu perfil y brindarte una ruta de aprendizaje optimizada para tu éxito profesional.
                    </p>
                    
                    <ul class="inscription-benefits">
                        <li>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Perfilado profesional personalizado
                        </li>
                        <li>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Acceso prioritario a nuevas convocatorias
                        </li>
                        <li>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Asesoría inicial sin costo
                        </li>
                    </ul>

                    <div class="inscription-actions">
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSffLNmhX5l172AwtWo_ZVty_1k_yAwnWMtErTY4ALjAVcC2Sw/viewform" target="_blank" class="btn btn-primary btn-lg">
                            Completar Inscripción Ahora
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Visual -->
                <div class="inscription-visual">
                    <div class="visual-wrapper">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/inscription-visual.png" alt="Inscripción Premium" class="floating-image">
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
