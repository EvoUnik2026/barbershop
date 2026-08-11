<?php
/** @var array $services */
/** @var array $errors */
/** @var array $old */
?>

<section class="page-hero section" style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.8)), url('https://images.unsplash.com/photo-1571902943223-12b96e5d2447?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
    <div class="container">
        <h1 class="page-title">Afspraak Maken</h1>
        <p class="page-subtitle">Plan gemakkelijk uw afspraak online - snel en simpel</p>
    </div>
</section>

<section class="appointment-section section">
    <div class="container">
        <div class="content-grid">
            <div class="content-col">
                <div class="appointment-info">
                    <h2>Bel ons ook gerust</h2>
                    <p class="phone-large">📞 <a href="tel:<?php echo escape(str_replace([' ', '-'], '', s('phone', ''))); ?>"><?php echo escape(s('phone', '')); ?></a></p>
                    <p>Of vul het formulier in - wij nemen binnen 24 uur contact op.</p>

                    <div class="contact-mini">
                        <p><strong>📍 Adres</strong><br>
                            <?php echo escape(s('address_street', '')); ?><br>
                            <?php echo escape(s('address_postal', '') . ' ' . s('address_city', '')); ?></p>
                        <p><strong>🕐 Openingstijden</strong><br>
                            Ma-Ct: 10:00-18:00<br>
                            Do-Vr: 10:00-21:00<br>
                            Za: 10:00-18:00</p>
                    </div>

                    <div class="services-reference">
                        <h3>Onze Diensten</h3>
                        <?php if (!empty($services)): ?>
                        <ul class="service-list-mini">
                            <?php foreach ($services as $service): ?>
                            <li><strong><?php echo escape($service['name']); ?></strong> - <?php echo formatCurrency((float)$service['price']); ?> <span class="duration">(<?php echo (int)$service['duration']; ?> min)</span></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                        <p><a href="/services">Bekijk onze volledige dienstenlijst</a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="content-col">
                <form method="POST" action="/appointment" class="appointment-form" novalidate>
                    <?php echo csrfField(); ?>
                    <h2>Plan uw afspraak</h2>

                    <div class="form-grid">
                        <div class="form-group<?php if (isset($errors['first_name'])): ?> has-error<?php endif; ?>">
                            <label for="first_name">Voornaam *</label>
                            <input type="text" id="first_name" name="first_name"
                                   value="<?php echo escape($old['first_name'] ?? ''); ?>" placeholder="Jan">
                            <?php if (isset($errors['first_name'])): ?><span class="form-error"><?php echo escape($errors['first_name']); ?></span><?php endif; ?>
                        </div>
                        <div class="form-group<?php if (isset($errors['last_name'])): ?> has-error<?php endif; ?>">
                            <label for="last_name">Achternaam *</label>
                            <input type="text" id="last_name" name="last_name"
                                   value="<?php echo escape($old['last_name'] ?? ''); ?>" placeholder="Jansen">
                            <?php if (isset($errors['last_name'])): ?><span class="form-error"><?php echo escape($errors['last_name']); ?></span><?php endif; ?>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group<?php if (isset($errors['email'])): ?> has-error<?php endif; ?>">
                            <label for="email">E-mail *</label>
                            <input type="email" id="email" name="email"
                                   value="<?php echo escape($old['email'] ?? ''); ?>" placeholder="jan@example.com">
                            <?php if (isset($errors['email'])): ?><span class="form-error"><?php echo escape($errors['email']); ?></span><?php endif; ?>
                        </div>
                        <div class="form-group<?php if (isset($errors['phone'])): ?> has-error<?php endif; ?>">
                            <label for="phone">Telefoon *</label>
                            <input type="tel" id="phone" name="phone"
                                   value="<?php echo escape($old['phone'] ?? ''); ?>" placeholder="06-12345678">
                                                        <?php if (isset($errors['phone'])): ?><span class="form-error"><?php echo escape($errors['phone']); ?></span><?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php if (isset($errors['service_id'])): ?> has-error<?php endif; ?>">
                        <label for="service_id">Dienst *</label>
                        <select id="service_id" name="service_id">
                            <option value="">Kies een dienst</option>
                            <?php foreach ($services as $service): ?>
                            <option value="<?php echo $service['id']; ?>" <?php echo ($old['service_id'] ?? '') == $service['id'] ? 'selected' : ''; ?>>
                                <?php echo escape($service['name']); ?> - <?php echo formatCurrency((float)$service['price']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['service_id'])): ?><span class="form-error"><?php echo escape($errors['service_id']); ?></span><?php endif; ?>
                    </div>

                    <div class="form-grid">
                        <div class="form-group<?php if (isset($errors['appointment_date'])): ?> has-error<?php endif; ?>">
                            <label for="appointment_date">Datum *</label>
                            <input type="date" id="appointment_date" name="appointment_date"
                                   value="<?php echo escape($old['appointment_date'] ?? ''); ?>">
                            <?php if (isset($errors['appointment_date'])): ?><span class="form-error"><?php echo escape($errors['appointment_date']); ?></span><?php endif; ?>
                        </div>
                        <div class="form-group<?php if (isset($errors['appointment_time'])): ?> has-error<?php endif; ?>">
                            <label for="appointment_time">Tijd *</label>
                            <input type="time" id="appointment_time" name="appointment_time"
                                   value="<?php echo escape($old['appointment_time'] ?? ''); ?>">
                            <?php if (isset($errors['appointment_time'])): ?><span class="form-error"><?php echo escape($errors['appointment_time']); ?></span><?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="notes">Notities (optioneel)</label>
                        <textarea id="notes" name="notes" rows="3"
                                  placeholder="Speciale wensen of opmerkingen..."><?php echo escape($old['notes'] ?? ''); ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Afspraak Bevestigen</button>
                </form>
            </div>
        </div>
    </div>
</section>
