<?php
/**
 * Core Controller - Barbershop Website
 * Basis controller klasse met gedeelde functionaliteit.
 */

declare(strict_types=1);

namespace core;

use PDO;

class Controller
{
    /** @var array Standaard view data */
    protected array $data = [];

    /** @var array Flash messages voor de volgende request */
    protected array $flashMessages = [];

    /**
     * Render een view met layout.
     */
    protected function render(string $view, array $data = []): void
    {
        $config = require __DIR__ . '/../config.php';

                // Validatiefouten en oude invoer uit sessie lezen
        $errors = $_SESSION['errors'] ?? [];
        $oldInput = $_SESSION['old_input'] ?? [];
        unset($_SESSION['errors'], $_SESSION['old_input']);

        // Standaard view data mergen
        $defaultData = [
            'page_title'       => $config['app']['name'],
            'meta_description' => 'Welkom bij ' . $config['app']['name'] . '. Professionele herenkapper en barbier in Apeldoorn.',
            'meta_keywords'    => 'barber, kapper, herenhaar, apeldoorn, afspraak, haar knippen, baard',
            'base_url'         => rtrim($config['app']['base_url'], '/'),
            'shop_name'        => $config['app']['name'],
            'errors'           => $errors,
            'old'              => $oldInput,
            'flashes'          => getFlashMessages(),
        ];

        $mergedData = array_merge($defaultData, $data);

        $viewObj = new \core\View();
        $viewObj->setData($mergedData);
        $viewObj->render($view);
    }

    /**
     * Stuur een redirect.
     */
        protected function redirect(string $path, array $flash = []): void
    {
        // Flash messages opslaan in sessie
        if (!empty($flash)) {
            $_SESSION['flash_data'] = $flash;
        }

        $config = require __DIR__ . '/../config.php';
        $location = rtrim($config['app']['base_url'], '/') . $path;
        header('Location: ' . $location);
        exit;
    }

    /**
     * Valideer een formulierveld en retourneer sanitised waarde.
     */
    protected function validateInput(array $rules, array $fields): array
    {
        $errors = [];
        $validated = [];

        foreach ($fields as $name => $value) {
            $rulesForField = $rules[$name] ?? [];
            $value = is_string($value) ? trim($value) : $value;

            foreach ($rulesForField as $rule) {
                $rule = explode(':', $rule);
                $ruleName = $rule[0];
                $ruleValue = $rule[1] ?? null;

                // required
                if ($ruleName === 'required' && ($value === '' || $value === null)) {
                    $errors[$name] = 'Dit veld is verplicht.';
                    continue 2;
                }

                // email
                if ($ruleName === 'email' && !empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$name] = 'Voer een geldig e-mailadres in.';
                }

                // min
                if ($ruleName === 'min' && !empty($value) && strlen($value) < (int)$ruleValue) {
                    $errors[$name] = 'Dit veld moet minimaal ' . $ruleValue . ' tekens bevatten.';
                }

                // max
                if ($ruleName === 'max' && !empty($value) && strlen($value) > (int)$ruleValue) {
                    $errors[$name] = 'Dit veld mag maximaal ' . $ruleValue . ' tekens bevatten.';
                }

                // phone (Nederlands formaat)
                if ($ruleName === 'phone' && !empty($value)) {
                    $phone = preg_replace('/[^0-9]/', '', $value);
                    if (strlen($phone) < 6 || strlen($phone) > 12) {
                        $errors[$name] = 'Voer een geldig telefoonnummer in.';
                    }
                }
            }

            $validated[$name] = $value;
        }

        return [$validated, $errors];
    }

    /**
     * Haal en verwijder flash messages uit de sessie.
     */
    protected function getFlashMessages(): array
    {
        if (isset($_SESSION['flash'])) {
            $flashes = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $flashes;
        }
        return [];
    }
}
