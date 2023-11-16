<?php

namespace app\controllers\client;

use core\Controller;

class Menu extends Controller
{
    private $model_category;
    private $model_product;

    protected array $data = [];

    public function  index() {

    }

    public function category($categoryID) {
        $this->model_category = $this->model('Category');
        $this->model_product = $this->model('Product');

        $dataCategories = $this->model_category->getListCategories();


        $this->data["sub_content"]["categories"] =$dataCategories;
        $this->data["sub_content"]["categoryID"] =$dataCategories;
        $this->data["page_title"] = 'Menu';
        $this->data['content'] = "\layouts\client\menu";

        //get products of categoryID
        $this->showProducts($categoryID);

        //render full categories
        $this->render('\layouts\client\client_layout', $this->data);
    }


    public function showProducts($categoryID) {

        //get full data of products from database
        $dataProducts = $this->model_product->getListProducts();
        $dataCategories = $this->model_category->getListCategories();

        $nameCategory = '';

        foreach ($dataCategories as $data) {
            if($categoryID == $data['id']) {
                $nameCategory = $data['title'];
                break;
            }
        }

        //get product with of category
        $array = [];
        foreach ($dataProducts as $product) {
            $categoryIdOfProduct = $product["category_id"];

            if ($categoryID == $categoryIdOfProduct) {
                $id = $product["id"];
                $title = $product["title"];
                $description = $product["description"];
                $price = $product["price"];
                $image_name = $product["image_name"];

                $array[] = [
                    'id' => $id,
                    'title' => $title,
                    'description' => $description,
                    'price' => $price,
                    'image_name' => $image_name,
                    'name_category' => $nameCategory
                ];

            }
        }

        //get title of category from id's product
        $dataCategories = $this->model_category->getListCategories();
        $titleCategory = '';
        foreach ($dataCategories as $category) {
            $id = $category['id'];
            if($categoryID == $id) {
                $title = $category['title'];
                $titleCategory = $title;
            }
        }




        $this->data["sub_content"]["products"] = $array;
        $this->data["sub_content"]["categoryID"] = $categoryID;
        $this->data["sub_content"]["titleCategory"] = $titleCategory;

        $this->render('\layouts\client\client_layout', $this->data);


    }


}