<?php
/** @var array $errors */
/** @var array $old */
?>

<section class="page-hero section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
    <div class="container">
        <h1 class="page-title">Over Ons</h1>
        <p class="page-subtitle">Premium grooming en stijl sinds <?php echo escape(s('since_year', '2019')); ?></p>
    </div>
</section>

<!-- Story Section -->
<section class="story-section section">
    <div class="container">
        <div class="content-grid">
            <div class="content-col">
                <h2 class="section-title">Over Demo Barbershop</h2>
                <p class="lead">
                    Bij Demo Barbershop geloven we dat een goede look meer is dan alleen een kapsel.
                    Het is een statement van stijl, zelfvertrouwen en kwaliteit.
                </p>
                <p>
                    Onze barbers combineren vakmanschap met een moderne aanpak, zodat iedere klant een
                    behandeling krijgt die perfect past bij zijn haartype, gezichtsvorm en persoonlijke
                    voorkeuren. Van klassieke snedes tot strakke fades en verzorgde baarden, alles wordt
                    met precisie uitgevoerd.
                </p>
                <p>
                    We hebben een passie voor detail, nette afwerking en een lounge-achtige ervaring waarin
                    je relaxed en welkom voelt. Onze missie is om elke klant niet alleen een frisse look te
                    geven, maar ook een ervaring die voelt als premium grooming.
                </p>
                <p>
                    Met aandacht voor kwaliteit, comfort en stijlvolle service streven we er elke dag naar om
                    een bezoek aan onze barbershop te laten voelen als een investering in jouw uitstraling.
                </p>
                <div class="badge-container">
                    <span class="badge badge-primary">Sinds <?php echo escape(s('since_year', '2019')); ?></span>
                    <span class="badge">Premium Styling</span>
                    <span class="badge">Ambacht & Vakmanschap</span>
                </div>
            </div>
            <div class="content-col">
                <div class="image-frame">
                    <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                         alt="Premium herenbarbershop" class="barber-img">
                </div>
                <div class="team-info">
                    <h3>Premium Service. Strakke Look. Moderne Grooming.</h3>
                    <p>"Voor ons draait het om kwaliteit, detail en een look die je met vertrouwen de deur uit laat gaan."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Expertise -->
<section class="expertise-section section bg-dark">
    <div class="container">
        <h2 class="section-title centered white">Onze Expertise</h2>
        <div class="expertise-grid">
            <div class="expertise-card">
                <div class="expertise-icon">✂️</div>
                <h3>Klassieke Knip</h3>
                <p>Tijdloze herenkapsels met precisie en oog voor detail. Elke lijn telt.</p>
            </div>
            <div class="expertise-card">
                <div class="expertise-icon">💈</div>
                <h3>Skinfade</h3>
                <p>Ultra strake overgang van de huid met scherpe lijnen en een moderne finish.</p>
            </div>
            <div class="expertise-card">
                <div class="expertise-icon">🧔</div>
                <h3>Baard Styling</h3>
                <p>Straffe baardlijnen, professionele trim en vormgeving met premium producten.</p>
            </div>
            <div class="expertise-card">
                <div class="expertise-icon">🎨</div>
                <h3>Kleuren & Highlights</h3>
                <p>Subtiele kleuraccenten voor meer diepte en een gepolijste uitstraling.</p>
            </div>
            <div class="expertise-card">
                <div class="expertise-icon">✨</div>
                <h3>Textuur & Volume</h3>
                <p>Natuurlijke textuur aan het toppje met movement en lichaam.</p>
            </div>
            <div class="expertise-card">
                <div class="expertise-icon">💆</div>
                <h3>Hot Towel Shave</h3>
                <p>Een traditionele scheerbeurt met warme handdoek en straight razor.</p>
            </div>
        </div>
    </div>
</section>

<!-- Milestones -->
<section class="milestones section">
    <div class="container">
        <div class="milestone-grid">
            <div class="milestone-card milestone-card-lg">
                <div class="milestone-icon">📅</div>
                <div class="milestone-value"><?php echo escape(s('since_year', '2019')); ?></div>
                <div class="milestone-label">Sinds</div>
            </div>
            <div class="milestone-card milestone-card-lg">
                <div class="milestone-icon">📍</div>
                <div class="milestone-value">Amsterdam</div>
                <div class="milestone-label">Locatie</div>
            </div>
            <div class="milestone-card milestone-card-lg">
                <div class="milestone-icon">⭐</div>
                <div class="milestone-value"><?php echo escape(s('rating', '8.4')); ?>/10</div>
                <div class="milestone-label">Tevredenheid</div>
            </div>
        </div>
    </div>
</section>
