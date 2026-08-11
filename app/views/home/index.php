<?php
/** @var array $featured_services */
/** @var array $reviews */
/** @var float $avg_rating */
/** @var int $reviewCount */
?>

<!-- Hero Sectie met video achtergrond -->
<section class="hero hero-video">
    <video autoplay muted loop playsinline class="hero-video-bg">
        <source src="https://video-previews.elements.envatousercontent.com/h264-video-previews/e0ac7c4e-cf7f-11e3-9fcd-005056923f83/7622379.mp4" type="video/mp4">
        <!-- Fallback: als de video niet laadt, gebruik dan een foto -->
    </video>
    <div class="hero-overlay"></div>
    <div class="container hero-content">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="hero-text">
            <h1 class="hero-title"><?php echo escape(s('shop_name', 'Barbershop')); ?></h1>
            <p class="hero-tagline"><?php echo escape(s('tagline', 'Ambacht & Vakmanschap')); ?></p>
            <p class="hero-desc">
                &#x3C5; &#x3C2; <?php echo escape(s('since_year', '2019')); ?> &#8226; Apeldoorn &#8226; Klanttevredenheid <?php echo escape(s('rating', '8.4')); ?>/10
            </p>
            <div class="hero-buttons">
                <a href="/appointment" class="btn btn-primary btn-lg">Afspraak Maken</a>
                <a href="/services" class="btn btn-secondary btn-lg">Onze Diensten</a>
            </div>
        </div>
    </div>
</section>

<!-- Welkom Sectie -->
<section class="welcome-section section">
    <div class="container">
        <div class="content-grid">
            <div class="content-col">
                <h2 class="section-title">Welkom bij <?php echo escape(s('shop_name', 'Barbershop')); ?></h2>
                <p class="lead">
                    Dali The Barber is een moderne barbershop in het hart van Apeldoorn,
                    waar vakmanschap en persoonlijke aandacht centraal staan.
                </p>
                <p>
                    Eigenaar Dalibor Zdravkovski brengt meer dan vijf jaar ervaring mee uit verschillende
                    barbershops. Wat voor velen een beroep is, voelt voor hem als een ambacht waarin
                    precisie, creativiteit en persoonlijke aandacht samenkomen.
                </p>
                <p>
                    Met scherp oog voor detail en trots op zijn Macedonische afkomst leveren wij
                    hoogwaardige kwaliteit tegen een eerlijke prijs. Of het nu een klassieke knipbeurt,
                    een strakke skinfade of een volledige makeover is - je verlaat de shop met een
                    frisse look en meer zelfvertrouwen.
                </p>
                <div class="badge-container">
                    <span class="badge">Sinds <?php echo escape(s('since_year', '2019')); ?></span>
                    <span class="badge">100% Tevredenheid</span>
                    <span class="badge">Eigenaar: Dalibor Z.</span>
                </div>
            </div>
            <div class="content-col">
                <div class="image-frame">
                    <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                         alt="Dali The Barber interieur" class="barber-img">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Foto Carousel (vervangt de oude donkerblauwe milestones sectie) -->
