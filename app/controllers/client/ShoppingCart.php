<?php
namespace app\controllers\client;

use core\Controller;

class ShoppingCart extends Controller
{
    private $cart = [];
    private $model_product = [];
    protected array $data = [];

    public function showCart() {
        $informationOfProducts = [];
        $total =0;

        // Lấy dữ liệu sản phẩm từ phiên
        $this->cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        foreach ($this->cart as $index=>$product) {
            $infor = $this->getInforProduct($index, $product["quantity"]);

            //sum price of products
            $total = $total + $infor["total"];

            $informationOfProducts[] =  $infor;
            $informationOfProducts["sum"] = $total;
        }
        $this->data["sub_content"]["products"] =$informationOfProducts;
        $this->data["page_title"] = 'Shopping Cart';
        $this->data['content'] = "\layouts\client\shoppingCart";

        $this->render('\layouts\client\client_layout', $this->data);
    }

    //get information and quantity from productID
    public function getInforProduct($productId, $quantity) {
        //get full data of products from database
        $this->model_product = $this->model('Product');
        $dataProduct = $this->model_product->getListProducts($productId);

        //add fiels quantity and total
        $dataProduct["quantity"] = $quantity;
        $dataProduct["total"] = $quantity * $dataProduct["price"];

        return $dataProduct;
    }
}
