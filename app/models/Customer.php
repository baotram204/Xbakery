<?php

namespace app\models;

use core\Model;
use PDO;

class Customer extends Model
{
    private $__table = "customers";
    public $arrayCustomer = [];
    public function __construct(){
        parent::__construct();
    }

    public function pushUserData($infor) {
        $data = $this->db->insert($this->__table, $infor);
    }
    public function getLastIdCustomer() {
        $sql = "SELECT customer_id FROM $this->__table ORDER BY customer_id DESC LIMIT 1";
        $data = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $data['customer_id'];
    }

    public function  getAllCustomer() {
        $data = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $customer = [];
            $customer["customer_id"] = $value["customer_id"];
            $customer["name"] = $value["name"];
            $customer["phone"] = $value["phone"];
            $customer["delivery"] = $value["delivery"];
            $customer["address"] = $value["address"];
            $customer["comment"] = $value["comment"];

            $this->arrayCustomer[] = $customer;
        }
        return $this->arrayCustomer;
    }

    public function  getCustomer($id) {
        $data = $this->db->query("SELECT * FROM $this->__table WHERE customer_id = $id")->fetchAll(PDO::FETCH_ASSOC);
        $customer = [];
        $customer["name"] = $data[0]["name"];
        $customer["phone"] = $data[0]["phone"];
        $customer["delivery"] =$data[0]["delivery"];
        $customer["address"] = $data[0]["address"];
        $customer["comment"] = $data[0]["comment"];

        return $customer;
    }

    public function deleteCustomer($id) {
        $condition = "customer_id='$id'";
        $data = $this->db->delete($this->__table, $condition);
        return $data;
    }
    public function countAllComment() {
        $data = $this->db->query("SELECT COUNT(*) AS total_comments FROM  $this->__table WHERE comment IS NOT NULL AND comment != ''")->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['total_comments'];
    }
}