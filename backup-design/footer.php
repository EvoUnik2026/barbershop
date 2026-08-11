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

    <!-- JavaScript -->
    <script src="/js/main.js"></script>
</body>
</html>