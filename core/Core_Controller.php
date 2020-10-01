<?php

    class Core_Controller {

        protected $layout;
        protected $view;
        protected $model;
        protected $helper;



    function __construct()
    {

        require BASE_PATH . '/core/Loaders/Layout_Loader.php';
            $this->layout = new Layout_Loader;

        require BASE_PATH . '/core/Loaders/View_Loader.php';
            $this->view = new View_Loader;

        require BASE_PATH . '/core/Loaders/Model_Loader.php';
            $this->model = new Model_Loader;

        require BASE_PATH . '/core/Loaders/Helper_Loader.php';
            $this->helper = new Helper_Loader;

            $this->autoload();
    }

    function autoload()
    {
        $autoload_config = require BASE_PATH . '/config/autoload.php';
        foreach ($autoload_config as $autoload_key => $autoloads) {
            foreach ($autoloads as $autoload) {
                $this->$autoload_key->load($autoload);
            }
        }
    }
}