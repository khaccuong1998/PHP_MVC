<?php
class Product_Controller extends Base_controller
{
    function index(){
        $this->view->load('product/index');
    }
}