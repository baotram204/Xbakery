<?php

namespace app\controllers\client;


use core\Controller;

class DetailProduct extends Controller
{
    public $model_product;
    public $model_category;

    private $data = [];

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            if ($data) {
                $productId = $data->productId;
                $response = ['status' => 'success', 'message' => 'add product successfully', 'productId'=>$productId];
                echo json_encode($response);
            } else {
                // Xử lý khi dữ liệu không hợp lệ
                $response = ['status' => 'error', 'message' => 'Invalid data.'];
                echo json_encode($response);
            }


        } else {
            $response = ['status' => 'error', 'message' => 'Invalid request method.'];
            echo json_encode($response);
        }
    }

    public function showProduct($productID = null){
        if($productID == null) {
            $this->data["sub_content"]["idProduct"] = null;
        } else {
            if(isset($_GET['searchTerm'])) {
                $searchTerm = $_GET['searchTerm'];
                $similarProduct = $this->similarProduct($searchTerm);
                $this->data["sub_content"]["similarProduct"] =$similarProduct;
                $this->data["sub_content"]["is_similarProduct"] = true;
            } else {
                $this->data["sub_content"]["is_similarProduct"] = false;
            }


            $this->model_product = $this->model('Product');
            $dataProducts = $this->model_product->getListProducts($productID);


            $this->model_category = $this->model('Category');
            $dataCategories = $this->model_category->getListCategories();


            $this->data["sub_content"]["categories"] =$dataCategories;
            $this->data["sub_content"]["categoryID"] =$dataCategories;

            $this->data["sub_content"]["idProduct"] = $productID;
            $this->data["sub_content"]["product"] = $dataProducts;
        }

        $this->data["page_title"] = 'Detail Product';
        $this->data['content'] = "/layouts/client/detailProduct";
        $this->render('/layouts/client/client_layout', $this->data);
    }

    public function similarProduct($text) {
        $this->model_product = $this->model("Product");

        $searchTerms = preg_split('/[,\s]+/', $text);

        $sqlConditions = [];
        foreach ($searchTerms as $term) {
            $sqlConditions[] = "(title LIKE '%$term%' OR description LIKE '%$term%' OR ingredients LIKE '%$term%')";
        }

        $condition = implode(' OR ', $sqlConditions);
        $condition .= ' LIMIT 18446744073709551615 OFFSET 1';

        $data = $this->model_product->getListProducts($condition);
        return $data;
    }
}