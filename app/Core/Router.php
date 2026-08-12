<?php
namespace App\Core;

class Router {
    protected array $routes = [];

    /**
     * GET
     */
    public function get(string $route, string $controllerAction): void {
        $this->addRoute('GET', $route, $controllerAction);
    }

    /**
     * POST
     */
    public function post(string $route, string $controllerAction): void {
        $this->addRoute('POST', $route, $controllerAction);
    }


    private function addRoute(string $method, string $route, string $controllerAction): void {
        // regex
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_-]+)', $route);
        $pattern = '#^' . trim($pattern, '/') . '$#';

        $this->routes[] = [
            'method' => $method,
            'pattern' => $pattern,
            'action' => $controllerAction
        ];
    }

    public function dispatch(string $url): void {
        $url = trim($url, '/');
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && preg_match($route['pattern'], $url, $matches)) {
                
                // Separar Controlador y Método (ej: CatalogController@index)
                [$controllerName, $method] = explode('@', $route['action']);
                $fullControllerClass = "App\\Controllers\\" . $controllerName;

                if (!class_exists($fullControllerClass)) {
                    http_response_code(500);
                    echo "Error 500: El controlador '{$controllerName}' no existe.";
                    return;
                }

                $controllerInstance = new $fullControllerClass();

                if (!method_exists($controllerInstance, $method)) {
                    http_response_code(500);
                    echo "Error 500: El método '{$method}' no existe en {$controllerName}.";
                    return;
                }
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                call_user_func_array([$controllerInstance, $method], $params);
                return;
            }
        }
        http_response_code(404);
        echo "<h1>Error 404 - Página no encontrada</h1>";
    }
}