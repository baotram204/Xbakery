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

            if($condition=="") {
                $this->arrayProducts[] = $products;
            }else {
                return $products;
            }
        }

        return $this->arrayProducts;

    }
}