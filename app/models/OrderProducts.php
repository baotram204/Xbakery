<?php

namespace app\models;

use core\Model;

class OrderProducts extends Model
{
    private $model_oderProduct = "order_items";

    public function __construct(){
        parent::__construct();
    }

    public function pushIdProduct($infor) {
        $data = $this->db->insert($this->model_oderProduct, $infor);
        return $data;
    }
}