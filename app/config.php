<?php
/**
 * Configuratie - Barbershop Website
 * Centrale configuratie met database instellingen en application variabelen.
 */

declare(strict_types=1);

return [
    'database' => [
        'host'     => getenv('DB_HOST') ?: 'mysql',
        'port'     => getenv('DB_PORT') ?: '3306',
        'name'     => getenv('DB_DATABASE') ?: 'barbershop',
        'username' => getenv('DB_USERNAME') ?: 'barbershop',
        'password' => getenv('DB_PASSWORD') ?: 'secret',
        'charset'  => 'utf8mb4',
    ],
    'app' => [
        'env'   => getenv('APP_ENV') ?: 'production',
        'base_url' => rtrim(getenv('APP_URL') ?: 'http://localhost:8080', '/'),
        'name'  => 'Dali The Barber',
    ],
    'session' => [
        'name' => 'barbershop_session',
    ],
];
