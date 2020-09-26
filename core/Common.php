<?php

    function load_app(){
        $config = require BASE_PATH . '/config/config.php';

        $module = !empty($_GET['module'])? $_GET['module'] : $config['default_module'];
        $action = !empty($_GET['action'])? $_GET['action'] : $config['default_action'];

        require BASE_PATH . '/core/Core_Controller.php';
        require BASE_PATH . '/core/Base_Controller.php';


        $controller = ucfirst($module) . '_Controller';

        $controller_path = APP_PATH . '/controllers/' . $controller . '.php';

        if(!file_exists($controller_path))
        {
            echo "File $controller_path not exist  !";
            exit();
        }
        require_once $controller_path;
        if (!class_exists($controller)) {
            echo "Class not exist ! $controller";
            exit();
        }
        $object = new $controller;
        if (!method_exists($object,$action)) {
            echo "Method $action not exist!";
            exit();
        }
        $object->$action();

    }