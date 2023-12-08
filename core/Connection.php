<?php

namespace core;

use App;
use PDO;
use PDOException;

class Connection
{
    private static $_instance = null, $conn = null;
    private $_pdo;

    public function __construct($config){


        $servername = $config['host'];
        $username = $config['user'];

        $password ='';
        if (isset($config['pass'])) {
            $password = $config['pass'];
        }
        $db_name = $config['db'];

        try {
            $this->_pdo = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);

            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn = $this->_pdo;

        } catch (PDOException $e) {
            $mess = $e->getMessage();
            $array['message'] = $mess;
            App::$app->loadError('database', $array);
            die();
        }

    }
    public static function getInstance($config){
        if(!isset(self::$_instance)){
            $connection = new \core\Connection($config);
            self::$_instance = self::$conn;
        }
        return self::$_instance;
    }
}