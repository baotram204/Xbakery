<?php

namespace app\models;

use core\Model;
use PDO;

class OrderProducts extends Model
{
    private $__table = "order_items";
    private $arrayproductsOrders = [];

    public function __construct(){
        parent::__construct();
    }

    public function pushIdProduct($infor) {
        $data = $this->db->insert($this->__table, $infor);
        return $data;
    }

    public function getAllProduct() {
        $data = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $productOrders = [];
            $productOrders["id"] = $value["id"];
            $productOrders["item_id"] = $value["item_id"];
            $productOrders["quantity"] = $value["quantity"];
            $productOrders["cart_id"] = $value["cart_id"];

            $this->arrayproductsOrders[] = $productOrders;
        }

        return $this->arrayproductsOrders;
    }

    public function deleteOrderItemFromCartId($id) {
        $condition = "cart_id='$id'";
        $data = $this->db->delete($this->__table, $condition);
        return $data;
    }

}