<?php

    function load_app(){
        $config = require BASE_PATH . '/config/config.php';

        $module = !empty($_GET['module'])? $_GET['module'] : $config['default_module'];
        $action = !empty($_GET['action'])? $_GET['action'] : $config['default_action'];

        require BASE_PATH . '/core/Core_Controller.php';
        require BASE_PATH . '/core/Base_Controller.php';
        require BASE_PATH . '/core/Core_Model.php';
        require BASE_PATH . '/core/Base_Model.php';




        $controller = ucfirst($module) . '_Controller';

        $controller_path = APP_PATH . '/controllers/' . $controller . '.php';

        if(!file_exists($controller_path))
        {
            exit("File $controller_path not exist  !");
        }
        require_once $controller_path;
        if (!class_exists($controller)) {
            exit("Class not exist ! $controller");
        }
        $object = new $controller;
        if (!method_exists($object,$action)) {
            echo "Method $action not exist!";
            exit();
        }
        $object->$action();
}