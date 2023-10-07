<?php

class App {

    private $__controller, $__action, $__params, $__route;

    static public $app;

    public function __construct() {
        global $routes, $config;

        self::$app = $this;

        $this->__route = new \core\Route();

        if (!empty($routes["default_controller"])) {
            $this->__controller = $routes["default_controller"];
        }

        $this->__action = 'index';
        $this->__params = array();

        $this->handleURL();
    }

    public function getURL() {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = "/";
        }

        return $url;
    }

    public function configsActionParam($url, $urlArr) {
        if ($url == "menu") {

            if (empty($urlArr[1])) {
                // Nếu không có action được chỉ định, sử dụng action mặc định
                $this->__action = "category";
            }

            if (empty($urlArr[2])) {
                // Nếu không có param được chỉ định, sử dụng param mặc định
                $this->__params = array_values([1]);
            }
        }

    }

    public function handleURL() {
        $url = $this->getURL();

        $url = $this->__route->handleRoute($url);

        $urlArr = array_filter(explode("/", $url));
        $urlArr = array_values($urlArr);



        if (!empty($urlArr[0])) {
            $this->__controller = $urlArr[0];
            unset($urlArr[0]);
        }
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        $this->__params = array_values($urlArr);

        $controllerFileName = "app/controllers/client/" . ucfirst($this->__controller) . '.php';

        $this->configsActionParam($this->__controller, $urlArr);

        if (file_exists($controllerFileName)) {
            require_once $controllerFileName;

            $controllerClassName = 'app\controllers\client\\' . ucfirst($this->__controller);
            if (class_exists($controllerClassName)) {
                $controllerInstance = new $controllerClassName();

                echo $this->__controller;
                echo $this->__action;

                if (method_exists($controllerInstance, $this->__action)) {
                    call_user_func_array([$controllerInstance, $this->__action], $this->__params);
                } else {
                    echo "Không tìm thấy action.";
                    $this->loadError();
                }
            } else {
                echo "Không tìm thấy controller.";
                $this->loadError();
            }
        } else {
            echo "Không tìm thấy controller file.";
            $this->loadError();
        }


    }

    public function loadError($name = '404', $data = []) {
        extract($data);
        require_once "errors/" . $name . '.php';
    }
}
