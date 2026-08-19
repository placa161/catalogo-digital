<?php
namespace App\Controllers;

use App\Models\Product;

class AdminController {

    public function index() {
        $productModel = new Product();
        $products = $productModel->getAll();

        $pageTitle = "Gestión de Productos | Admin";
        $extraCss = "admin";
        $viewPath = dirname(__DIR__, 2) . '/app/Views/admin/products/index.php';
        
        require_once __DIR__ . '/../Views/layout.php';
    }

    public function dashboard() {
        $this->index();
    }

    public function create() {
        $pageTitle = "Agregar Nuevo Mueble | Admin";
        $extraCss = "admin";

        $viewPath = realpath(__DIR__ . '/../Views/admin/products/form.php');
        
        require_once __DIR__ . '/../Views/layout.php';
    }
}