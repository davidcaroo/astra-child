<!-- 
  CTA (Call to Action) Block - Final conversion section
-->
<section class="cta-section section">
    <div class="cta-background">
        <div class="cta-gradient"></div>
        <div class="cta-pattern"></div>
    </div>
    
    <div class="container">
        <div class="cta-content animate-on-scroll fade-in">
            <div class="cta-badge">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 2L12.5 7.5L18 8.5L14 12.5L15 18L10 15.5L5 18L6 12.5L2 8.5L7.5 7.5L10 2Z" fill="currentColor"/>
                </svg>
                Oferta Especial
            </div>
            
            <h2 class="cta-title">
                Comienza Tu Transformación Profesional Hoy
            </h2>
            
            <p class="cta-description">
                Únete a más de 15,000 estudiantes que ya están construyendo carreras exitosas. Obtén acceso a todos nuestros cursos con un 40% de descuento por tiempo limitado.
            </p>
            
            <div class="cta-features">
                <div class="cta-feature">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 13L9 17L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Acceso ilimitado de por vida</span>
                </div>
                <div class="cta-feature">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 13L9 17L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Certificados reconocidos</span>
                </div>
                <div class="cta-feature">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 13L9 17L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Garantía de 30 días</span>
                </div>
            </div>
            
            <div class="cta-actions">
                <a href="#" class="btn btn-accent btn-lg">
                    Inscríbete Ahora
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M7 4L13 10L7 16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </a>
                <a href="#" class="btn btn-secondary btn-lg">
                    Ver Planes
                </a>
            </div>
            
            <div class="cta-trust">
                <div class="trust-item">
                    <div class="trust-stars">⭐⭐⭐⭐⭐</div>
                    <div class="trust-text">4.9/5 de 2,340 reseñas</div>
                </div>
                <div class="trust-divider"></div>
                <div class="trust-item">
                    <div class="trust-icon">🔒</div>
                    <div class="trust-text">Pago 100% seguro</div>
                </div>
                <div class="trust-divider"></div>
                <div class="trust-item">
                    <div class="trust-icon">✓</div>
                    <div class="trust-text">Sin compromisos</div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.cta-section {
    position: relative;
    overflow: hidden;
    padding: var(--spacing-4xl) 0;
}

.cta-background {
    position: absolute;
    inset: 0;
    z-index: 0;
}

.cta-gradient {
    position: absolute;
    inset: 0;
    background: var(--gradient-secondary);
    opacity: 0.95;
}

.cta-pattern {
    position: absolute;
    inset: 0;
    background-image: 
        radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
}

.cta-content {
    position: relative;
    z-index: 1;
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.cta-badge {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-sm) var(--spacing-lg);
    background: rgba(255, 179, 0, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 179, 0, 0.3);
    border-radius: var(--radius-full);
    color: #FFD700;
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-semibold);
    margin-bottom: var(--spacing-lg);
    animation: pulse 2s ease-in-out infinite;
}

.cta-title {
    font-size: var(--font-size-5xl);
    font-weight: var(--font-weight-extrabold);
    color: var(--color-white);
    line-height: 1.1;
    margin-bottom: var(--spacing-lg);
}

.cta-description {
    font-size: var(--font-size-xl);
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.7;
    margin-bottom: var(--spacing-2xl);
}

.cta-features {
    display: flex;
    justify-content: center;
    gap: var(--spacing-xl);
    margin-bottom: var(--spacing-2xl);
    flex-wrap: wrap;
}

.cta-feature {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    color: var(--color-white);
    font-size: var(--font-size-base);
    font-weight: var(--font-weight-medium);
}

.cta-feature svg {
    flex-shrink: 0;
    color: #FFD700;
}

.cta-actions {
    display: flex;
    justify-content: center;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-3xl);
    flex-wrap: wrap;
}

.cta-trust {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: var(--spacing-xl);
    padding-top: var(--spacing-2xl);
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    flex-wrap: wrap;
}

.trust-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    color: rgba(255, 255, 255, 0.9);
}

.trust-stars {
    font-size: var(--font-size-lg);
}

.trust-icon {
    font-size: var(--font-size-xl);
}

.trust-text {
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-medium);
}

.trust-divider {
    width: 1px;
    height: 24px;
    background: rgba(255, 255, 255, 0.3);
}

@media (max-width: 768px) {
    .cta-title {
        font-size: var(--font-size-3xl);
    }
    
    .cta-features {
        flex-direction: column;
        align-items: center;
        gap: var(--spacing-md);
    }
    
    .cta-actions {
        flex-direction: column;
    }
    
    .cta-actions .btn {
        width: 100%;
    }
    
    .trust-divider {
        display: none;
    }
    
    .cta-trust {
        flex-direction: column;
        gap: var(--spacing-md);
    }
}
</style>
