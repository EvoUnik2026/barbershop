<?php
/**
 * Helper functies - Barbershop Website
 * Algemene functies voor template rendering, form validatie en output.
 */

declare(strict_types=1);

/**
 * Escape HTML output om XSS te voorkomen.
 */
function escape(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Escape een URL voor gebruik in href/src attributen.
 */
function esc_url(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Formatteer een prijs als Euro bedrag.
 */
function formatCurrency(float $amount): string
{
    return '€ ' . number_format($amount, 2, ',', '.');
}

/**
 * Genereer een CSRF token voor formulieren.
 */
function csrfToken(): string
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Genereer een HTML hidden input voor CSRF beveiliging.
 */
function csrfField(): string
{
    return '<input type="hidden" name="csrf_token" value="' . csrfToken() . '">';
}

/**
 * Valideer CSRF token.
 */
function validateCsrf(string $token): bool
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Zet een flash bericht in de sessie.
 */
function flash(string $key, string $message = null): void
{
    if ($message === null) {
        // Flash ophalen en verwijderen
        if (isset($_SESSION['flash_data'][$key])) {
            $message = $_SESSION['flash_data'][$key];
            unset($_SESSION['flash_data'][$key]);
            echo '<div class="flash flash-' . escape($key) . '">' . escape($message) . '</div>';
        }
        return;
    }
    $_SESSION['flash_data'][$key] = $message;
}

/**
 * Alle flash berichten ophalen.
 */
function getFlashMessages(): array
{
    $messages = $_SESSION['flash_data'] ?? [];
    unset($_SESSION['flash_data']);
    return $messages;
}

/**
 * Haal een instelling op uit de database (gecacht).
 */
function setting(string $key, string $default = ''): string
{
    static $cache = [];

    if (empty($cache)) {
        try {
                    $db = \core\Database::getInstance();

            $rows = $db->query("SELECT key_name, `value` FROM settings ORDER BY key_name");
            foreach ($rows as $row) {
                $cache[$row['key_name']] = $row['value'];
            }
        } catch (\Exception $e) {
            // Database niet beschikbaar - gebruik defaults
        }
    }

    return $cache[$key] ?? $default;
}

/**
 * Korte alias voor setting() - voor gebruik in templates.
 */
function s(string $key, string $default = ''): string
{
    return setting($key, $default);
}

/**
 * Genereer ster beoordelingen HTML.
 */
function renderStars(int $rating): string
{
    $html = '<div class="rating-stars">';
    for ($i = 1; $i <= 5; $i++) {
        $html .= $i <= $rating
            ? '<span class="star filled">&#9733;</span>'
            : '<span class="star">&#9734;</span>';
    }
    $html .= '</div>';
    return $html;
}

/**
 * Formatteer een datum in Nederlandse notatie.
 */
function formatDate(string $date, string $format = 'd-m-Y'): string
{
    return date($format, strtotime($date));
}

/**
 * Kort een tekst af op basis van aantal tekens.
 */
function truncate(string $text, int $length = 150, string $suffix = '...'): string
{
    if (mb_strlen($text) <= $length) {
        return $text;
    }
    return mb_substr($text, 0, $length) . $suffix;
}

/**
 * Controleer of een route actief is - voor navigation highlighting.
 */
function isActiveRoute(string $path): string
{
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $currentPath = rtrim($currentPath, '/') ?: '/';
    $path = rtrim($path, '/') ?: '/';
    return ($currentPath === $path) ? ' class="active"' : '';
}


