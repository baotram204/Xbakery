<?php

namespace app\models;

use core\Model;
use PDO;

class Payment extends Model
{
    private $__table = "Payment";
    private $arraypayment = [];

    public function __construct(){
        parent::__construct();
    }

    public function pushPayment($infor) {
        $data = $this->db->insert($this->__table, $infor);
        return $data;
    }
    function getLastIdPayment() {
        $sql = "SELECT payment_id FROM $this->__table ORDER BY payment_id DESC LIMIT 1";
        $data = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $data['payment_id'];
    }
    
    function getPayment($condition=''){
        if($condition == "") {
            $data = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $data = $this->db->query("SELECT * FROM $this->__table WHERE payment_id = $condition")->fetchAll(PDO::FETCH_ASSOC);
        }
        foreach ($data as $value) {
            $payment = [];
            $payment["payment_id"] = $value["payment_id"];
            $payment["cash"] = $value["cash"];

            if($condition=="") {
                $this->arraypayment[] = $payment;
            }else {
                return $payment;
            }
        }

        return $this->arraypayment;
    }
    public function deletePayment($id) {
        $condition = "payment_id='$id'";
        $data = $this->db->delete($this->__table, $condition);
        return $data;
    }
}