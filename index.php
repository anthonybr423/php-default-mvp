<?php
    require_once(dirname(__FILE__) ."/config/helpers.php");
    require_once(dirname(__FILE__) ."/config/controller.php");
    require_once(dirname(__FILE__) ."/config/config.php");
    use \App\Config\Router;
    $router = new Router();
    require_once(dirname(__FILE__) ."/config/routes.php");
    $router->dispatch();