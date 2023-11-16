<?php

namespace app\controllers\client;

use core\Controller;

class Search extends Controller
{
    private $model_product = [];
    public function index() {

    }

    public function showProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $searchTerm = $_GET['searchTerm'];

            if ($searchTerm) {
                $data = $this->getSemiInformation($searchTerm);

                $response = ['status' => 'success', 'message' => 'Search product successfully', 'arrayData' => $data ];
                echo json_encode($response);
            } else {
                $response = ['status' => 'error', 'message' => 'Invalid data.'];
                echo json_encode($response);
            }

        } else {
            $response = ['status' => 'error', 'message' => 'Invalid request method.'];
            echo json_encode($response);
        }
    }

    public function getSemiInformation($text) {
        $this->model_product = $this->model("Product");
        $condition = "( title LIKE '%$text%' OR description LIKE '%$text%' OR ingredients LIKE '%$text%') LIMIT 1";
        $data = $this->model_product->getListProducts($condition);
        if(empty($data)) {
            return -1;
        }
        return $data;
    }
}