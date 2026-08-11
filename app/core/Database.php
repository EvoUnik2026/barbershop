<?php
/**
 * Core Database - Barbershop Website
 * PDO database verbinding met singleton pattern.
 */

declare(strict_types=1);

namespace core;

use PDO;
use PDOException;

class Database
{
    /** @var Database|null Singleton instantie */
    private static ?Database $instance = null;

    /** @var PDO|null PDO verbinding */
    private ?PDO $pdo = null;

    /**
     * Voorkom externe instantiatie - gebruik getInstance().
     */
    private function __construct()
    {
    }

    /**
     * Voorkom klonen van de instantie.
     */
    private function __clone()
    {
    }

        /**
     * Voorkom deserialisatie.
     */
    public function __wakeup()
    {
    }

    /**
     * Singleton accessor - retourneert de database instantie.
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Koppel verbinding met de database.
     */
    private function connect(): PDO
    {
        if ($this->pdo !== null) {
            return $this->pdo;
        }

        $config = require __DIR__ . '/../config.php';
        $db = $config['database'];

        $dsn = "mysql:host={$db['host']};port={$db['port']};dbname={$db['name']};charset={$db['charset']}";

        try {
            $this->pdo = new PDO(
                $dsn,
                $db['username'],
                $db['password'],
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$db['charset']}",
                ]
            );
        } catch (PDOException $e) {
            // In development mode: laat de error zien
            $appConfig = require __DIR__ . '/../config.php';
            if ($appConfig['app']['env'] === 'development') {
                die("Database verbinding mislukt: " . $e->getMessage());
            }
            die("Er is een database fout opgetreden. Probeer het later opnieuw.");
        }

        return $this->pdo;
    }

    /**
     * Retourneert de PDO verbinding.
     */
    public function pdo(): PDO
    {
        return $this->connect();
    }

    /**
     * Voer een query uit met prepared statements.
     * @return array|false Resultaat array of false bij INSERT/UPDATE/DELETE
     */
    public function query(string $sql, array $params = []): array|false
    {
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Voer een INSERT uit en retourneer het aangemaakte ID.
     */
    public function insert(string $sql, array $params = []): int
    {
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute($params);
        return (int)$this->pdo()->lastInsertId();
    }

    /**
     * Voer een UPDATE of DELETE uit.
     */
    public function execute(string $sql, array $params = []): int
    {
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
}
