<?php
/**
 * Core View - Barbershop Website
 * Eenvoudige template renderer met data passing.
 */

declare(strict_types=1);

namespace core;

class View
{
    /** @var array View data */
    private array $data = [];

    /**
     * Stel view data in.
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * Voeg extra data toe aan de view.
     */
    public function addData(array $data): void
    {
        $this->data = array_merge($this->data, $data);
    }

    /**
     * Render een view bestand met layout.
     */
    public function render(string $view, array $data = []): void
    {
        // Data voorbereiden
        if (!empty($data)) {
            $this->data = array_merge($this->data, $data);
        }

        // Layout bestanden
        $headerPath = __DIR__ . '/../views/layouts/header.php';
        $footerPath = __DIR__ . '/../views/layouts/footer.php';

        // View bestand
        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        // Controleer of view bestaat
        if (!file_exists($viewPath)) {
            $this->renderError("View bestand niet gevonden: {$view}");
            return;
        }

        // Header renderen
        if (file_exists($headerPath)) {
            $this->includeFile($headerPath, $this->data);
        }

        // View renderen
        $this->includeFile($viewPath, $this->data);

        // Footer renderen
        if (file_exists($footerPath)) {
            $this->includeFile($footerPath, $this->data);
        }
    }

    /**
     * Render alleen een view zonder layout (voor AJAX responses).
     */
    public function renderPartial(string $view, array $data = []): void
    {
        $mergedData = array_merge($this->data, $data);
        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            $this->renderError("View bestand niet gevonden: {$view}");
            return;
        }

        $this->includeFile($viewPath, $mergedData);
    }

    /**
     * Include een PHP bestand met lokale variabelen.
     */
    private function includeFile(string $file, array $data): void
    {
                // Variabelen beschikbaar maken in het template
        extract($data, EXTR_SKIP);
        include $file;
    }

    /**
     * Toon een foutmelding.
     */
    private function renderError(string $message): void
    {
        echo "<div class='error-message'>{$message}</div>";
    }
}
