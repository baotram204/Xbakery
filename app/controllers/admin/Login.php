<?php

namespace app\controllers\admin;

use core\Controller;

class Login extends Controller
{
    private $model_login;
    protected array $data=[];

    public function index() {
        $this->data["sub_content"][""] = '';
        $this->data['content'] = "/layouts/admin/login";
        $this->data["page_title"] = "Login";
        //render view
        $this->render('/layouts/admin/admin_layout', $this->data);

        $this->checkLoginAdmin();
    }

    public function checkLoginAdmin() {
        if(isset($_POST['username']) and isset($_POST['password'])) {
            $userName = $_POST['username'];
            $password = $_POST['password'];

            $this->model_login = $this->model('LoginAdmin');
            $data = $this->model_login->CheckAdmin($userName, $password);
            if($data) {
                $newURL = _WEB_ROOT.'/admin/home';
                $_SESSION['user'] = $userName;
                $_SESSION['login'] = 'Login successful.';
                header('Location: ' . $newURL);
                exit;
            }else {
                //when username or password are not correct
                $_SESSION['login_failed'] = "Username or password false!";
                header('Location: ' ._WEB_ROOT.'/admin/login');
            }
        }

    }
}