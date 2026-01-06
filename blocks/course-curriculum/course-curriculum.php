<?php
/**
 * Course Curriculum Block - Displays modules for 'Crece Inteligente'
 */
?>
<section id="curriculum" class="curriculum-section section">
    <div class="container">
        <div class="section-header text-center animate-on-scroll fade-in">
            <span class="badge badge-primary">Plan de Estudios</span>
            <h2 class="section-title">Contenido del Curso</h2>
            <p class="section-subtitle">10 Módulos diseñados para transformar tu visión emprendedora en una estrategia de negocio real.</p>
        </div>

        <div class="modules-grid">
            <?php
            $modules = array(
                array(
                    'step' => '01',
                    'title' => 'Mentalidad Emprendedora',
                    'desc' => 'Desarrollo de resiliencia, hábitos de crecimiento y superación de creencias limitantes.',
                    'icon' => '🧠'
                ),
                array(
                    'step' => '02',
                    'title' => 'Identidad Estratégica',
                    'desc' => 'Definición de misión, visión y objetivos claros para tu modelo de negocio.',
                    'icon' => '🎯'
                ),
                array(
                    'step' => '03',
                    'title' => 'Propuesta de Valor',
                    'desc' => 'Diseño de soluciones diferenciadoras que resuelven problemas reales del mercado.',
                    'icon' => '💡'
                ),
                array(
                    'step' => '04',
                    'title' => 'Socios y Alianzas',
                    'desc' => 'Identificación y evaluación de aliados estratégicos para potenciar tu alcance.',
                    'icon' => '🤝'
                ),
                array(
                    'step' => '05',
                    'title' => 'Canales de Distribución',
                    'desc' => 'Estrategias para llevar tu producto al cliente final de forma eficiente.',
                    'icon' => '🛤️'
                ),
                array(
                    'step' => '06',
                    'title' => 'Marketing y Ventas',
                    'desc' => 'Dominio de redes sociales, WhatsApp Business y cierres de venta digitales.',
                    'icon' => '📱'
                ),
                array(
                    'step' => '07',
                    'title' => 'Finanzas Emprendedoras',
                    'desc' => 'Control de costos, punto de equilibrio y gestión saludable del flujo de caja.',
                    'icon' => '💰'
                ),
                array(
                    'step' => '08',
                    'title' => 'Financiamiento y Recursos',
                    'desc' => 'Acceso a convocatorias, programas de apoyo y fuentes de inversión.',
                    'icon' => '🏛️'
                ),
                array(
                    'step' => '09',
                    'title' => 'Inteligencia Artificial y KPIs',
                    'desc' => 'Optimización de procesos con IA y medición de resultados con datos reales.',
                    'icon' => '🤖'
                ),
                array(
                    'step' => '10',
                    'title' => 'Plan de Crecimiento',
                    'desc' => 'Activación final y lanzamiento de tu plan estratégico de expansión.',
                    'icon' => '🚀'
                )
            );

            foreach ($modules as $index => $module) :
                $delay = ($index % 3) * 0.1;
            ?>
                <div class="module-card animate-on-scroll fade-in" style="animation-delay: <?php echo $delay; ?>s;">
                    <div class="module-step"><?php echo $module['step']; ?></div>
                    <div class="module-icon"><?php echo $module['icon']; ?></div>
                    <h3 class="module-title"><?php echo $module['title']; ?></h3>
                    <p class="module-desc"><?php echo $module['desc']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.curriculum-section {
    background: var(--color-gray-50);
    padding: var(--spacing-4xl) 0;
}

.modules-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--spacing-xl);
    margin-top: var(--spacing-3xl);
}

.module-card {
    background: var(--color-white);
    padding: var(--spacing-2xl);
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--color-gray-200);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.module-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-blue-lg);
    border-color: var(--color-primary-light);
}

.module-step {
    position: absolute;
    top: -10px;
    right: -10px;
    font-size: 80px;
    font-weight: 900;
    color: var(--color-gray-100);
    line-height: 1;
    z-index: 0;
    transition: all 0.3s ease;
}

.module-card:hover .module-step {
    color: rgba(0, 102, 255, 0.05);
}

.module-icon {
    font-size: 40px;
    margin-bottom: var(--spacing-lg);
    position: relative;
    z-index: 1;
}

.module-title {
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-gray-900);
    margin-bottom: var(--spacing-md);
    position: relative;
    z-index: 1;
}

.module-desc {
    font-size: var(--font-size-md);
    color: var(--color-gray-600);
    line-height: 1.6;
    position: relative;
    z-index: 1;
}

@media (max-width: 768px) {
    .modules-grid {
        grid-template-columns: 1fr;
    }
}
</style>
