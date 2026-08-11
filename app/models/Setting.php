<?php
/**
 * Model: Setting
 * Beheert algemene instellingen van de barbershop.
 */

declare(strict_types=1);

namespace models;

use core\Database;
use PDO;

class Setting
{
    /** @var Database Database instantie */
    private Database $db;

    /** @var array Cache voor alle instellingen */
    private array $cache = [];

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Laad alle instellingen in cache.
     */
    public function loadAll(): void
    {
        $rows = $this->db->query("SELECT key_name, `value` FROM settings ORDER BY key_name");
        foreach ($rows as $row) {
            $this->cache[$row['key_name']] = $row['value'];
        }
    }

    /**
     * Haal één instelling op.
     */
    public function get(string $key, string $default = ''): string
    {
        if (empty($this->cache)) {
            $this->loadAll();
        }
        return $this->cache[$key] ?? $default;
    }

    /**
     * Haal alle instellingen op.
     */
    public function all(): array
    {
        if (empty($this->cache)) {
            $this->loadAll();
        }
        return $this->cache;
    }
}
