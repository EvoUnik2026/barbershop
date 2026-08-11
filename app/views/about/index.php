<?php
/** @var array $errors */
/** @var array $old */
?>

<section class="page-hero section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
    <div class="container">
        <h1 class="page-title">Over Ons</h1>
        <p class="page-subtitle">Jouw barbershop in Apeldoorn sinds <?php echo escape(s('since_year', '2019')); ?></p>
    </div>
</section>

<!-- Story Section -->
<section class="story-section section">
    <div class="container">
        <div class="content-grid">
            <div class="content-col">
                <h2 class="section-title">Over Dali The Barber</h2>
                <p class="lead">
                    Mijn naam is Dalibor Zdravkovski en het barbervak is iets waar ik al mijn hele leven
                    mee verbonden ben. Het vak zit al generaties lang in mijn familie en de passie
                    daarvoor is mij van jongs af aan meegegeven.
                </p>
                <p>
                    Wat voor velen een beroep is, voelt voor mij als een ambacht waarin precisie,
                    creativiteit en persoonlijke aandacht samenkomen. Mijn reis begon in 2019,
                    tijdens de coronaperiode. Wat startte als een hobby, door vrienden en familie te
                    knippen, groeide al snel uit tot een echte passie.
                </p>
                <p>
                    Ik besloot mezelf verder te ontwikkelen en behaalde een erkend diploma in het
                    barbiersvak. Daarna heb ik ongeveer vijf jaar ervaring opgedaan bij verschillende
                    barbershops, waar ik mijn technieken verder heb verfijnd. Toch merkte ik dat ik
                    mijn eigen visie had op kwaliteit en service.
                </p>
                <p>
                    Voor mij draait een knipbeurt niet alleen om een goed kapsel, maar om aandacht,
                    vakmanschap en een ervaring waarbij iedere klant zich welkom voelt. Met een scherp
                    oog voor detail en trots op mijn Macedonische afkomst streef ik er iedere dag naar
                    om hoogwaardige kwaliteit te leveren tegen een eerlijke prijs.
                </p>
                <div class="badge-container">
                    <span class="badge badge-primary">Sinds <?php echo escape(s('since_year', '2019')); ?></span>
                    <span class="badge">Eigenaar: Dalibor Z.</span>
                    <span class="badge">Ambacht & Vakmanschap</span>
                </div>
            </div>
            <div class="content-col">
                <div class="image-frame">
                    <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                         alt="Dalibor Zdravkovski - Dali The Barber" class="barber-img">
                </div>
                <div class="team-info">
                    <h3>Dalibor Zdravkovski - Barbier & Eigenaar</h3>
                    <p>"Mijn doel is dat iedere klant niet alleen met een frisse look, maar ook met meer zelfvertrouwen de deur uitloopt."</p>
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
                <div class="milestone-value">Apeldoorn</div>
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
