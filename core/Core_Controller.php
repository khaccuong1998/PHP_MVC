<?php

    class Core_Controller {

        protected $layout;
        protected $view;


        function __construct() {
            require BASE_PATH . '/core/Loaders/Layout_Loader.php';

            $this->layout = new Layout_Loader;

            require BASE_PATH . '/core/Loaders/View_Loader.php';

            $this->view = new View_Loader;
        }

    }