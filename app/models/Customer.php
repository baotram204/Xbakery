<?php

namespace app\models;

use core\Model;
use PDO;

class Customer extends Model
{
    private $model_customer = "Customers";
    public function __construct(){
        parent::__construct();
    }

    function pushUserData($infor) {
        $data = $this->db->insert($this->model_customer, $infor);
    }
    function getLastIdCustomer() {
        $sql = "SELECT customer_id FROM $this->model_customer ORDER BY customer_id DESC LIMIT 1";
        $data = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $data['customer_id'];
    }

}