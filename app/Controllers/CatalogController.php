<?php

namespace App\Controllers;

class CatalogController {
    
    public function index() {
        $pageTitle = "Catálogo de Sofás y Muebles Exclusivos";
        
        $viewPath = BASE_PATH . '/app/Views/catalog/index.php';
        
        require_once BASE_PATH . '/app/Views/layout.php';
    }
}