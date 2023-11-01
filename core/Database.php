<?php

namespace core;

use App;
use Exception;

class Database
{
    private  $__conn;
    function __construct() {
        global $db_config;
        $this->__conn = Connection::getInstance($db_config);
    }

    //các function query data
    public  function  query($sql) {
        try {
            $stmt = $this->__conn->prepare($sql);
            $stmt->execute();
            return  $stmt;

        } catch (Exception $e) {
            $mess = $e->getMessage();
            $array['message'] = $mess;
            App::$app->loadError('database', $array);
            die();
        }
    }

    function insert($table, $data ) {
        if(!empty($data)) {
            $fieldStr = '';
            $valueStr = '';
            foreach ($data as $key=>$value) {
                $fieldStr .=$key.',';
                $valueStr .="'".$value."',";
            }

            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $table($fieldStr) VALUES ($valueStr)";

            $status = $this->query($sql);

            if($status) {
                return true;
            }

        }
        return false;
    }

    function  update($table, $data, $condition='') {
        if(!empty($data)) {
            $updateStr = '';
            foreach ($data as $key=>$value) {
                $updateStr .="$key='$value',";
            }
            $updateStr = rtrim($updateStr, ',');

            if(!empty($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            } else {
                $sql = "UPDATE $table SET $updateStr";
            }
            $status = $this->query($sql);
            if($status) {
                return true;
            }

        }
        return false;
    }

    function delete($table, $condition=''){
        if(!empty($condition)) {
            $sql = "DELETE FROM $table WHERE $condition";

        } else {
            $sql = "DELETE FROM $table";
        }

        $status = $this->query($sql);
        if($status) {
            return true;
        }
        return  false;
    }

    function lastInsertId() {
        return $this->__conn->$this->lastInsertId();
    }
}