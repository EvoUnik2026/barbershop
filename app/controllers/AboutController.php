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
            'page_title'       => 'Over Ons - Demo Barbershop',
            'meta_description' => 'Ontdek Demo Barbershop: premium grooming, vakmanschap en een moderne uitstraling voor iedere man.',
        ]);
    }
}
