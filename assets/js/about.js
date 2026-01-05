(function($) {
    'use strict';

    $(document).ready(function() {
        initInstructorModals();
        initAboutAnimations();
    });

    /**
     * Instructor Modals Logic
     */
    function initInstructorModals() {
        const modal = $('#instructor-modal');
        const modalContent = $('#modal-content-placeholder');
        const openButtons = $('.open-instructor-modal, .instructor-image img');
        const closeButton = $('.modal-close');
        const backdrop = $('.modal-backdrop');

        openButtons.on('click', function(e) {
            e.preventDefault();
            const card = $(this).closest('.instructor-card');
            const instructorId = card.data('instructor-id');
            const content = $('#instructor-modal-content-' + instructorId).html();

            if (content) {
                modalContent.html(content);
                modal.addClass('active');
                $('body').addClass('modal-open');
                
                // Track modal content scroll
                $('.modal-container').scrollTop(0);
            }
        });

        function closeModal() {
            modal.removeClass('active');
            $('body').removeClass('modal-open');
            
            // Clean up content after transition
            setTimeout(() => {
                if (!modal.hasClass('active')) {
                    modalContent.html('');
                }
            }, 300);
        }

        closeButton.on('click', function(e) {
            e.stopPropagation();
            closeModal();
        });

        backdrop.on('click', closeModal);

        // Prevent clicks inside the container from closing the modal
        $('.modal-container').on('click', function(e) {
            e.stopPropagation();
        });

        $(document).on('keyup', function(e) {
            if (e.key === 'Escape' && modal.hasClass('active')) {
                closeModal();
            }
        });
    }

    /**
     * Specific Animations for About Page
     */
    function initAboutAnimations() {
        // We reuse the theme's animate-on-scroll logic
        // but can add specific ones here if needed.
    }

})(jQuery);
