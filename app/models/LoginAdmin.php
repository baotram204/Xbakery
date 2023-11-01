<?php

namespace app\models;

use core\Model;
use PDO;
class LoginAdmin extends Model
{
    protected $__table = "Admins";

    public function __construct(){
        parent::__construct();
    }

    public function checkAdmin($username, $password) {
        $data = $this->db->query("SELECT * FROM $this->__table WHERE user_name='$username' AND password='$password'")->fetchAll(PDO::FETCH_ASSOC);

        if (count($data) > 0) {
            return true;
        } else {
            return false;
        }
    }
}