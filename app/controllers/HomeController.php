<?php
/**
 * Controller: Home
 * Toont de startpagina met hero, diensten en reviews.
 */

declare(strict_types=1);

namespace controllers;

use core\Controller;
use models\Service;
use models\Review;

class HomeController extends Controller
{
    public function index(): void
    {
        $serviceModel = new Service();
        $reviewModel = new Review();

        // Diensten ophalen voor de preview (max 3)
        $allServices = $serviceModel->getAllByCategory();
        $featuredServices = [];
        foreach ($allServices as $category => $services) {
            foreach ($services as $s) {
                $featuredServices[] = $s;
                if (count($featuredServices) >= 3) break 2;
            }
        }

        // Reviews ophalen
        $reviews = $reviewModel->getApproved(5);
        $avgRating = $reviewModel->getAverageRating();
        $reviewCount = $reviewModel->getCount();

        $this->render('home/index', [
            'page_title'       => 'Dali The Barber - Herenkapper in Apeldoorn',
            'meta_description' => 'Welkom bij Dali The Barber in Apeldoorn. Gespecialiseerd in herenkapsels, skinfades en baardstyling. Boek nu je afspraak!',
            'featured_services'  => $featuredServices,
            'reviews'           => $reviews,
            'avg_rating'        => $avgRating,
            'reviewCount'      => $reviewCount,
        ]);
    }
}
