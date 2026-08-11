<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo escape($page_title ?? ''); ?> | <?php echo escape(s('shop_name', 'Barbershop')); ?></title>
    <meta name="description" content="<?php echo escape($meta_description ?? ''); ?>">
    <meta name="keywords" content="<?php echo escape($meta_keywords ?? ''); ?>">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo escape($page_title ?? ''); ?> | <?php echo escape(s('shop_name')); ?>">
    <meta property="og:description" content="<?php echo escape($meta_description ?? ''); ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="nl_NL">

        <!-- Favicons -->
    <link rel="icon" type="image/svg+xml" href="/images/favicon.svg">
    <link rel="shortcut icon" href="/images/favicon.svg">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">

        <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"Barbershop","name":"<?php echo escape(s('shop_name')); ?>","telephone":"<?php echo escape(s('phone')); ?>","url":"<?php echo esc_url($base_url); ?>","address":{"@type":"PostalAddress","streetAddress":"<?php echo escape(s('address_street')); ?>","addressLocality":"<?php echo escape(s('address_city')); ?>","postalCode":"<?php echo escape(s('address_postal')); ?>","addressCountry":"NL"},"geo":{"@type":"GeoCoordinates","latitude":<?php echo s('latitude','0'); ?>,"longitude":<?php echo s('longitude','0'); ?>},"priceRange":"€€","aggregateRating":{"@type":"AggregateRating","ratingValue":"<?php echo escape(s('rating')); ?>","bestRating":"10","worstRating":"1"}}
    </script>
</head>
<body>
    <!-- Flash berichten -->
    <?php if (!empty($flashes)): ?>
    <div class="flash-messages">
        <?php foreach ($flashes as $type => $message): ?>
        <div class="flash flash-<?php echo escape($type); ?>">
            <span class="flash-icon"><?php echo $type === 'success' ? '✓' : '⚠'; ?></span>
            <?php echo escape($message); ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Hoofd navigatie -->
    <header class="site-header">
        <div class="container header-inner">
            <div class="logo">
                <a href="/">
                    <img src="/images/dali.png" alt="<?php echo escape(s('shop_name')); ?>" class="logo-img">
                </a>
            </div>

            <div class="header-nav-group">
                <div class="header-brand">
                    <span class="logo-name"><?php echo escape(s('shop_name')); ?></span>
                    <span class="logo-tagline"><?php echo escape(s('tagline', 'Haar & Baard Styling')); ?></span>
                </div>

                <nav class="main-nav" id="mainNav">
                    <ul class="nav-menu">
                        <li><a href="/"<?php echo isActiveRoute('/'); ?>>Home</a></li>
                        <li><a href="/about"<?php echo isActiveRoute('/about'); ?>>Over Ons</a></li>
                        <li><a href="/services"<?php echo isActiveRoute('/services'); ?>>Diensten</a></li>
                        <li><a href="/gallery"<?php echo isActiveRoute('/gallery'); ?>>Galerij</a></li>
                        <li><a href="/reviews"<?php echo isActiveRoute('/reviews'); ?>>Reviews</a></li>
                        <li><a href="/appointment"<?php echo isActiveRoute('/appointment'); ?>>Afspraak Maken</a></li>
                        <li><a href="/contact"<?php echo isActiveRoute('/contact'); ?>>Contact</a></li>
                    </ul>
                </nav>

                <a href="tel:<?php echo escape(str_replace([' ', '-'], '', s('phone', ''))); ?>" class="header-phone" aria-label="Bel ons">
                    <span class="phone-icon" aria-hidden="true">📞</span>
                    <span class="phone-number"><?php echo escape(s('phone', '')); ?></span>
                </a>
            </div>

            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Menu openen">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>
