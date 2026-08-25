<?php

namespace App\Middleware;
class AuthMiddleware {
    /**
     * Inicia la sesión de forma segura si no está iniciada.
     */
    public static function initSession(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'lifetime' => 0,              
                'path'     => '/',
                'httponly' => true,           
                'samesite' => 'Lax'           
            ]);
            session_start();
        }
    }

    /**
     * Verifica que el usuario haya iniciado sesión.
     * Si no, redirige al formulario de login.
     */
    public static function requireAdmin(): void {
        self::initSession();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: /Muebles/public/admin/login'); 
            exit;
        }

        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
            self::logout();
            header('Location: /Muebles/public/admin/login?expired=1'); 
            exit;
        }

        $_SESSION['last_activity'] = time();
    }

    /**
     * Cierra la sesión limpiando datos e ID de cookie.
     */
    public static function logout(): void {
        self::initSession();
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
    }
}