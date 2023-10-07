<?php

namespace app\controllers\client;


use core\Controller;

class DetailProduct extends Controller
{
    public $model_product;
    public $model_category;

    public function showProduct($productID = null){
        $this->model_product = $this->model('Product');
        $dataProducts = $this->model_product->getListProducts($productID);


        $this->model_category = $this->model('Category');
        $dataCategories = $this->model_category->getListCategories();

        $this->data["sub_content"]["categories"] =$dataCategories;
        $this->data["sub_content"]["categoryID"] =$dataCategories;

        $this->data["sub_content"]["product"] = $dataProducts;
        $this->data["page_title"] = 'Detail Product';
        $this->data['content'] = "\layouts\client\detailProduct";
        $this->render('\layouts\client\client_layout', $this->data);
    }
}