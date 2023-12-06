<?php

namespace app\controllers\client;

use core\Controller;

class Contact extends Controller
{
    protected array $data=[];

    public function index() {

        $this->data["sub_content"]["gallery_product"] = '';
        $this->data['content'] = "\layouts\client\contact";
        $this->data['page_title'] = "Contact";
        //render view
        $this->render('\layouts\client\client_layout', $this->data);
    }
}