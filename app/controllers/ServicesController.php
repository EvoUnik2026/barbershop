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
            'page_title'       => 'Onze Diensten - Demo Barbershop',
            'meta_description' => 'Bekijk de premium diensten van Demo Barbershop: herenkapsels, skinfades, baardstyling en grooming voor een strakke, moderne look.',
            'services' => $services,
        ]);
    }
}
