<?php

namespace app\models;


use core\Model;
use PDO;

class Category extends Model
{
    protected $__table = "categories";
    protected $arrayCategories = [];

    public function __construct(){
        parent::__construct();
    }

    public function getListCategories() {
        $data = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $category = [];
            $category["id"] = $value["category_id"];
            $category["item_id"] = $value["item_id"];
            $category["title"] = $value["title"];
            $this->arrayCategories[] = $category;
        }

        return $this->arrayCategories;

    }

}