<?php
/** @var string $page_title */
/** @var string $meta_description */
?>

<div class="error-page">
    <div class="container text-center">
        <div class="error-code">404</div>
        <h1 class="error-title"><?php echo escape($page_title ?? 'Pagina niet gevonden'); ?></h1>
        <p class="error-message">
            <?php echo escape($meta_description ?? 'De pagina die u zoekt bestaat niet of is verplaatst.'); ?>
        </p>
        <div class="error-illustration" aria-hidden="true">
            <span class="scissor-icon">✂️</span>
        </div>
        <a href="/" class="btn btn-primary btn-lg">Terug naar Home</a>
        <div class="error-links">
            <a href="/about">Over Ons</a>
            <a href="/services">Diensten</a>
            <a href="/contact">Contact</a>
        </div>
    </div>
</div>
