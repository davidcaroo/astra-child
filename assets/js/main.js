/**
 * Emprende Sin Límites - Main JavaScript
 * Modern interactions and animations
 */

(function ($) {
    'use strict';

    // Wait for DOM to be ready
    $(document).ready(function () {

        // Initialize all components
        initMobileMenu();
        initSmoothScroll();
        initScrollAnimations();
        initCounters();
        initAccordions();
        initTabs();
        initModals();
        initFormValidation();
        initHeaderScroll();

    });

    /**
     * Mobile Menu Toggle - New Implementation
     */
    function initMobileMenu() {
        const mobileToggle = $('.mobile-toggle');
        const mobileOverlay = $('.mobile-menu-overlay');
        const body = $('body');

        // Toggle menu on button click
        mobileToggle.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const isActive = $(this).hasClass('active');

            if (isActive) {
                // Close menu
                $(this).removeClass('active');
                $(this).attr('aria-expanded', 'false');
                $(this).attr('aria-label', 'Abrir menú');
                mobileOverlay.removeClass('active');
                body.removeClass('mobile-menu-open');
            } else {
                // Open menu
                $(this).addClass('active');
                $(this).attr('aria-expanded', 'true');
                $(this).attr('aria-label', 'Cerrar menú');
                mobileOverlay.addClass('active');
                body.addClass('mobile-menu-open');
            }
        });

        // Close menu when clicking outside
        mobileOverlay.on('click', function (e) {
            if ($(e.target).is('.mobile-menu-overlay')) {
                mobileToggle.removeClass('active');
                mobileToggle.attr('aria-expanded', 'false');
                mobileToggle.attr('aria-label', 'Abrir menú');
                mobileOverlay.removeClass('active');
                body.removeClass('mobile-menu-open');
            }
        });

        // Close menu on ESC key
        $(document).on('keyup', function (e) {
            if (e.key === 'Escape' && mobileOverlay.hasClass('active')) {
                mobileToggle.removeClass('active');
                mobileToggle.attr('aria-expanded', 'false');
                mobileToggle.attr('aria-label', 'Abrir menú');
                mobileOverlay.removeClass('active');
                body.removeClass('mobile-menu-open');
            }
        });

        // Close menu when clicking on menu links
        $('.mobile-nav-menu a').on('click', function () {
            mobileToggle.removeClass('active');
            mobileToggle.attr('aria-expanded', 'false');
            mobileToggle.attr('aria-label', 'Abrir menú');
            mobileOverlay.removeClass('active');
            body.removeClass('mobile-menu-open');
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function (e) {
            const target = $(this.getAttribute('href'));

            if (target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });
    }

    /**
     * Scroll Animations - Fade in elements on scroll
     */
    function initScrollAnimations() {
        const animatedElements = $('.animate-on-scroll');

        if (animatedElements.length === 0) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        animatedElements.each(function () {
            observer.observe(this);
        });
    }

    /**
     * Animated Counters
     */
    function initCounters() {
        const counters = $('.counter');

        if (counters.length === 0) return;

        const animateCounter = (element) => {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    element.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target;
                }
            };

            updateCounter();
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    animateCounter(entry.target);
                    entry.target.classList.add('counted');
                }
            });
        }, { threshold: 0.5 });

        counters.each(function () {
            observer.observe(this);
        });
    }

    /**
     * Accordion Functionality
     */
    function initAccordions() {
        $('.accordion-header').on('click', function () {
            const accordionItem = $(this).parent();
            const accordionContent = accordionItem.find('.accordion-content');
            const isActive = accordionItem.hasClass('active');

            // Close all accordions in the same group
            accordionItem.siblings('.accordion-item').removeClass('active')
                .find('.accordion-content').slideUp(300);

            // Toggle current accordion
            if (!isActive) {
                accordionItem.addClass('active');
                accordionContent.slideDown(300);
            } else {
                accordionItem.removeClass('active');
                accordionContent.slideUp(300);
            }
        });
    }

    /**
     * Tabs Functionality
     */
    function initTabs() {
        $('.tab-link').on('click', function (e) {
            e.preventDefault();

            const tabId = $(this).attr('data-tab');
            const tabGroup = $(this).closest('.tabs');

            // Remove active class from all tabs and contents
            tabGroup.find('.tab-link').removeClass('active');
            tabGroup.find('.tab-content').removeClass('active');

            // Add active class to clicked tab and corresponding content
            $(this).addClass('active');
            tabGroup.find('#' + tabId).addClass('active');
        });
    }

    /**
     * Modal Functionality
     */
    function initModals() {
        // Open modal
        $('[data-modal]').on('click', function (e) {
            e.preventDefault();
            const modalId = $(this).attr('data-modal');
            $('#' + modalId).addClass('active');
            $('body').addClass('modal-open');
        });

        // Close modal
        $('.modal-close, .modal-backdrop').on('click', function () {
            $(this).closest('.modal').removeClass('active');
            $('body').removeClass('modal-open');
        });

        // Close on ESC key
        $(document).on('keyup', function (e) {
            if (e.key === 'Escape') {
                $('.modal').removeClass('active');
                $('body').removeClass('modal-open');
            }
        });
    }

    /**
     * Form Validation
     */
    function initFormValidation() {
        $('form.validate-form').on('submit', function (e) {
            let isValid = true;
            const form = $(this);

            // Clear previous errors
            form.find('.error-message').remove();
            form.find('.error').removeClass('error');

            // Validate required fields
            form.find('[required]').each(function () {
                const field = $(this);
                const value = field.val().trim();

                if (value === '') {
                    isValid = false;
                    field.addClass('error');
                    field.after('<span class="error-message">Este campo es requerido</span>');
                }
            });

            // Validate email fields
            form.find('input[type="email"]').each(function () {
                const field = $(this);
                const value = field.val().trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (value !== '' && !emailRegex.test(value)) {
                    isValid = false;
                    field.addClass('error');
                    field.after('<span class="error-message">Email inválido</span>');
                }
            });

            if (!isValid) {
                e.preventDefault();
                // Scroll to first error
                $('html, body').animate({
                    scrollTop: form.find('.error').first().offset().top - 100
                }, 300);
            }
        });

        // Remove error on input
        $('form.validate-form input, form.validate-form textarea').on('input', function () {
            $(this).removeClass('error');
            $(this).next('.error-message').remove();
        });
    }

    /**
     * Header Scroll Effect
     */
    function initHeaderScroll() {
        const header = $('.site-header');
        let lastScroll = 0;

        $(window).on('scroll', function () {
            const currentScroll = $(this).scrollTop();

            // Add shadow on scroll
            if (currentScroll > 50) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }

            // Hide/show header on scroll
            if (currentScroll > lastScroll && currentScroll > 200) {
                header.addClass('header-hidden');
            } else {
                header.removeClass('header-hidden');
            }

            lastScroll = currentScroll;
        });
    }

    /**
     * Lazy Load Images
     */
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.add('loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        const backToTop = $('<button class="back-to-top" aria-label="Volver arriba"><i class="icon-arrow-up"></i></button>');
        $('body').append(backToTop);

        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 300) {
                backToTop.addClass('visible');
            } else {
                backToTop.removeClass('visible');
            }
        });

        backToTop.on('click', function () {
            $('html, body').animate({ scrollTop: 0 }, 600);
        });
    }

    // Initialize back to top
    initBackToTop();

})(jQuery);
