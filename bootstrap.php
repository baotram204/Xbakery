<?php
require_once __DIR__.'/vendor/autoload.php';
define('_DIR_ROOT', dirname(__FILE__,1));

//handle http root
$web_root = (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ?  'https://' : 'http://';
$web_root .= $_SERVER['HTTP_HOST'];
// Chuyển đổi các dấu gạch chéo ngược thành dấu gạch chéo thẳng '/'
$document_root = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
$dir_root = str_replace('\\', '/', _DIR_ROOT);

// Xóa phần đường dẫn gốc của tệp PHP khỏi đường dẫn thư mục hiện tại
$folder = str_replace(strtolower($document_root), '', strtolower($dir_root));
$web_root = $web_root.$folder;

define('_WEB_ROOT', $web_root);

// auto load configs
$config_dir = scandir('configs');
if(!empty($config_dir)) {
    foreach ($config_dir as $item) {
        if ($item != '.' && $item !='..' && file_exists('configs/'.$item)) {
            require_once "configs/".$item; //load routes config
        }
    }
}


require_once "core/Route.php"; // load route class
require_once "app/App.php"; // load app


//check config and load database
 if( !empty($config['database'])) {
     $db_config = array_filter($config['database']);

     if(!empty($db_config)) {
         require_once 'core/Connection.php';
         require_once 'core/Database.php';
     }
 }

require_once "core/Model.php"; // load base model
require_once  "core/Controller.php"; //load base controller