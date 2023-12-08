<?php
namespace core;

class Controller
{
    public function model($model) {
        if (file_exists(_DIR_ROOT.'/app/models/'.$model.'.php')) {
            $class = "app\models\\$model";
            require_once _DIR_ROOT.'/app/models/'.$model.'.php';

            if (class_exists($class)) {
                return new $class();
            }
        }
            return null;

    }

    public  function  render($view, $data=[]) {
        extract($data);
        if(file_exists(_DIR_ROOT.'/app/views'.$view.'.php')) {
            require_once _DIR_ROOT.'/app/views'.$view.'.php';
        }
    }
}

