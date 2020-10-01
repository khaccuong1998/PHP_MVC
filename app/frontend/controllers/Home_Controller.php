<?php
    class Home_Controller extends Base_Controller{

    function __construct()
    {
        parent::__construct();
        $this->model->load('Home', 'home');
    }

    function index()
    {
            $data = 5;
            $this->view->load('home/index', [
                'so' => $data
        ]);
        }

        function show(){
            $this->view->load('home/show');
        }

        function show5657()
        {
            echo "Cuong";
        }
    }