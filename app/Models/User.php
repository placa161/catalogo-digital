<?php
namespace App\Models;

use App\Core\Database;
use PDO;
class User {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    /**
     * Busca un usuario por su email.
     */
    public function findByEmail(string $email): ?array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $user ?: null;
    }

    /**
     * Registra un nuevo usuario con la contraseña cifrada.
     */
    public function create(string $name, string $email, string $plainPassword): bool {
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare(
            "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)"
        );

        return $stmt->execute([
            ':name'     => $name,
            ':email'    => $email,
            ':password' => $hashedPassword
        ]);
    }
}