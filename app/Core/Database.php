<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static $instance = null;

    public static function getConnection() {
        if (self::$instance === null) {
            $envPath = __DIR__ . '/../../.env';
            
            if (!file_exists($envPath)) {
                die("Error de Configuración: Falta el archivo .env en la raíz del proyecto.");
            }

            $config = parse_ini_file($envPath, false, INI_SCANNER_RAW);

            $host    = $config['DB_HOST'] ?? 'localhost';
            $dbName  = $config['DB_NAME'] ?? '';
            $user    = $config['DB_USER'] ?? 'root';
            $pass    = $config['DB_PASS'] ?? '';
            $charset = $config['DB_CHARSET'] ?? 'utf8mb4';
            $appEnv  = $config['APP_ENV'] ?? 'local';

            try {
                $dsn = "mysql:host={$host};dbname={$dbName};charset={$charset}";
                
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];

                self::$instance = new PDO($dsn, $user, $pass, $options);

            } catch (PDOException $e) {
                if ($appEnv === 'production') {
                    die("Error de conexión a la Base de Datos. Por favor, intenta más tarde.");
                } else {
                    die("Error de conexión PDO (Modo Local): " . $e->getMessage());
                }
            }
        }

        return self::$instance;
    }
}