<?php
class User_Controller extends Base_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model->load('User', 'user');
    }

    function index()
    {
        $users = $this->model->user->find_all();
        $this->view->load('user/new');
        $this->view->load('user/index', ['users' => $users]);
    }

    function show()
    {
        $id = $_GET["id"];
        $user = $this->model->user->find_by_id($id);
        $this->view->load('user/show', ['user' => $user]);
    }

    function new_user()
    {
        $name = getPostParameter('name');
        $email = getPostParameter('email');

        $this->model->user->create([
            'name' => $name,
            'email' => $email
        ]);
        $message = "Tao thanh cong";
        return to_api_json(API_SUCCESS, $message, []);
    }
}