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
        $this->view->load('user/index', ['users' => $users]);
    }

    function show()
    {
        $id = $_GET["id"];
        $user = $this->model->user->find_by_id($id);
        $this->view->load('user/show', ['user' => $user]);
    }
    function xoa()
    {
        $id = $_GET["id"];
        if ($this->model->user->delete($id)) {
            $_SESSION["xoa"] = 1;
            redirect("user/index");
        }
    }
    function them()
    {
        $this->view->load('user/them');
    }
    function them_user()
    {
        if (isset($_POST["them"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $data = [$name, $email];
            if ($this->model->user->check_mail($email)) {
                $_SESSION["Check_mail"] = 1;
                redirect("user/them");
            } else {
            if ($this->model->user->insert($data)) {
                $_SESSION["them"] = 1;
                    redirect("user/index");
            } else {
                echo "Lỗi";
            }
        }
    }
    }
    function sua()
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $ngay_up = date("Y-m-d h:i:s", time());
        $data = [$id, $name, $email, $ngay_up];
        if ($this->model->user->check_mail($email)) {
            $_SESSION["Check_mail"] = 1;
            redirect("user/show&id=$id");
        } else {
            if ($this->model->user->update($data)) {
            $_SESSION["sua"] = 1;
                redirect("user/index");
        } else {
            echo "Lỗi";
        }
    }
}
}