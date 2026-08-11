<?php
/**
 * Model: Review
 * Beheert klantbeoordelingen (reviews) in de database.
 */

declare(strict_types=1);

namespace models;

use core\Database;

class Review
{
    /** @var Database Database instantie */
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Haal alle goedgekeurde reviews op.
     */
    public function getApproved(int $limit = 10): array
    {
        return $this->db->query(
            "SELECT * FROM reviews WHERE is_approved = 1 ORDER BY created_at DESC LIMIT ?",
            [$limit]
        );
    }

    /**
     * Haal alle reviews op (voor admin).
     */
    public function getAll(): array
    {
        return $this->db->query("SELECT * FROM reviews ORDER BY created_at DESC");
    }

    /**
     * Haal één review op via ID.
     */
    public function getById(int $id): ?array
    {
        $rows = $this->db->query(
            "SELECT * FROM reviews WHERE id = ?",
            [$id]
        );
        return $rows[0] ?? null;
    }

    /**
     * Sla een nieuwe review op.
     */
    public function create(array $data): int
    {
        return $this->db->insert(
            "INSERT INTO reviews (customer_name, rating, comment) VALUES (:customer_name, :rating, :comment)",
            [
                'customer_name' => $data['customer_name'],
                'rating'        => $data['rating'],
                'comment'       => $data['comment'],
            ]
        );
    }

    /**
     * Bereken het gemiddelde sterrenaantal.
     */
    public function getAverageRating(): float
    {
        $result = $this->db->query(
            "SELECT AVG(rating) as avg_rating FROM reviews WHERE is_approved = 1"
        );
        $avg = $result[0]['avg_rating'] ?? 0;
        return round((float)$avg, 1);
    }

    /**
     * Tel het totaal aantal beoordelingen.
     */
    public function getCount(): int
    {
        $result = $this->db->query(
            "SELECT COUNT(*) as count FROM reviews WHERE is_approved = 1"
        );
        return (int)($result[0]['count'] ?? 0);
    }
}
