<?php

namespace App\Config;

use Exception;

class Router
{
    private $routes = [];
    public function get(string $route, string $class, string $method, array $params = [])
    {
        foreach ($this->routes as $r) {
            if ($r['url'] == $route) {
                throw new Exception("Route already exists");
            }
        }

        if (!isset($class) || !isset($method)) {
            throw new Exception("Class or method not has been set");
        }

        $this->routes[] = ["url" => $route, "class" => $class, "method" => $method, "params" => $params];
    }
    public function dispatch()
    {
        $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        foreach ($this->routes as $route) {
            if ($route['url'] == $url) {
                $class = $route['class'];
                $method = $route['method'];
                $params = $route['params'];
                require_once(dirname(__DIR__) . "/src/controllers/" . $class . ".php");

                if (!class_exists($class)) {
                    throw new Exception("Class not has been set");
                }

                if (!method_exists($class, $method)) {
                    throw new Exception("Method not has been set");
                }

                $class = new $class;
                $class->$method($params);
                return;
            }
        }
        echo "404 Not Found";
    }
}
