<?php
    class Home_Controller extends Base_Controller{

        function index(){
            $data = 5;
            $this->view->load('home/index', [
                'so' => $data
            ]);
            $this->view->load('home/show');
            $this->view->load('product/index');
        }

        function show(){
            $this->view->load('home/show');
        }

        function show5657()
        {
            echo "Cuong";
        }
    }