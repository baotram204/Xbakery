<?php

namespace app\models;

use core\Model;
use PDO;

class Admin extends Model
{
    private $__table = 'Admins';
    private $arrayListAdmin = [];
    private $arrayAdmin = [];

    public function __construct(){
        parent::__construct();
    }

    public function getAllAdmin() {
        $data = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $value) {
            $admin = [];
            $admin['id'] = $value['id'];
            $admin['username'] = $value['user_name'];
            $admin['password'] = $value['password'];
            $this->arrayListAdmin[] = $admin;
        }
        return $this->arrayListAdmin;
    }

    public function getAdmin($id) {
        $data = $this->db->query("SELECT * FROM $this->__table WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);
        $admin = [];
        foreach ($data as $value) {
            $admin['id'] = $value['id'];
            $admin['username'] = $value['user_name'];
            $admin['password'] = $value['password'];
        }
        return $admin;

    }

    public function addAdmin($infor) {
        $data = $this->db->insert($this->__table, $infor);
        return $data;
    }

    public function updateAdmin($infor, $condition) {
        $data = $this->db->update($this->__table, $infor, $condition);

        var_dump($infor);

        return $data;
    }

    public function deleteAdmin($id) {
        $condition = "id='$id'";
        $data = $this->db->delete($this->__table, $condition);
        return $data;
    }

}