<!-- 
  Metrics/Stats Block - Showcase academy achievements
-->
<section class="metrics-section section bg-primary">
    <div class="container">
        <div class="metrics-content">
            <div class="metrics-text animate-on-scroll slide-in-left">
                <h2 class="metrics-title">Resultados que Hablan por Sí Mismos</h2>
                <p class="metrics-description">
                    Miles de estudiantes han transformado sus carreras con nuestros cursos. Únete a una comunidad de profesionales exitosos.
                </p>
                <a href="#" class="btn btn-secondary btn-lg">Comienza Ahora</a>
            </div>
            
            <div class="metrics-stats animate-on-scroll slide-in-right">
                <div class="stat-box">
                    <div class="stat-icon">🎓</div>
                    <div class="stat-value">
                        <span class="counter" data-target="15000">0</span>+
                    </div>
                    <div class="stat-label">Estudiantes Graduados</div>
                </div>
                
                <div class="stat-box">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-value">
                        <span class="counter" data-target="98">0</span>%
                    </div>
                    <div class="stat-label">Satisfacción</div>
                </div>
                
                <div class="stat-box">
                    <div class="stat-icon">🏆</div>
                    <div class="stat-value">
                        <span class="counter" data-target="150">0</span>+
                    </div>
                    <div class="stat-label">Cursos Premium</div>
                </div>
                
                <div class="stat-box">
                    <div class="stat-icon">💼</div>
                    <div class="stat-value">
                        <span class="counter" data-target="85">0</span>%
                    </div>
                    <div class="stat-label">Tasa de Empleo</div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.metrics-section {
    position: relative;
    overflow: hidden;
}

.metrics-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    border-radius: 50%;
}

.metrics-content {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: var(--spacing-3xl);
    align-items: center;
}

.metrics-title {
    font-size: var(--font-size-4xl);
    color: var(--color-white);
    margin-bottom: var(--spacing-lg);
}

.metrics-description {
    font-size: var(--font-size-lg);
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.7;
    margin-bottom: var(--spacing-2xl);
}

.metrics-stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--spacing-xl);
}

.stat-box {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-xl);
    padding: var(--spacing-xl);
    text-align: center;
    transition: all var(--transition-base);
}

.stat-box:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(-5px);
}

.stat-icon {
    font-size: 3rem;
    margin-bottom: var(--spacing-md);
}

.stat-value {
    font-size: var(--font-size-5xl);
    font-weight: var(--font-weight-extrabold);
    color: var(--color-white);
    font-family: var(--font-heading);
    line-height: 1;
    margin-bottom: var(--spacing-sm);
}

.stat-label {
    font-size: var(--font-size-base);
    color: rgba(255, 255, 255, 0.8);
    font-weight: var(--font-weight-medium);
}

@media (max-width: 1024px) {
    .metrics-content {
        grid-template-columns: 1fr;
    }
    
    .metrics-stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .metrics-stats {
        grid-template-columns: 1fr;
    }
}
</style>
