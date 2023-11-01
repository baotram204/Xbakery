<?php

namespace app\models;

use core\Model;
use PDO;

class Product extends Model
{
    private $model_product = "Items";
    protected $arrayProducts = [];

    public function __construct(){
        parent::__construct();
    }

    public function getListProducts($condition="") {
        if($condition == "") {
            $data = $this->db->query("SELECT * FROM $this->model_product")->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $data = $this->db->query("SELECT * FROM $this->model_product WHERE item_id = $condition")->fetchAll(PDO::FETCH_ASSOC);
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


            if($condition=="") {
                $this->arrayProducts[] = $products;
            }else {
                return $products;
            }
        }

        return $this->arrayProducts;

    }

    public function pushProduct($infor) {
        $data = $this->db->insert($this->model_product, $infor);
        return $data;
    }

    public function updateProduct($infor, $condition) {
        $data = $this->db->update($this->model_product, $infor, $condition);
        return $data;
    }

    public function deleteProduct($id) {
        $condition = "item_id='$id'";
        $data = $this->db->delete($this->model_product, $condition);
        return $data;
    }
}