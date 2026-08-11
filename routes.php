<?php
/**
 * Route Definities
 * Definieert welke URL naar welke controller/methode wijst.
 */

$routes = [
    // Hoofdpagina
    ['GET', '/', 'controllers\HomeController', 'index'],
    ['GET', '/home', 'controllers\HomeController', 'index'],

    // Over ons
    ['GET', '/about', 'controllers\AboutController', 'index'],

    // Diensten
    ['GET', '/services', 'controllers\ServicesController', 'index'],

    // Afspraak maken
    ['GET', '/appointment', 'controllers\AppointmentController', 'index'],
    ['POST', '/appointment', 'controllers\AppointmentController', 'store'],

    // Contact
    ['GET', '/contact', 'controllers\ContactController', 'index'],
    ['POST', '/contact', 'controllers\ContactController', 'store'],

        // Reviews
    ['GET', '/reviews', 'controllers\ReviewController', 'index'],
    ['POST', '/reviews', 'controllers\ReviewController', 'store'],

    // Fotogalerij
    ['GET', '/gallery', 'controllers\GalleryController', 'index'],
];
