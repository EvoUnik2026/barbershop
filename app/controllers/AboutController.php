<?php
/**
 * Controller: About
 * Toont de 'Over Ons' pagina met achtergrondverhaal.
 */

declare(strict_types=1);

namespace controllers;

use core\Controller;

class AboutController extends Controller
{
    public function index(): void
    {
        $this->render('about/index', [
            'page_title'       => 'Over Ons - Dali The Barber',
            'meta_description' => "Over Dali The Barber in Apeldoorn. Dalibor Zdravkovski brengt meer dan vijf jaar ervaring mee als barbier. Ambacht, vakmanschap en persoonlijke aandacht.",
        ]);
    }
}
