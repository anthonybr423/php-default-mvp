<?php

class Router
{
    private $routes = [];
    public function add(string $method, string $route, string $class, string $action, array $params = [])
    {
        foreach ($this->routes as $r) {
            if ($r['url'] == $route) {
                throw new Exception("Route already exists");
            }
        }

        if (!isset($class) || !isset($action)) {
            throw new Exception("Class or action not has been set");
        }

        $this->routes[] = ["method" => $method, "url" => $route, "class" => $class, "action" => $action, "params" => $params];
    }
    public function dispatch()
    {
        $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        foreach ($this->routes as $route) {
            if ($route['url'] == $url) {
                $class = $route['class'];
                $action = $route['action'];
                $params = $route['params'];
                require_once(dirname(__DIR__) . "/src/controllers/" . $class . ".php");

                if (!class_exists($class)) {
                    throw new Exception("Class not has been set");
                }

                if (!method_exists($class, $action)) {
                    throw new Exception("Action not has been set");
                }

                $class = new $class;
                $class->$action($params);
                return;
            }
        }
        echo "404 Not Found";
    }
}
