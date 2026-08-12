<?php
/** @var array $errors */
/** @var array $old */
?>

<section class="page-hero section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
    <div class="container">
        <h1 class="page-title">Contact</h1>
        <p class="page-subtitle">Neem contact op met Demo Barbershop</p>
    </div>
</section>

<section class="contact-section section">
    <div class="container">
        <div class="content-grid">
            <div class="content-col">
                <div class="contact-info">
                    <h2>Contact Gegevens</h2>

                    <div class="contact-item">
                        <span class="contact-icon">📍</span>
                        <div>
                            <strong>Bezoekadres</strong>
                            <?php echo escape(s('address_street', '')); ?><br>
                            <?php echo escape(s('address_postal', '') . ' ' . s('address_city', '')); ?>
                        </div>
                    </div>

                    <div class="contact-item">
                        <span class="contact-icon">📞</span>
                        <div>
                            <strong>Telefoon</strong>
                            <a href="tel:<?php echo escape(str_replace([' ', '-'], '', s('phone', ''))); ?>"><?php echo escape(s('phone', '')); ?></a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <span class="contact-icon">✉️</span>
                        <div>
                            <strong>E-mail</strong>
                            <a href="mailto:<?php echo escape(s('email', '')); ?>"><?php echo escape(s('email', '')); ?></a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <span class="contact-icon">👤</span>
                        <div>
                            <strong>Team</strong>
                            Premium Barber Experts
                        </div>
                    </div>

                    <div class="contact-item">
                        <span class="contact-icon">🕐</span>
                        <div>
                            <strong>Openingstijden</strong>
                            <table class="opening-hours small">
                                <tr><td>Ma</td><td>13:00 - 18:00</td></tr>
                                <tr><td>Di</td><td>10:00 - 18:00</td></tr>
                                <tr><td>Wo</td><td>10:00 - 18:00</td></tr>
                                <tr><td>Do</td><td>10:00 - 21:00</td></tr>
                                <tr><td>Vr</td><td>10:00 - 21:00</td></tr>
                                <tr><td>Za</td><td>10:00 - 18:00</td></tr>
                                <tr><td>Zo</td><td class="closed">Gesloten</td></tr>
                            </table>
                        </div>
                    </div>

                    <div class="map-wrapper">
                        <div class="map-placeholder">
                            <div class="map-icon">📍</div>
                            <p>Lokatie kaart</p>
                            <small><?php echo escape(s('address_street', '') . ', ' . s('address_postal', '') . ' ' . s('address_city', '')); ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-col">
                <form method="POST" action="/contact" class="contact-form" novalidate>
                                        <?php echo csrfField(); ?>

                    <div class="form-grid">
                        <div class="form-group<?php if (isset($errors['first_name'])): ?> has-error<?php endif; ?>">
                            <label for="first_name">Voornaam *</label>
                            <input type="text" id="first_name" name="first_name"
                                   value="<?php echo escape($old['first_name'] ?? ''); ?>">
                            <?php if (isset($errors['first_name'])): ?><span class="form-error"><?php echo escape($errors['first_name']); ?></span><?php endif; ?>
                        </div>
                        <div class="form-group<?php if (isset($errors['last_name'])): ?> has-error<?php endif; ?>">
                            <label for="last_name">Achternaam *</label>
                            <input type="text" id="last_name" name="last_name"
                                   value="<?php echo escape($old['last_name'] ?? ''); ?>">
                            <?php if (isset($errors['last_name'])): ?><span class="form-error"><?php echo escape($errors['last_name']); ?></span><?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php if (isset($errors['email'])): ?> has-error<?php endif; ?>">
                        <label for="email">E-mail *</label>
                        <input type="email" id="email" name="email"
                               value="<?php echo escape($old['email'] ?? ''); ?>">
                        <?php if (isset($errors['email'])): ?><span class="form-error"><?php echo escape($errors['email']); ?></span><?php endif; ?>
                    </div>

                    <div class="form-group<?php if (isset($errors['phone'])): ?> has-error<?php endif; ?>">
                        <label for="phone">Telefoon *</label>
                        <input type="tel" id="phone" name="phone"
                               value="<?php echo escape($old['phone'] ?? ''); ?>">
                        <?php if (isset($errors['phone'])): ?><span class="form-error"><?php echo escape($errors['phone']); ?></span><?php endif; ?>
                    </div>

                    <div class="form-group<?php if (isset($errors['subject'])): ?> has-error<?php endif; ?>">
                        <label for="subject">Onderwerp *</label>
                        <input type="text" id="subject" name="subject"
                               value="<?php echo escape($old['subject'] ?? 'Algemene vraag'); ?>">
                        <?php if (isset($errors['subject'])): ?><span class="form-error"><?php echo escape($errors['subject']); ?></span><?php endif; ?>
                    </div>

                    <div class="form-group<?php if (isset($errors['message'])): ?> has-error<?php endif; ?>">
                        <label for="message">Bericht *</label>
                        <textarea id="message" name="message" rows="5"
                                  placeholder="Typ uw bericht hier..."><?php echo escape($old['message'] ?? ''); ?></textarea>
                        <?php if (isset($errors['message'])): ?><span class="form-error"><?php echo escape($errors['message']); ?></span><?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Verzenden</button>
                </form>
            </div>
        </div>
    </div>
</section>
