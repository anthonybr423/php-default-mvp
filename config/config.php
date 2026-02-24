<?php
    require_once(dirname(__DIR__) ."/config/helpers.php");    
    require_once(dirname(__DIR__) ."/config/controller.php");
    require_once(dirname(__DIR__) ."/config/router.php");
    $router = new Router();
    require_once(dirname(__DIR__) ."/src/routes.php");