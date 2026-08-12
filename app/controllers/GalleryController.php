<?php
/**
 * Controller: Gallery
 * Toont de fotogalerij met sample afbeeldingen van de barbershop.
 */

declare(strict_types=1);

namespace controllers;

use core\Controller;

class GalleryController extends Controller
{
    public function index(): void
    {
        // Sample foto's (Unsplash barbershop collectie)
        $photos = [
            ['src' => 'https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'Premium barbershop interieur', 'caption' => 'Onze Shop'],
            ['src' => 'https://images.unsplash.com/photo-1585747860715-2ba37e788b70?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'Klant met perfecte fade', 'caption' => 'Skinfade'],
            ['src' => 'https://images.unsplash.com/photo-1622289093663-5b9e1e4c5d5a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'Baard styling', 'caption' => 'Baard Styling'],
            ['src' => 'https://images.unsplash.com/photo-1571902943223-12b96e5d2447?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'Barber aan het werk', 'caption' => 'Vakwerk'],
            ['src' => 'https://images.unsplash.com/photo-1599351431202-1e0f0137899a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'Professionele tools', 'caption' => 'Tools'],
            ['src' => 'https://images.unsplash.com/photo-1605497954615-bd53cd79ab5d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'Baard resultaat', 'caption' => 'Resultaat'],
            ['src' => 'https://images.unsplash.com/photo-1605497788044-5a32c7078486?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'Kapsel styling', 'caption' => 'Kapsel'],
            ['src' => 'https://images.unsplash.com/photo-1512690459411-b9245aed614b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'alt' => 'Moderne look', 'caption' => 'Moderne Look'],
        ];

        $this->render('gallery/index', [
            'page_title'       => 'Fotogalerij - Demo Barbershop',
            'meta_description' => 'Bekijk onze fotogalerij en ontdek de stijl, precisie en premium grooming van Demo Barbershop.',
            'photos'           => $photos,
        ]);
    }
}
