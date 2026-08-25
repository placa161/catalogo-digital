<?php
namespace App\Controllers;
use App\Models\User;
use App\Middleware\AuthMiddleware;
class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    /**
     * Muestra la vista de Login.
     */
    public function showLogin(): void {
        AuthMiddleware::initSession();
        if (isset($_SESSION['user_id'])) {
            header('Location: ' . URL_ROOT . '/admin'); 
            exit;
        }

        $error = $_GET['error'] ?? null;

        // BASE_PATH apunta a la raíz del proyecto ("C:/xampp/htdocs/Muebles")
        $viewPath = BASE_PATH . '/app/Views/admin/login.php';

        if (!file_exists($viewPath)) {
            die("Error: No se encontró la vista en: " . $viewPath);
        }

        require_once $viewPath;
    }

    /**
     * Procesa la solicitud de inicio de sesión.
     */
    public function login(): void {
        AuthMiddleware::initSession();

        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            header('Location: /Muebles/public/admin/login?error=Campos+requeridos'); // <-- Cambiar ruta
            exit;
        }

        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);

            $_SESSION['user_id']       = $user['id'];
            $_SESSION['user_name']     = $user['name'];
            $_SESSION['user_email']    = $user['email'];
            $_SESSION['role']          = $user['role'];
            $_SESSION['last_activity'] = time();

            header('Location: /Muebles/public/admin'); // <-- Cambiar ruta
            exit;
        }

        header('Location: /Muebles/public/admin/login?error=Credenciales+inválidas'); // <-- Cambiar ruta
        exit;
    }

    /**
     * Cierra la sesión.
     */
    public function logout(): void {
        AuthMiddleware::logout();
        header('Location: /Muebles/public/admin/login'); // <-- Cambiar ruta
        exit;
    }
}