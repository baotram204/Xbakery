<?php

namespace app\controllers\admin;

use core\Controller;

class orders extends Controller
{
    private $model_category;
    private $model_product;

    public function  index() {
        $this->model_category = $this->model('Category');
        $dataCategories = $this->model_category->getListCategories();

        $this->data['content'] = "\layouts\admin\order";
        $this->data["sub_content"]["categories"] =$dataCategories;
        $this->data["page_title"] = "Orders";

        if (isset($_POST['update'])) {
            $this->updateOrder();
        }elseif (isset($_POST['delete'])){

        }

        //render view
        $this->render('\layouts\admin\admin_layout', $this->data);
    }

    public function updateOrder() {
    }

    public function getInforCategory() {
        //get information of categories


    }

}