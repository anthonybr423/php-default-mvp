<?php
class Controller
{
    public function redirect($route, array $params = [])
    {
        header("Location: " . $route . (isset($params) ? "?" . http_build_query($params) : ""));
        exit;
    }

    public function view($view, array $data = [])
    {
        extract($data);
        $view = dirname(__DIR__) . "/src/views/" . $view . ".php";
        require_once($view);
    }

    public function collect(array $data)
    {
        return $data;
    }
    
}
