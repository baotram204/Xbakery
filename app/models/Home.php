<?php

namespace app\models;

use core\Model;
use PDO;

class Home extends Model
{
    protected $__table="categories";
    public function __construct(){
        parent::__construct();
    }

    public function getList() {
        $data = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

}