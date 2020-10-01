<?php
session_start();
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
        $this->view->load('user/index', ['users' => $users]);
    
    }

    function show()
    {
        $id = $_GET["id"];
        $user = $this->model->user->find_by_id($id);
        $this->view->load('user/show', ['user' => $user]);
    }
    function del()
    {
        $id = $_GET["id"];
        if ($this->model->user->delete($id)) {
            $_SESSION["del"] = 1;
            header("location:" . base_url("user/index"));
        }
    }
    function add()
    {
        $this->view->load('user/add');
    }
    function add_user()
    {
        if (isset($_POST["add_user"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $created_at = date("Y-m-d h:i:s");
            $data = [$name, $email,$created_at];
            
            if ($this->model->user->insert($data)) {
                $_SESSION["add_user"] = 1;
                header("location:" . base_url("user/index"));
            } else {
                echo "Lỗi";
            }
        }
    }
    function update()
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $updated_at = date("Y-m-d h:i:s");
        $data = [$id, $name, $email, $updated_at];
      
        if ($this->model->user->update($data)) {
            $_SESSION["update"] = 1;
            header("location:" . base_url("user/index"));
        } else {
            echo "Lỗi";
        }
    }
   
}