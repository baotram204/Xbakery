<?php

namespace app\controllers\admin;

use core\Controller;

class Home extends Controller
{
    private $model_product =[];
    private $model_cart = [];
    protected array $data=[];

    public function index() {
        $this->data["sub_content"]["information"] = $this->handleRender();
        $this->data['content'] = "\layouts\admin\home";
        $this->data["page_title"] = "Home Admin";
        //render view
        $this->render('\layouts\admin\admin_layout', $this->data);

    }

    public function handleRender() {
        $this->model_product = $this->model('Product');
        $this->model_cart = $this->model('Cart');

        $totalProduct = $this->model_product->countAllProduct();
        $totalOrder = $this->model_cart->countAllOrderProduct();
        $totalMoney = $this->model_cart->totalMoneyOfDelivered();

        return array(
            'product' => $totalProduct,
            'order' => $totalOrder,
            'totalMoney' => $totalMoney
        );
    }
}