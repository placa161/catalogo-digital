<?php

namespace App\Controllers;

use App\Models\Product;

class CatalogController {
    
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAll();
        
        $pageTitle = "Catálogo de Sofás y Muebles Exclusivos";
        $extraCss = "catalog";
        
        $viewPath = BASE_PATH . '/app/Views/catalog/index.php';
        require_once BASE_PATH . '/app/Views/layout.php';
    }
}