<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController {
    
    public function show($code) {
        $productModel = new Product();
        $product = $productModel->getByCode($code);

        if (!$product) {
            // Si el código no existe, redirigimos al catálogo
            header('Location: ' . URL_ROOT);
            exit;
        }

        $pageTitle = $product['name'] . " | STUDIO Muebles";
        
        $viewPath = BASE_PATH . '/app/Views/catalog/detail.php';
        require_once BASE_PATH . '/app/Views/layout.php';
    }
}