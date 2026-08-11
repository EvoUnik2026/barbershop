<?php
/** @var array $photos */
?>

<section class="page-hero section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
    <div class="container">
        <h1 class="page-title">Fotogalerij</h1>
        <p class="page-subtitle">Een blik op Dali The Barber en ons werk</p>
    </div>
</section>

<section class="gallery-section section">
    <div class="container">
        <h2 class="section-title centered">Onze Shop</h2>
        <p class="section-subtitle">Klik op een foto om deze te vergroten</p>

        <div class="gallery-grid" id="galleryGrid">
            <?php foreach ($photos as $photo): ?>
            <figure class="gallery-item" data-src="<?php echo esc_url($photo['src']); ?>">
                <img src="<?php echo esc_url($photo['src']); ?>" alt="<?php echo escape($photo['alt']); ?>" loading="lazy">
                <figcaption><?php echo escape($photo['caption']); ?></figcaption>
            </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div class="lightbox" id="lightbox" aria-hidden="true">
    <button class="lightbox-close" id="lightboxClose" aria-label="Sluiten">&times;</button>
    <img class="lightbox-img" id="lightboxImg" src="" alt="">
    <button class="lightbox-prev" id="lightboxPrev" aria-label="Vorige">&#10094;</button>
    <button class="lightbox-next" id="lightboxNext" aria-label="Volgende">&#10095;</button>
    <div class="lightbox-caption" id="lightboxCaption"></div>
</div>
