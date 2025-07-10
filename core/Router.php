<?php

class Router
{
    private $routes = [];

    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        $this->addRoute('POST', $uri, $action);
    }

    private function addRoute($method, $uri, $action)
    {
        $uri = trim($uri, '/');
        $this->routes[] = compact('method', 'uri', 'action');
    }

    public function dispatch($requestUri, $requestMethod)
    {
        $path = trim(parse_url($requestUri, PHP_URL_PATH), '/');

        foreach ($this->routes as $route) {
            $pattern = preg_replace('/\{[a-zA-Z_]+\}/', '([a-zA-Z0-9-_]+)', $route['uri']);
            $pattern = '@^' . $pattern . '$@D';

            if ($route['method'] === $requestMethod && preg_match($pattern, $path, $matches)) {
                array_shift($matches); // удаляем полный матч

                [$controllerName, $methodName] = explode('@', $route['action']);
                $controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    $controller = new $controllerName();
                    return call_user_func_array([$controller, $methodName], $matches);
                }

                http_response_code(500);
                echo "Контроллер не найден";
                return;
            }
        }

        http_response_code(404);
        echo "Страница не найдена";
    }
}