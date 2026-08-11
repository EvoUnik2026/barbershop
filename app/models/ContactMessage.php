<?php
/**
 * Model: ContactMessage
 * Beheert contactformulier berichten in de database.
 */

declare(strict_types=1);

namespace models;

use core\Database;

class ContactMessage
{
    /** @var Database Database instantie */
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Haal alle contact berichten op.
     */
    public function getAll(): array
    {
        return $this->db->query("
            SELECT * FROM contact_messages ORDER BY created_at DESC
        ");
    }

    /**
     * Haal één bericht op via ID.
     */
    public function getById(int $id): ?array
    {
        $rows = $this->db->query(
            "SELECT * FROM contact_messages WHERE id = ?",
            [$id]
        );
        return $rows[0] ?? null;
    }

    /**
     * Sla een nieuw bericht op.
     */
    public function create(array $data): int
    {
        return $this->db->insert(
            "INSERT INTO contact_messages
             (first_name, last_name, email, phone, subject, message, is_read)
             VALUES (:first_name, :last_name, :email, :phone, :subject, :message, 0)",
            [
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email'],
                'phone'      => $data['phone'],
                'subject'    => $data['subject'],
                'message'    => $data['message'],
            ]
        );
    }

    /**
     * Markeer een bericht als gelezen.
     */
    public function markAsRead(int $id): int
    {
        return $this->db->execute(
            "UPDATE contact_messages SET is_read = 1 WHERE id = ?",
            [$id]
        );
    }
}
