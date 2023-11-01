<?php

namespace app\models;

use core\Model;
use PDO;
class Cart extends Model
{
    private $model_cart = "Carts";

    public function __construct(){
        parent::__construct();
    }

    public function getLastIdCart() {
        $sql = "SELECT cart_id FROM $this->model_cart ORDER BY cart_id DESC LIMIT 1";
        $data = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $data['cart_id'];
    }

    public function pushCart($infor) {
        $data = $this->db->insert($this->model_cart, $infor);
        return $data;
    }
}