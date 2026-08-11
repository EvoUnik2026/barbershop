<?php
/**
 * Controller: Services
 * Toont alle diensten van de barbershop.
 */

declare(strict_types=1);

namespace controllers;

use core\Controller;
use models\Service;

class ServicesController extends Controller
{
    public function index(): void
    {
        $serviceModel = new Service();
        $services = $serviceModel->getAllByCategory();

        $this->render('services/index', [
            'page_title'       => 'Onze Diensten - Dali The Barber',
            'meta_description' => 'Bekijk alle diensten van Dali The Barber: herenkapsels, skinfades, baardstyling, kleuren en verzorging. Scherpe prijzen in Apeldoorn.',
            'services' => $services,
        ]);
    }
}
