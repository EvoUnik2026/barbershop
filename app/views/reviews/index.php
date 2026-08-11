<?php
/** @var array $reviews */
/** @var float $avg_rating */
/** @var int $reviewCount */
/** @var array $errors */
/** @var array $old */
?>

<section class="page-hero section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1539743077424-4c2b3b5b5b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
    <div class="container">
        <h1 class="page-title">Reviews & Beoordelingen</h1>
        <p class="page-subtitle"> Wat onze klanten over ons zeggen</p>
    </div>
</section>

<section class="reviews-hero section bg-dark">
    <div class="container text-center">
        <div class="rating-display">
            <div class="rating-score"><?php echo $avg_rating; ?></div>
            <?php echo renderStars((int)round($avg_rating)); ?>
            <p class="rating-count"><?php echo $reviewCount; ?> beoordelingen</p>
        </div>
    </div>
</section>

<section class="reviews-section section">
    <div class="container">
        <?php if (!empty($reviews)): ?>
        <div class="review-list">
            <?php foreach ($reviews as $review): ?>
            <div class="review-card review-card-full">
                <div class="review-header">
                    <div class="review-name"><?php echo escape($review['customer_name']); ?></div>
                    <?php echo renderStars((int)$review['rating']); ?>
                </div>
                <p class="review-text">
                    <?php echo escape($review['comment']); ?>
                </p>
                <div class="review-date">
                    <?php echo formatDate($review['created_at']); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="center">
            <p class="no-reviews">Nog geen reviews beschikbaar. Wees de eerste!</p>
        </div>
        <?php endif; ?>

        <div class="add-review-section">
            <h3>Laat uw mening achter</h3>
            <form method="POST" action="/reviews" class="review-form" novalidate>
                <?php echo csrfField(); ?>
                <div class="form-group">
                    <label for="customer_name">Naam *</label>
                    <input type="text" id="customer_name" name="customer_name"
                           value="<?php echo escape($old['customer_name'] ?? ''); ?>">
                    <?php if (isset($errors['customer_name'])): ?><span class="form-error"><?php echo escape($errors['customer_name']); ?></span><?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Beoordeling *</label>
                    <div class="star-rating-input">
                        <?php for ($i = 5; $i >= 1; $i--): ?>
                        <input type="radio" id="star-<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" <?php echo ($old['rating'] ?? '') == $i ? 'checked' : ''; ?>>
                        <label for="star-<?php echo $i; ?>">★</label>
                        <?php endfor; ?>
                    </div>
                    <?php if (isset($errors['rating'])): ?><span class="form-error"><?php echo escape($errors['rating']); ?></span><?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="comment">Review *</label>
                    <textarea id="comment" name="comment" rows="3"
                              placeholder="Deel uw ervaring..."><?php echo escape($old['comment'] ?? ''); ?></textarea>
                    <?php if (isset($errors['comment'])): ?><span class="form-error"><?php echo escape($errors['comment']); ?></span><?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Review Indienen</button>
            </form>
        </div>
    </div>
</section>
