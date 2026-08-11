<?php
/**
 * Core Router - Barbershop Website
 * Verwerkt URL verzoeken en routeert naar de juiste controller.
 */

declare(strict_types=1);

namespace core;

class Router
{
    /** @var array Geregistreerde routes */
    private array $routes = [];

    /** @var string Huidige request URI */
    private string $requestUri;

    /** @var string HTTP request methode */
    private string $requestMethod;

    public function __construct()
    {
        // URL normaliseren - verwijder query string
        $this->requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];

        // Verwijder trailing slash (behalve voor root)
        if ($this->requestUri !== '/' && str_ends_with($this->requestUri, '/')) {
            $this->requestUri = rtrim($this->requestUri, '/');
        }
    }

    /**
     * Dispatch het verzoek naar de juiste route.
     */
            public function dispatch(): void
    {
        $this->loadRoutes();

        foreach ($this->routes as $route) {
            [$method, $pattern, $controller, $action] = $route;

            // Check of de methode en URL matchen
            if ($this->requestMethod !== $method) {
                continue;
            }

            if ($this->matchRoute($pattern)) {
                $this->executeController($controller, $action);
                return;
            }
        }

        // Geen route gevonden -> 404
        $this->handleNotFound();
    }

    /**
     * Laad de route definities.
     */
            private function loadRoutes(): void
    {
        // Globale $routes variabele die door routes.php wordt gevuld
        global $routes;
        $this->routes = $routes ?? [];
    }

    /**
     * Match de request URI tegen een route pattern.
     */
    private function matchRoute(string $pattern): bool
    {
        if ($pattern === '{any}') {
            return true;
        }

        if ($this->requestUri === $pattern) {
            return true;
        }

        // Regex-based match voor parameters
        $regexPattern = preg_replace('/\{[^}]+\}/', '([^/]+)', $pattern);
        $regexPattern = '#^' . $regexPattern . '$#';

        return preg_match($regexPattern, $this->requestUri) === 1;
    }

    /**
     * Voer de controller en actie uit.
     */
    private function executeController(string $controller, string $action): void
    {
        $controllerClass = '\\' . ltrim($controller, '\\');

        if (!class_exists($controllerClass)) {
            $this->handleNotFound();
            return;
        }

        $controllerInstance = new $controllerClass();

        if (!method_exists($controllerInstance, $action)) {
            $this->handleNotFound();
            return;
        }

        $controllerInstance->$action();
    }

    /**
     * Toon een 404 pagina.
     */
    private function handleNotFound(): void
    {
        http_response_code(404);

        $view = new View();
        $view->render('errors/404', [
            'page_title' => '404 - Pagina niet gevonden',
            'meta_description' => 'De opgevraagde pagina kon niet worden gevonden bij Angelo & Caribbean Barbershop.',
        ]);
    }
}

