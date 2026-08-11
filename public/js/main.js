/**
 * Barbershop Website - Main JavaScript
 * Mobile menu, flash auto-dismiss, form validation, star ratings
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // === Mobile Menu Toggle ===
    const mobileToggle = document.getElementById('mobileMenuToggle');
    const mainNav = document.getElementById('mainNav');

    if (mobileToggle && mainNav) {
        mobileToggle.addEventListener('click', function() {
            mobileToggle.classList.toggle('active');
            mainNav.classList.toggle('active');
            document.body.classList.toggle('nav-open');

            // Hamburger animatie
            const spans = mobileToggle.querySelectorAll('span');
            spans.forEach(span => span.style.transition = '0.3s ease');
        });

        // Sluit menu bij klikken op link
        const navLinks = mainNav.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileToggle.classList.remove('active');
                mainNav.classList.remove('active');
                document.body.classList.remove('nav-open');
            });
        });
    }

    // === Flash Auto-dismiss ===
    const flashMessages = document.querySelectorAll('.flash');
    flashMessages.forEach(function(flash) {
        setTimeout(function() {
            flash.style.opacity = '0';
            flash.style.transform = 'translateY(-10px)';
            setTimeout(function() {
                if (flash.parentNode) {
                    flash.parentNode.removeChild(flash);
                }
            }, 300);
        }, 5000);
    });

    // === Star Rating Input ===
    const starInputs = document.querySelectorAll('.star-rating-input');
    starInputs.forEach(function(starGroup) {
        const starLabels = starGroup.querySelectorAll('label');
        const starValueInput = starGroup.previousElementSibling;

        starLabels.forEach(function(label, index) {
            label.addEventListener('mouseenter', function() {
                starLabels.forEach((l, i) => {
                    l.style.color = i <= index ? '#f5a623' : '#ddd';
                });
            });

            label.addEventListener('mouseleave', function() {
                starLabels.forEach((l, i) => {
                    const input = l.previousElementSibling;
                    l.style.color = input && input.checked ? '#f5a623' : '#ddd';
                });
            });

            label.addEventListener('click', function() {
                const input = label.previousElementSibling;
                if (input && input.checked) {
                    starLabels.forEach(l => l.style.color = '#ddd');
                    input.checked = false;
                }
            });
        });
    });

    // === Form Validation (client-side) ===
    const forms = document.querySelectorAll('form[novalidate]');
    forms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            const required = form.querySelectorAll('[required]');
            let isValid = true;

            required.forEach(function(field) {
                const value = field.value.trim();
                if (!value) {
                    isValid = false;
                    field.classList.add('error');
                } else {
                    field.classList.remove('error');
                }

                // Email validatie
                if (field.type === 'email' && value && !isValidEmail(value)) {
                    isValid = false;
                    field.classList.add('error');
                }
            });

            if (!isValid) {
                e.preventDefault();
                // Scroll naar eerste error
                const firstError = form.querySelector('.error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstError.focus();
                }
            }
        });
    });

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // === Smooth Scrolling voor anchor links ===
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // === Lazy loading effect ===
    const lazyImages = document.querySelectorAll('img[data-src]');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(function(img) {
            imageObserver.observe(img);
        });
    }

    // === Foto Carousel ===
    const carousel = document.getElementById('homeCarousel');
    if (carousel) {
        const track = document.getElementById('carouselTrack');
        const slides = track ? track.querySelectorAll('.carousel-slide') : [];
        const prevBtn = document.getElementById('carouselPrev');
        const nextBtn = document.getElementById('carouselNext');
        const dotsContainer = document.getElementById('carouselDots');
        let currentSlide = 0;
        let autoplayInterval;

        if (slides.length > 0) {
            // Maak dots
            if (dotsContainer) {
                slides.forEach((_, i) => {
                    const dot = document.createElement('button');
                    dot.className = 'carousel-dot' + (i === 0 ? ' active' : '');
                    dot.setAttribute('aria-label', `Slide ${i + 1}`);
                    dot.addEventListener('click', () => goToSlide(i));
                    dotsContainer.appendChild(dot);
                });
            }

            function goToSlide(index) {
                currentSlide = (index + slides.length) % slides.length;
                track.style.transform = `translateX(-${currentSlide * 100}%)`;
                updateDots();
            }

            function updateDots() {
                const dots = dotsContainer ? dotsContainer.querySelectorAll('.carousel-dot') : [];
                dots.forEach((dot, i) => dot.classList.toggle('active', i === currentSlide));
            }

            if (prevBtn) prevBtn.addEventListener('click', () => { goToSlide(currentSlide - 1); resetAutoplay(); });
            if (nextBtn) nextBtn.addEventListener('click', () => { goToSlide(currentSlide + 1); resetAutoplay(); });

            function startAutoplay() {
                autoplayInterval = setInterval(() => goToSlide(currentSlide + 1), 5000);
            }

            function resetAutoplay() {
                clearInterval(autoplayInterval);
                startAutoplay();
            }

            startAutoplay();

            // Pause op hover
            carousel.addEventListener('mouseenter', () => clearInterval(autoplayInterval));
            carousel.addEventListener('mouseleave', startAutoplay);

            // Touch swipe
            let touchStartX = 0;
            carousel.addEventListener('touchstart', e => { touchStartX = e.changedTouches[0].screenX; }, { passive: true });
            carousel.addEventListener('touchend', e => {
                const diff = touchStartX - e.changedTouches[0].screenX;
                if (Math.abs(diff) > 50) {
                    goToSlide(diff > 0 ? currentSlide + 1 : currentSlide - 1);
                    resetAutoplay();
                }
            }, { passive: true });
        }
    }

    // === Lightbox (Fotogalerij) ===
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxCaption = document.getElementById('lightboxCaption');
    const lightboxClose = document.getElementById('lightboxClose');
    const lightboxPrev = document.getElementById('lightboxPrev');
    const lightboxNext = document.getElementById('lightboxNext');
    let currentPhotoIndex = 0;
    const photos = [];

    galleryItems.forEach(item => {
        photos.push({
            src: item.dataset.src,
            caption: item.querySelector('figcaption')?.textContent?.trim() || ''
        });
        item.addEventListener('click', () => openLightbox([...galleryItems].indexOf(item)));
    });

    function openLightbox(index) {
        if (!lightbox || photos.length === 0) return;
        currentPhotoIndex = index;
        updateLightbox();
        lightbox.classList.add('active');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        if (!lightbox) return;
        lightbox.classList.remove('active');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    function updateLightbox() {
        if (!lightboxImg || !lightboxCaption || !photos[currentPhotoIndex]) return;
        lightboxImg.src = photos[currentPhotoIndex].src;
        lightboxImg.alt = photos[currentPhotoIndex].caption;
        lightboxCaption.textContent = photos[currentPhotoIndex].caption;
    }

    function showPrev() { currentPhotoIndex = (currentPhotoIndex - 1 + photos.length) % photos.length; updateLightbox(); }
    function showNext() { currentPhotoIndex = (currentPhotoIndex + 1) % photos.length; updateLightbox(); }

    if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
    if (lightboxPrev) lightboxPrev.addEventListener('click', showPrev);
    if (lightboxNext) lightboxNext.addEventListener('click', showNext);
    if (lightbox) {
        lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });
    }

    document.addEventListener('keydown', e => {
        if (!lightbox || !lightbox.classList.contains('active')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') showPrev();
        if (e.key === 'ArrowRight') showNext();
    });

    // === Page loaded ===
    const body = document.querySelector('body');
    if (body) {
        body.classList.add('loaded');
    }
});
