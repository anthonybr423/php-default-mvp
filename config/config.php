<?php
    function env($key){
        $env = parse_ini_file(dirname(__DIR__) . "/.env") ?: [];
        return $env[$key];
    }

    require_once(dirname(__DIR__) ."/config/helpers.php");    
    require_once(dirname(__DIR__) ."/config/http.php");
    require_once(dirname(__DIR__) ."/config/controller.php");
    require_once(dirname(__DIR__) ."/config/router.php");
    require_once(dirname(__DIR__) ."/config/query.php");
    $router = new Router();
    require_once(dirname(__DIR__) ."/src/routes.php");