<?php

namespace app\controllers\admin;

use core\Controller;

class Home extends Controller
{
    private $model_home;
    protected array $data=[];

    public function index() {
        $this->data["sub_content"][""] = '';
        $this->data['content'] = "\layouts\admin\home";
        $this->data["page_title"] = "Home Admin";
        //render view
        $this->render('\layouts\admin\admin_layout', $this->data);

    }
}