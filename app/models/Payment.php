<?php

namespace app\models;

use core\Model;
use PDO;

class Payment extends Model
{
    private $model_payment = "Payment";

    public function __construct(){
        parent::__construct();
    }

    public function pushPayment($infor) {
        $data = $this->db->insert($this->model_payment, $infor);
        return $data;
    }
    function getLastIdPayment() {
        $sql = "SELECT payment_id FROM $this->model_payment ORDER BY payment_id DESC LIMIT 1";
        $data = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $data['payment_id'];
    }
}