<section class="carousel-section section bg-dark">
    <div class="carousel" id="homeCarousel">
        <div class="carousel-track" id="carouselTrack">
            <div class="carousel-slide active">
                <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1400&q=80" alt="Dali The Barber interieur">
                <div class="carousel-caption"><h3>Welkom bij Dali The Barber</h3><p>Ambacht & vakmanschap in Apeldoorn</p></div>
            </div>
            <div class="carousel-slide">
                <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70?ixlib=rb-4.0.3&auto=format&fit=crop&w=1400&q=80" alt="Perfecte skinfade">
                <div class="carousel-caption"><h3>Ultra Strakke Fade</h3><p>De nieuwste haarstijlen op maat</p></div>
            </div>
            <div class="carousel-slide">
                <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1400&q=80" alt="Baard scheren met mes">
                <div class="carousel-caption"><h3>Baard Styling</h3><p>Perfect gevormd, met premium producten</p></div>
            </div>
            <div class="carousel-slide">
                <img src="https://images.unsplash.com/photo-1571902943223-12b96e5d2447?ixlib=rb-4.0.3&auto=format&fit=crop&w=1400&q=80" alt="Barber bezig met knippen">
                <div class="carousel-caption"><h3>Vakwerk</h3><p>Gespecialiseerd in elk haartype</p></div>
            </div>
        </div>

        <button class="carousel-btn carousel-prev" id="carouselPrev" aria-label="Vorige afbeelding">&#10094;</button>
        <button class="carousel-btn carousel-next" id="carouselNext" aria-label="Volgende afbeelding">&#10095;</button>

        <div class="carousel-dots" id="carouselDots"></div>
    </div>

    <!-- Compacte milestones band -->
    <div class="container">
        <div class="milestone-strip">
            <div class="ms-item"><span class="ms-value"><?php echo escape(s('since_year', '2015')); ?></span><span class="ms-label">Sinds</span></div>
            <div class="ms-item"><span class="ms-value">Apeldoorn</span><span class="ms-label">Gevestigd</span></div>
            <div class="ms-item"><span class="ms-value"><?php echo escape(s('rating', '8.4')); ?></span><span class="ms-label">Tevredenheid</span></div>
            <div class="ms-item"><span class="ms-value">1500+</span><span class="ms-label">Klanten</span></div>
        </div>
    </div>
</section>

<!-- Uitgelichte Diensten -->
<section class="services-preview section">
    <div class="container">
        <h2 class="section-title centered">Onze Populaire Diensten</h2>
        <p class="section-subtitle">Professionele haarstyling voor elk type haar</p>

        <div class="service-grid">
            <?php $icons = ['haircut' => '✂️', 'beard' => '🧔', 'styling' => '💈', 'color' => '🎨']; ?>
            <?php foreach ($featured_services as $service): ?>
            <div class="service-card">
                <div class="service-header">
                    <span class="service-icon"><?php echo $icons[$service['category']] ?? '✂️'; ?></span>
                    <h3 class="service-name"><?php echo escape($service['name']); ?></h3>
                    <span class="service-price"><?php echo formatCurrency((float)$service['price']); ?></span>
                </div>
                <p class="service-desc"><?php echo escape($service['description']); ?></p>
                <div class="service-duration">⏱ <?php echo (int)$service['duration']; ?> min</div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="center">
            <a href="/services" class="btn btn-secondary">Bekijk Alle Diensten</a>
        </div>
    </div>
</section>

<!-- Reviews Preview -->
<?php if (!empty($reviews)): ?>
<section class="reviews-preview section bg-light">
    <div class="container">
        <h2 class="section-title centered">Wat Onze Klanten Zeggen</h2>
        <p class="section-subtitle">Gemiddelde beoordeling: <strong><?php echo $avg_rating; ?></strong>/5 ster
            (<span><?php echo $reviewCount??2503; ?> reviews</span>)</p>

        <div class="review-slider">
            <?php foreach ($reviews as $review): ?>
            <div class="review-card">
                <div class="review-header">
                    <?php echo renderStars((int)$review['rating']); ?>
                    <div class="review-name">- <?php echo escape($review['customer_name']); ?></div>
                </div>
                <p class="review-text">
                    "<?php echo escape(truncate($review['comment'], 120)); ?>"
                </p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="center">
            <a href="/reviews" class="btn btn-primary">Bekijk Alle Reviews</a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Banner -->
<section class="cta-banner section">
    <div class="container">
        <div class="cta-content">
            <h2>Klaar voor een nieuwe look?</h2>
            <p>Boek nu je afspraak en ervaar het verschil van Dali The Barber.</p>
            <a href="/appointment" class="btn btn-primary btn-lg">Afspraak Maken</a>
        </div>
    </div>
</section>
