<?php
/**
 * Front Controller - Barbershop Website
 * Alle verzoeken worden hier naar binnen geloutstroomd en gerouted naar de juiste controller.
 */

declare(strict_types=1);

session_start();

// Autoloader registreert klassen automatisch
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/../';
    $file = $baseDir . 'app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Helpers laden
require_once __DIR__ . '/../app/helpers.php';

// Environment variabelen laden
if (file_exists(__DIR__ . '/../.env')) {
    $env = parse_ini_file(__DIR__ . '/../.env', false, INI_SCANNER_RAW);
    if (is_array($env)) {
        foreach ($env as $key => $value) {
            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }
}

// Routes laden
require_once __DIR__ . '/../routes.php';

// Router dispatch
$router = new \core\Router();
$router->dispatch();

