<?php
    class Home_Controller extends Base_Controller{

    function __construct()
    {
        parent::__construct();
        $this->model->load('Home', 'home');
    }

        function index(){

        }

        function show(){
            $this->view->load('home/show');
        }

        function show5657()
        {
            echo "Cuong";
        }
    }