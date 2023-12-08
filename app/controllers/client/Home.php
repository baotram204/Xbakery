<?php

namespace app\controllers\client;

use core\Controller;

class Home extends Controller
{
    private $model_home;
    protected array $data=[];
    public function index() {
        $this->model_home = $this->model('Home');
        $dataHome = $this->model_home->getList();


        $this->data["sub_content"]["gallery_product"] = $dataHome;
        $this->data['content'] = "/layouts/client/home";
        //render view
        $this->render('/layouts/client/client_layout', $this->data);
    }

    public function getQuantityOfProduct(){

    }

}