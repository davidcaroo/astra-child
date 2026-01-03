<!-- 
  Courses Grid Block - Display courses in modern card grid
-->
<section class="courses-section section" id="cursos">
    <div class="container">
        <div class="section-header text-center animate-on-scroll fade-in">
            <span class="section-badge">Nuestros Cursos</span>
            <h2 class="section-title">Explora Nuestra Oferta Educativa</h2>
            <p class="section-description">
                Cursos diseñados por expertos para llevarte del nivel básico al avanzado en marketing, ventas y emprendimiento
            </p>
        </div>
        
        <div class="courses-filter">
            <button class="filter-btn active" data-filter="all">Todos</button>
            <button class="filter-btn" data-filter="marketing">Marketing</button>
            <button class="filter-btn" data-filter="ventas">Ventas</button>
            <button class="filter-btn" data-filter="emprendimiento">Emprendimiento</button>
        </div>
        
        <div class="courses-grid">
            <!-- Course Card 1 -->
            <div class="course-card animate-on-scroll fade-in" data-category="marketing">
                <div class="course-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/course-1.jpg" alt="Marketing Digital Avanzado">
                    <div class="course-badge">Bestseller</div>
                    <div class="course-level">Avanzado</div>
                </div>
                <div class="course-content">
                    <div class="course-meta">
                        <span class="course-category">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M2 4L8 2L14 4V8C14 11.5 11 14 8 14C5 14 2 11.5 2 8V4Z" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            Marketing Digital
                        </span>
                        <span class="course-rating">
                            ⭐ 4.9 (2,340)
                        </span>
                    </div>
                    
                    <h3 class="course-title">Marketing Digital Avanzado 2024</h3>
                    <p class="course-description">
                        Domina las estrategias más efectivas de marketing digital, desde SEO hasta campañas pagadas en redes sociales.
                    </p>
                    
                    <div class="course-info">
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M8 4V8L11 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <span>42 horas</span>
                        </div>
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M8 2L10 6L14 7L11 10L12 14L8 12L4 14L5 10L2 7L6 6L8 2Z" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            <span>Certificado</span>
                        </div>
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M5 8C6.10457 8 7 7.10457 7 6C7 4.89543 6.10457 4 5 4C3.89543 4 3 4.89543 3 6C3 7.10457 3.89543 8 5 8Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M11 8C12.1046 8 13 7.10457 13 6C13 4.89543 12.1046 4 11 4C9.89543 4 9 4.89543 9 6C9 7.10457 9.89543 8 11 8Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M1 13C1 11 3 10 5 10C7 10 9 11 9 13" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M7 13C7 11 9 10 11 10C13 10 15 11 15 13" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            <span>3,450 estudiantes</span>
                        </div>
                    </div>
                    
                    <div class="course-footer">
                        <div class="course-price">
                            <span class="price-old">$299</span>
                            <span class="price-current">$199</span>
                        </div>
                        <a href="#" class="btn btn-primary">Ver Curso</a>
                    </div>
                </div>
            </div>
            
            <!-- Course Card 2 -->
            <div class="course-card animate-on-scroll fade-in" data-category="ventas">
                <div class="course-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/course-2.jpg" alt="Ventas B2B">
                    <div class="course-badge new">Nuevo</div>
                    <div class="course-level">Intermedio</div>
                </div>
                <div class="course-content">
                    <div class="course-meta">
                        <span class="course-category">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M2 4L8 2L14 4V8C14 11.5 11 14 8 14C5 14 2 11.5 2 8V4Z" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            Ventas
                        </span>
                        <span class="course-rating">
                            ⭐ 5.0 (890)
                        </span>
                    </div>
                    
                    <h3 class="course-title">Estrategias de Ventas B2B</h3>
                    <p class="course-description">
                        Aprende técnicas probadas para cerrar ventas complejas y construir relaciones duraderas con clientes corporativos.
                    </p>
                    
                    <div class="course-info">
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M8 4V8L11 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <span>28 horas</span>
                        </div>
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M8 2L10 6L14 7L11 10L12 14L8 12L4 14L5 10L2 7L6 6L8 2Z" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            <span>Certificado</span>
                        </div>
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M5 8C6.10457 8 7 7.10457 7 6C7 4.89543 6.10457 4 5 4C3.89543 4 3 4.89543 3 6C3 7.10457 3.89543 8 5 8Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M11 8C12.1046 8 13 7.10457 13 6C13 4.89543 12.1046 4 11 4C9.89543 4 9 4.89543 9 6C9 7.10457 9.89543 8 11 8Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M1 13C1 11 3 10 5 10C7 10 9 11 9 13" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M7 13C7 11 9 10 11 10C13 10 15 11 15 13" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            <span>1,890 estudiantes</span>
                        </div>
                    </div>
                    
                    <div class="course-footer">
                        <div class="course-price">
                            <span class="price-current">$179</span>
                        </div>
                        <a href="#" class="btn btn-primary">Ver Curso</a>
                    </div>
                </div>
            </div>
            
            <!-- Course Card 3 -->
            <div class="course-card animate-on-scroll fade-in" data-category="emprendimiento">
                <div class="course-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/course-3.jpg" alt="Emprendimiento Digital">
                    <div class="course-level">Principiante</div>
                </div>
                <div class="course-content">
                    <div class="course-meta">
                        <span class="course-category">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M2 4L8 2L14 4V8C14 11.5 11 14 8 14C5 14 2 11.5 2 8V4Z" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            Emprendimiento
                        </span>
                        <span class="course-rating">
                            ⭐ 4.8 (1,560)
                        </span>
                    </div>
                    
                    <h3 class="course-title">Emprendimiento Digital desde Cero</h3>
                    <p class="course-description">
                        Construye y lanza tu negocio digital con estrategias probadas, desde la idea hasta la primera venta.
                    </p>
                    
                    <div class="course-info">
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M8 4V8L11 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <span>35 horas</span>
                        </div>
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M8 2L10 6L14 7L11 10L12 14L8 12L4 14L5 10L2 7L6 6L8 2Z" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            <span>Certificado</span>
                        </div>
                        <div class="info-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M5 8C6.10457 8 7 7.10457 7 6C7 4.89543 6.10457 4 5 4C3.89543 4 3 4.89543 3 6C3 7.10457 3.89543 8 5 8Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M11 8C12.1046 8 13 7.10457 13 6C13 4.89543 12.1046 4 11 4C9.89543 4 9 4.89543 9 6C9 7.10457 9.89543 8 11 8Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M1 13C1 11 3 10 5 10C7 10 9 11 9 13" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M7 13C7 11 9 10 11 10C13 10 15 11 15 13" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            <span>2,780 estudiantes</span>
                        </div>
                    </div>
                    
                    <div class="course-footer">
                        <div class="course-price">
                            <span class="price-old">$249</span>
                            <span class="price-current">$149</span>
                        </div>
                        <a href="#" class="btn btn-primary">Ver Curso</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="#" class="btn btn-secondary btn-lg">Ver Todos los Cursos</a>
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

.courses-filter {
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

.course-badge.new {
    background: var(--color-success);
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
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
}

.course-title {
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-gray-900);
    margin-bottom: var(--spacing-md);
    line-height: 1.3;
}

.course-description {
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
}

.course-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.course-price {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.price-old {
    font-size: var(--font-size-base);
    color: var(--color-gray-400);
    text-decoration: line-through;
}

.price-current {
    font-size: var(--font-size-2xl);
    font-weight: var(--font-weight-extrabold);
    color: var(--color-primary);
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
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter courses
            courseCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
