<?php

namespace app\controllers\admin;

use core\Controller;

class AccountAdmin extends Controller
{
    private $model_admin = [];
    protected array $data=[];
    protected array $data1=[];

    public function index() {
        $this->model_admin = $this->model('Admin');

        $this->data["sub_content"]["accountAdmins"] = $this->model_admin->getAllAdmin();
        $this->data['content'] = "\layouts\admin\adminAccount";
        $this->data["page_title"] = "Account admin";

        if(isset($_POST['add_admin'])) {
            // When btn add a new admin
            $username = $_POST['username'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];
            if($password == $re_password) {
                $this->addNewAdmin($username, $password);
            }else {
                $_SESSION['wrong_password'] = "Password is not correct";
            }

        }elseif (isset($_POST['edit']) && $_POST['edit'] == 'Edit') {
            // when btn update pressed
            $id = $_POST['admin_id'];
            $this->updateAdmin($id);

        } elseif (isset($_POST['delete']) && $_POST['delete'] == 'Delete') {
            // when btn delete pressed
            $id = $_POST['admin_id'];
            $this->deleteAdmin($id);
        }

        //render view
        $this->render('\layouts\admin\admin_layout', $this->data);
    }

    public function addNewAdmin($username, $password) {
        $infor = [
            'user_name' => $username,
            'password' => $password
        ];
        $loadAddAdmin = $this->model_admin->addAdmin($infor);
        if ($loadAddAdmin) {
            $_SESSION['add_admin_success'] = "Add admin successfully";
            header('Location: '._WEB_ROOT.'/admin/accountAdmin');
            exit;
        } else {
            $_SESSION['add_admin_fail'] = "Add admin fail";
            header('Location: '._WEB_ROOT.'/admin/accountAdmin');
            exit;
        }
    }

    public function deleteAdmin($id) {
        $loadDeleteAdmin = $this->model_admin->deleteAdmin($id);
        if ($loadDeleteAdmin) {
            $_SESSION['delete_admin_success'] = "Delete admin successfully";
            header('Location: '._WEB_ROOT.'/admin/accountAdmin');
            exit;
        } else {
            $_SESSION['delete_admin_fail'] = "Delete admin fail";
            header('Location: '._WEB_ROOT.'/admin/accountAdmin');
            exit;
        }
    }

    public function updateAdmin($id) {
        $this->model_admin = $this->model('Admin');
        $informationOfAccount = $this->model_admin->getAdmin($id);
        $this->data["sub_content"]["accountAdmin"] = $informationOfAccount;
        $this->data['content'] = "\layouts\admin\updateAdmin";
        $this->data["page_title"] = "Update admin";

        if(isset($_POST['update']) && $_POST['update'] == 'Update') {
            $username = (isset($_POST['username']) && $_POST['username'] != "")? $_POST['username'] : $informationOfAccount['username'];
            $currentPassword = isset($_POST['current_password']) ? $_POST['current_password'] : '';
            $newPassword = isset($_POST['new_password']) ? $_POST['new_password'] : '';
            $re_password = isset($_POST['re_password']) ? $_POST['re_password'] : '';

            if($currentPassword == $informationOfAccount['password'] && $newPassword == $re_password) {
                $infor = [
                    'user_name' => $username,
                    'password' => $newPassword
                ];

                $condition = "id='$id'";
                $loadUpdateAdmin = $this->model_admin->updateAdmin($infor, $condition);

                if ($loadUpdateAdmin) {
                    $_SESSION['update_admin_success'] = "Update admin successfully";
                    header('Location: '._WEB_ROOT.'/admin/accountAdmin');
                    exit();
                } else {
                    $_SESSION['update_admin_fail'] = "Update admin fail";
                }
            }
        }
        $this->render('\layouts\admin\admin_layout', $this->data);
    }

}