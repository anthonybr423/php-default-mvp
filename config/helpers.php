<?php

if (!function_exists("script")) {
    function script($script)
    {
        echo "<script src='" . $script . "'></script>";
    }
}

if (!function_exists("style")) {
    function style($stylesheet)
    {
        echo "<link rel='stylesheet' href='" . $stylesheet . "'>";
    }
}

if (!function_exists("redirect")) {
    function redirect($url)
    {
        echo parse_url($url);
    }
}

if (!function_exists("component")) {
    function component($view, array $data = [])
    {
        extract($data);
        $view = dirname(__DIR__) . "/src/components/" . $view . ".php";
        require_once($view);
    }
}
if (!function_exists("dd")) {
    function dd($data)
    {
        http_response_code(200);
        header("Content-Type: application/json");
        echo json_encode($data, JSON_PRETTY_PRINT);
        die();
    }
}
