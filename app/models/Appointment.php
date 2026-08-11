<?php
/**
 * Model: Appointment
 * Beheert afspraken (reservaties) in de database.
 */

declare(strict_types=1);

namespace models;

use core\Database;

class Appointment
{
    /** @var Database Database instantie */
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Haal alle afspraken op.
     */
    public function getAll(): array
    {
        return $this->db->query("
            SELECT a.*, s.name as service_name
            FROM appointments a
            LEFT JOIN services s ON a.service_id = s.id
            ORDER BY a.created_at DESC
        ");
    }

    /**
     * Haal één afspraak op via ID.
     */
    public function getById(int $id): ?array
    {
        $rows = $this->db->query(
            "SELECT a.*, s.name as service_name, s.price, s.duration
             FROM appointments a
             LEFT JOIN services s ON a.service_id = s.id
             WHERE a.id = ?",
            [$id]
        );
        return $rows[0] ?? null;
    }

    /**
     * Sla een nieuwe afspraak op.
     */
    public function create(array $data): int
    {
        return $this->db->insert(
            "INSERT INTO appointments
             (first_name, last_name, email, phone, service_id, appointment_date, appointment_time, notes, status)
             VALUES (:first_name, :last_name, :email, :phone, :service_id, :appointment_date, :appointment_time, :notes, 'pending')",
            [
                'first_name'      => $data['first_name'],
                'last_name'       => $data['last_name'],
                'email'           => $data['email'],
                'phone'           => $data['phone'],
                'service_id'      => $data['service_id'],
                'appointment_date' => $data['appointment_date'],
                'appointment_time' => $data['appointment_time'],
                'notes'           => $data['notes'] ?? '',
            ]
        );
    }

    /**
     * Controleer of een tijsslot beschikbaar is.
     */
    public function isTimeSlotAvailable(string $date, string $time, ?int $excludeId = null): bool
    {
        $sql = "SELECT COUNT(*) as count FROM appointments WHERE appointment_date = ? AND appointment_time = ? AND status != 'cancelled'";
        $params = [$date, $time];

        if ($excludeId !== null) {
            $sql .= " AND id != ?";
            $params[] = $excludeId;
        }

        $result = $this->db->query($sql, $params);
        return ($result[0]['count'] ?? 0) == 0;
    }

    /**
     * Update de status van een afspraak.
     */
    public function updateStatus(int $id, string $status): int
    {
        return $this->db->execute(
            "UPDATE appointments SET status = ? WHERE id = ?",
            [$status, $id]
        );
    }
}
