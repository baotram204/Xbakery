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

        $this->checkLogin();
        $this->handleURL();
    }

    public function checkLogin() {
        $isAdminPage = strpos($_SERVER['REQUEST_URI'], '/admin/') !== false;

        $isLoginPage = strpos($_SERVER['REQUEST_URI'], '/admin/login') !== false;

        if ($isAdminPage && !isset($_SESSION['user']) && !$isLoginPage) {
            $_SESSION['no_message'] = 'Please log in to access the Control Panel';
            header('Location: ' . _WEB_ROOT . '/admin/login');
            $this->__controller = 'Login';
            $this->checkFile("app/controllers/admin/" . ucfirst($this->__controller) . '.php', 'admin');
            exit();
        }
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

        if ($url == 'admin') {
            unset($urlArr[0]);

            // Thiết lập controller từ phần tiếp theo của URL
            $this->__controller = !empty($urlArr[1]) ? $urlArr[1] : 'login';
            unset($urlArr[1]); // Loại bỏ phần tử controller từ mảng


            // Thiết lập action từ phần tiếp theo của URL
            $this->__action = !empty($urlArr[2]) ? $urlArr[2] : 'index';
            unset($urlArr[2]); // Loại bỏ phần tử action từ mảng

            // Các phần còn lại trong mảng sẽ là parameters
            $this->__params = array_values($urlArr);

        }

    }

    public function handleURL() {
        $url = $this->getURL();

        $url = $this->__route->handleRoute($url);

        $urlArr = array_filter(explode("/", $url));
        $urlArr = array_values($urlArr);
        $urlArrForAdmin = $urlArr;

        if (!empty($urlArr[0])) {
            $this->__controller = $urlArr[0];
            unset($urlArr[0]);
        }
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        $this->__params = array_values($urlArr);

        if ($this->__controller == "admin") {
            $this->configsActionParam($this->__controller, $urlArrForAdmin);
            $controllerFileName = "app/controllers/admin/" . ucfirst($this->__controller) . '.php';
            $this->checkFile($controllerFileName, 'admin');
        } else {
            $this->configsActionParam($this->__controller, $urlArr);
            $controllerFileName = "app/controllers/client/" . ucfirst($this->__controller) . '.php';
            $this->checkFile($controllerFileName, 'client');
        }

    }

    function checkFile($controllerFileName, $type){
        if (file_exists($controllerFileName)) {
            require_once $controllerFileName;

            $controllerClassName = 'app\controllers\\'.$type.'\\' . ucfirst($this->__controller);
            if (class_exists($controllerClassName)) {
                $controllerInstance = new $controllerClassName();

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