<?php
namespace app\controllers\client;

use core\Controller;

class ShoppingCart extends Controller
{
    private $cart = [];
    private $model_product = [];
    private $model_user = [];
    private $model_cart = [];
    private $model_payment = [];
    private $model_orderProducts = [];
    protected array $data = [];

    public function index() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            $productId = $data->productId;

            $cart = $_SESSION['cart'];

            if ($data->status == "delete") {
                $productId = (int)$productId; // Đảm bảo rằng $productId là một số nguyên

                if (array_key_exists($productId, $cart)) {
                    unset($cart[$productId]);
                } else {
                    $response = ['status' => 'error', 'message' => 'Product not found in cart.'];
                    echo json_encode($response);
                    exit;
                }
            } else {
                $quantity = $data->quantity;
                // weather check change all quantity or add quantity card
                if ($data->status == "update") {
                    // weather product exit in cart
                    if (array_key_exists($productId, $cart)) {
                        $cart[$productId]['quantity'] = $quantity;
                    } else {
                        $cart[$productId] = ['quantity' => $quantity];
                    }

                } else if ($data->status == "add") {
                    // weather product exit in cart
                    if (array_key_exists($productId, $cart)) {
                        $cart[$productId]['quantity'] += $quantity;
                    } else {
                        $cart[$productId] = ['quantity' => $quantity];
                    }
                }
            }

            $_SESSION['cart'] = $cart;

            $response = ['status' => 'success', 'message' => 'Successfully'];
            echo json_encode($response);

        } else {
            $response = ['status' => 'error', 'message' => 'Invalid request method.'];
            echo json_encode($response);
        }

    }

    public function showCart() {
        $informationOfProducts = [];
        $total =0;

        // get data from session of ajax
        $this->cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        var_dump($_SESSION['cart']);


        foreach ($this->cart as $index=>$product) {
            $infor = $this->getInforProduct($index, $product["quantity"]);

            //sum price of products
            $total = $total + $infor["total"];

            $informationOfProducts[] =  $infor;
            $informationOfProducts["sum"] = $total;
        }
        $this->data["sub_content"]["products"] =$informationOfProducts;
        $this->data["page_title"] = 'Shopping Cart';
        $this->data['content'] = "/layouts/client/shoppingCart";

        $this->render('/layouts/client/client_layout', $this->data);
    }

    //get information and quantity from productID
    public function getInforProduct($productId, $quantity='') {
        //get full data of products from database
        $this->model_product = $this->model('Product');
        $dataProduct = $this->model_product->getListProducts($productId);

        //add fiels quantity and total
        $dataProduct["quantity"] = ($quantity != '')? $quantity: 0;
        $dataProduct["total"] = $quantity * $dataProduct["price"];

        return $dataProduct;
    }

    public function pushData() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            if ($data) {
                //push data on database
                $this->pushUser($data);
                $this->pushInformationPayment($data);
                $this->pushInformationCart($data);
                $this->pushProducts($data);

                $response = ['status' => 'success', 'message' => 'purchase product successfully'];
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

    public function pushUser($data) {
        //get infor from js
        $inforUser = $data->informationOrder[0]->inforUser;
        $formattedDeliveryTime = $data->informationOrder[0]->inforUser->delivery;
        $pattern = '/(\d{2}):(\d{2})/';
        preg_match($pattern, $formattedDeliveryTime, $matches);

        if (count($matches) >= 3) {
            $hours = $matches[1];
            $minutes = $matches[2];

            $date = new \DateTime();
            $date->setTime($hours, $minutes);

            $formattedTime = $date->format('H:i');
        }

        $inforUser->delivery = $formattedTime;

        // push data on database
        $this->model_user = $this->model('Customer');
        $data = $this->model_user->pushUserData($inforUser);
    }

    public function pushProducts($data){
        $currentCartId = $this->model_cart->getLastIdCart();

        //get id of products from js
        $products = $data->informationOrder[0]->orderArrayProduct;

        foreach ($products as $product) {
            $id = $product->productId;
            $quantity = $product->quantity;

            $this->model_orderProducts = $this->model('OrderProducts');

            $dataToInsert = array(
                'item_id' => $id,
                'quantity'=> $quantity,
                'cart_id' => $currentCartId
            );
            $load = $this->model_orderProducts->pushIdProduct($dataToInsert);
        }
    }

    public function pushInformationPayment($data){
        $cardNumber =  $data->informationOrder[0]->payment->card_number;
        $cardFullName = $data->informationOrder[0]->payment->card_fullname;
        $birthday = $data->informationOrder[0]->payment->birthday;
        $totalMoney = $data->informationOrder[0]->payment->total_money;
        $cash = 0;
        if ($cardNumber!='' && $cardFullName != '' && $birthday != '') {
            $cash = 1;
        }

        $dataToInsert = array(
            'cash' => $cash,
            'card_number' => $cardNumber,
            'card_fullname' => $cardFullName,
            'birthday' => $birthday,
            'total_money' => $totalMoney,
            'status' => 1
        );

        $this->model_payment = $this->model('Payment');
        $load = $this->model_payment->pushPayment($dataToInsert);
    }

    public function pushInformationCart($data){
        $currentCustomerId = $this->model_user->getLastIdCustomer();
        $currentPaymentId = $this->model_payment->getLastIdPayment();


        $products = $data->informationOrder[0]->orderArrayProduct;
        $quantity = 0;
        foreach ($products as $product) {
            $quantity += $product->quantity;
        }

        $total = $data->informationOrder[0]->payment->total_money;

        $dataToInsert = array(
            'customer_id' => $currentCustomerId,
            'quantity' => $quantity,
            'total_money' => $total,
            'payment_id' =>$currentPaymentId,
            'status' => 'pending'
        );
        $this->model_cart = $this->model('Cart');
        $load = $this->model_cart->pushCart($dataToInsert);
    }
}
