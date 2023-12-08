<?php

namespace app\models;

use Cassandra\Numeric;
use core\Model;
use PDO;

class Product extends Model
{
    private $__table = "items";
    protected $arrayProducts = [];

    public function __construct(){
        parent::__construct();
    }

    public function getListProducts($condition="") {
        if($condition == "") {
            $data = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        }elseif (is_numeric($condition)) {
            $data = $this->db->query("SELECT * FROM $this->__table WHERE item_id = $condition")->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $data = $this->db->query("SELECT * FROM $this->__table WHERE $condition")->fetchAll(PDO::FETCH_ASSOC);
        }
        foreach ($data as $value) {
            $products = [];
            $products["id"] = $value["item_id"];
            $products["title"] = $value["title"];
            $products["category_id"] = $value["category_id"];
            $products["description"] = $value["description"];
            $products["ingredients"] = $value["ingredients"];
            $products["price"] = $value["price"];
            $products["image_name"] = $value["image_name"];
            $products["deleted"] = $value["deleted"];

            if (is_numeric($condition)) {
                return $products;
            }
            $this->arrayProducts[] = $products;
        }

        return $this->arrayProducts;

    }

    public function pushProduct($infor) {
        $data = $this->db->insert($this->__table, $infor);
        return $data;
    }

    public function updateProduct($infor, $condition) {
        $data = $this->db->update($this->__table, $infor, $condition);
        return $data;
    }

    public function deleteProduct($id) {
        $infor = array(
            "deleted" => 1
        );
        $condition = "item_id='$id'";
        $data = $this->db->update($this->__table, $infor, $condition);
        return $data;
    }

    public function countAllProduct() {
        $data = $this->db->query("SELECT COUNT(*) AS total_products FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['total_products'];
    }
}