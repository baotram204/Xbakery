<?php

namespace app\controllers\client;

use core\Controller;

class About extends Controller
{
    private $model_about;
    protected array $data=[];

    public function __construct(){
        //connect model About
        $this->model_about = '';
        $this->data["sub_content"]["gallery_product"] = $this->model_about;
        $this->data["page_title"] = "About";
        $this->data['content'] = "\layouts\client\about";
    }

    public function  index() {
        $this->render('\layouts\client\client_layout', $this->data);
    }

}