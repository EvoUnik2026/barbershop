    <!-- Voettekst / Footer -->
    <footer class="site-footer">
        <div class="container footer-inner">
            <div class="footer-col">
                <div class="footer-logo">
                    <img src="/images/dali.png" alt="<?php echo escape(s('shop_name')); ?>" class="logo-img footer-logo-img">
                    <span class="logo-text">
                        <span class="logo-name"><?php echo escape(s('shop_name', 'Barbershop')); ?></span>
                        <span class="logo-tagline"><?php echo escape(s('tagline', 'Haar & Baard Styling')); ?></span>
                    </span>
                </div>
                <p class="footer-tagline"><?php echo escape(s('tagline', 'Haar & Baard Styling voor Heren')); ?></p>
                <p class="footer-since">Sinds <?php echo escape(s('since_year', '2015')); ?> &#8226; Apeldoorn</p>
            </div>

            <div class="footer-col">
                <h4 class="footer-title">Contact</h4>
                <div class="footer-contact">
                    <p><strong>Bezoekadres</strong><br>
                        <?php echo escape(s('address_street', '')); ?><br>
                        <?php echo escape(s('address_postal', '') . ' ' . s('address_city', '')); ?>
                    </p>
                    <p><strong>Telefoon</strong><br>
                        <a href="tel:<?php echo escape(str_replace([' ', '-'], '', s('phone', ''))); ?>"><?php echo escape(s('phone', '')); ?></a>
                    </p>
                    <p><strong>E-mail</strong><br>
                        <a href="mailto:<?php echo escape(s('email', '')); ?>"><?php echo escape(s('email', '')); ?></a>
                    </p>
                </div>
            </div>

            <div class="footer-col">
                <h4 class="footer-title">Openingstijden</h4>
                <table class="opening-hours">
                    <tr><td>Maandag</td><td>13:00 - 18:00</td></tr>
                    <tr><td>Dinsdag</td><td>10:00 - 18:00</td></tr>
                    <tr><td>Woensdag</td><td>10:00 - 18:00</td></tr>
                    <tr><td>Donderdag</td><td>10:00 - 21:00</td></tr>
                    <tr><td>Vrijdag</td><td>10:00 - 21:00</td></tr>
                    <tr><td>Zaterdag</td><td>10:00 - 18:00</td></tr>
                    <tr><td>Zondag</td><td class="closed">Gesloten</td></tr>
                </table>
            </div>

            <div class="footer-col">
                <h4 class="footer-title">Snelle Links</h4>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">Over Ons</a></li>
                    <li><a href="/services">Diensten</a></li>
                    <li><a href="/gallery">Galerij</a></li>
                    <li><a href="/appointment">Afspraak Maken</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/reviews">Reviews</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p class="copyright">&copy; <?php echo date('Y'); ?> <?php echo escape(s('shop_name', 'Barbershop')); ?>. Alle rechten voorbehouden.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook" class="social-link">f</a>
                    <a href="#" aria-label="Instagram" class="social-link">ig</a>
                    <a href="#" aria-label="WhatsApp" class="social-link">wa</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Logo Lightbox -->
    <div class="logo-lightbox" id="logoLightbox">
        <span class="logo-lightbox-close">&times;</span>
        <img src="/images/dali.png" alt="<?php echo escape(s('shop_name')); ?> - Volledig logo">
    </div>

    <!-- Floating Buttons -->
    <div class="floating-buttons">
        <a href="https://wa.me/31618737335?text=Hallo%20Dali%20The%20Barber%2C%20ik%20wil%20graag%20een%20afspraak%20maken."
           class="floating-btn whatsapp-btn"
           aria-label="Chat met ons via WhatsApp"
           target="_blank"
           rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
        </a>
        <button class="floating-btn back-to-top hidden"
                aria-label="Terug naar boven"
                title="Terug naar boven">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4l-8 8h6v8h4v-8h6z"/>
            </svg>
        </button>
    </div>

    <!-- JavaScript -->
    <script src="/js/main.js"></script>
    <script>
        // Back to top button
        const backToTopBtn = document.querySelector('.back-to-top');

        if (backToTopBtn) {
            // Show/hide op scroll
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.remove('hidden');
                    backToTopBtn.classList.add('visible');
                } else {
                    backToTopBtn.classList.add('hidden');
                    backToTopBtn.classList.remove('visible');
                }
            });

            // Smooth scroll naar boven
            backToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // Logo Lightbox
        const logoLink = document.getElementById('logoLink');
        const logoLightbox = document.getElementById('logoLightbox');
        const lightboxClose = document.querySelector('.logo-lightbox-close');

        if (logoLink && logoLightbox) {
            // Open lightbox bij klik op logo
            logoLink.addEventListener('click', function(e) {
                e.preventDefault();
                logoLightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            // Sluit lightbox bij klik op X
            if (lightboxClose) {
                lightboxClose.addEventListener('click', function() {
                    logoLightbox.classList.remove('active');
                    document.body.style.overflow = '';
                });
            }

            // Sluit lightbox bij klik op achtergrond
            logoLightbox.addEventListener('click', function(e) {
                if (e.target === logoLightbox) {
                    logoLightbox.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });

            // Sluit lightbox met ESC toets
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && logoLightbox.classList.contains('active')) {
                    logoLightbox.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        }
    </script>
</body>
</html>