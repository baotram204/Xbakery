<?php

namespace app\models;

use core\Model;
use PDO;
class Cart extends Model
{
    private $__table = "Carts";
    private $arrayListCart = [];

    public function __construct(){
        parent::__construct();
    }

    public function getLastIdCart() {
        $sql = "SELECT cart_id FROM $this->__table ORDER BY cart_id DESC LIMIT 1";
        $data = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $data['cart_id'];
    }

    public function getAllOrder() {
        $data = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $cart = [];
            $cart["id"] = $value["cart_id"];
            $cart["customer_id"] = $value["customer_id"];
            $cart["quantity"] = $value["quantity"];
            $cart["total_money"] = $value["total_money"];
            $cart["payment_id"] = $value["payment_id"];
            $cart["status"] = $value["status"];

            $this->arrayListCart[] = $cart;
        }

        return $this->arrayListCart;
    }

    public function getOrder($id) {
        $data = $this->db->query("SELECT * FROM $this->__table WHERE cart_id = $id")->fetchAll(PDO::FETCH_ASSOC);
        $cart = [];
        $cart["id"] = $data[0]["cart_id"];
        $cart["customer_id"] = $data[0]["customer_id"];
        $cart["quantity"] = $data[0]["quantity"];
        $cart["total_money"] = $data[0]["total_money"];
        $cart["payment_id"] = $data[0]["payment_id"];
        $cart["status"] = $data[0]["status"];

        return  $cart;
    }

    public function pushCart($infor) {
        $data = $this->db->insert($this->__table, $infor);
        return $data;
    }

    public function deleteCart($id) {
        $condition = "cart_id='$id'";
        $data = $this->db->delete($this->__table, $condition);
        return $data;
    }

    public function updateOrder($infor, $condition) {
        $data = $this->db->update($this->__table, $infor, $condition);
        return $data;
    }

    public function totalMoneyOfDelivered() {
        $data = $this->db->query("SELECT SUM(total_money) AS total_delivered_money FROM $this->__table WHERE status = 'delivered'")->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['total_delivered_money'];
    }

    public function countAllOrderProduct() {
        $data = $this->db->query("SELECT COUNT(*) AS total_products FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['total_products'];
    }
}