<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    /**
     * Obtiene todos los productos junto con el nombre de su categoría
     */
    public function getAll() {
        $sql = "SELECT p.id, p.code, p.name, p.description, p.image, c.name AS category 
                FROM products p
                INNER JOIN categories c ON p.category_id = c.id
                ORDER BY p.id DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Obtiene un solo producto por su código
     */
    public function getByCode($code) {
        $sql = "SELECT p.id, p.code, p.name, p.description, p.image, p.category_id, c.name AS category 
                FROM products p
                INNER JOIN categories c ON p.category_id = c.id
                WHERE p.code = :code 
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':code' => $code]);

        return $stmt->fetch();
    }
}