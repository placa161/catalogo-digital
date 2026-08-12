<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('URL_ROOT', 'http://localhost/Muebles'); // Ajusta según tu servidor local IMPORTANTE CAMBIAR A URL DE PRODUCCION


spl_autoload_register(function ($className) {
    $file = BASE_PATH . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

use App\Core\Router;

$router = new Router();
$router->get('', 'CatalogController@index');
$router->get('producto/{code}', 'ProductController@show');

$router->get('admin', 'AdminController@dashboard');
$router->get('admin/login', 'AdminController@login');

$router->dispatch($_GET['url'] ?? '');