<?php

namespace core;

abstract class Model extends Database
{
    public  $db;
    public function __construct(){
        $this->db = new \core\Database();
    }

}