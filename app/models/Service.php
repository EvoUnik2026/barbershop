<?php
/**
 * Model: Service
 * Beheert diensten die door de barbershop worden aangeboden.
 */

declare(strict_types=1);

namespace models;

use core\Database;

class Service
{
    /** @var Database Database instantie */
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Haal alle actieve diensten op, groeperd per categorie.
     */
    public function getAllByCategory(): array
    {
        $rows = $this->db->query(
            "SELECT * FROM services WHERE is_active = 1 ORDER BY sort_order ASC"
        );

        $grouped = [];
        foreach ($rows as $row) {
            $grouped[$row['category']][] = $row;
        }

        return $grouped;
    }

    /**
     * Haal alle actieve diensten op voor dropdown.
     */
    public function getAllForSelect(): array
    {
        return $this->db->query(
            "SELECT id, name, price, duration FROM services WHERE is_active = 1 ORDER BY sort_order ASC"
        );
    }

    /**
     * Haal één dienst op via ID.
     */
    public function getById(int $id): ?array
    {
        $rows = $this->db->query(
            "SELECT * FROM services WHERE id = ? AND is_active = 1",
            [$id]
        );
        return $rows[0] ?? null;
    }
}
