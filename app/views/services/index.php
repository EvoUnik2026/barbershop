<?php
/** @var array $services */
$categoryLabels = [
    'haircut' => 'Kapsels',
    'beard'   => 'Baard',
    'styling' => 'Styling',
    'color'   => 'Kleuren',
];
$categoryIcons = ['haircut' => '✂️', 'beard' => '🧔', 'styling' => '💈', 'color' => '🎨'];
?>

<section class="page-hero section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
    <div class="container">
        <h1 class="page-title">Onze Diensten</h1>
        <p class="page-subtitle">Voor wie een perfecte look wenst, ongeacht het haarstype</p>
    </div>
</section>

<section class="services-section section">
    <div class="container">
        <?php foreach ($services as $category => $serviceList): ?>
        <div class="service-category">
            <h2 class="category-title">
                <span class="category-icon"><?php echo $categoryIcons[$category] ?? '✂️'; ?></span>
                <?php echo $categoryLabels[$category] ?? $category; ?>
            </h2>
            <div class="service-list">
                <?php foreach ($serviceList as $service): ?>
                <div class="service-item">
                    <div class="service-info">
                        <h3 class="service-name"><?php echo escape($service['name']); ?></h3>
                        <p class="service-desc"><?php echo escape($service['description']); ?></p>
                    </div>
                    <div class="service-meta">
                        <span class="service-price"><?php echo formatCurrency((float)$service['price']); ?></span>
                        <span class="service-time">⏱ <?php echo (int)$service['duration']; ?> min</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="center mt-2">
            <a href="/appointment" class="btn btn-primary btn-lg">Nu Afspraak Maken</a>
        </div>
    </div>
</section>
