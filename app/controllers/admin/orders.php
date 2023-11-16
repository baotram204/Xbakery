<?php

namespace app\controllers\admin;

use core\Controller;

class orders extends Controller
{
    private $model_cart;
    private $model_customer;
    private $model_orderProduct;
    private $model_product;
    private $model_payment;

    public function  index() {
        $this->model_cart = $this->model('Cart');
        $this->model_customer = $this->model('Customer');
        $this->model_orderProduct = $this->model('OrderProducts');
        $this->model_product = $this->model('Product');
        $this->model_payment = $this->model('Payment');



//        $this->handleDataRender();

        $this->data['content'] = "\layouts\admin\order";
        $this->data["sub_content"]["customerOrderInfors"] = $this->handleDataRender();
        $this->data["page_title"] = "Orders";

        if (isset($_POST['update']) && $_POST['update'] == 'Update') {
            // when btn update pressed
            if (isset($_POST['category']) && isset($_POST['product-id'])) {
                $category = $_POST['category'];
                $productId = $_POST['product-id'];

                $this->updateOrders($category, $productId);
            }
        } elseif (isset($_POST['delete']) && $_POST['delete'] == 'Delete') {
            // when btn delete pressed
            if (isset($_POST['product-id'])) {
                $productId = $_POST['product-id'];

                echo $productId;

                $this->deleteOrder($productId);
            }
        }


        //render view
        $this->render('\layouts\admin\admin_layout', $this->data);
    }

    public function getAllOrder() {
        $data = $this->model_cart->getAllOrder();
        return $data;
    }

    public function getAllProductOfOrder() {
        $data = $this->model_orderProduct->getAllProduct();
        return $data;
    }

    public function getPayment() {
        $data = $this->model_payment->getPayment();
        return $data;
    }

    public function handleDataRender() {
        $orders = $this->getAllOrder();
        $productsOrders = $this->getAllProductOfOrder();
        $paymentData = $this->getPayment();

        $tempProducts = [];
        foreach ($productsOrders as $product) {
            $tempProducts[$product['cart_id']][] = $product;
        }

        $combinedArray = [];
        foreach ($orders as $order) {
            $customer_id = $order['customer_id'];
            $orderId = $order['id'];
            $customer = $this->model_customer->getCustomer($customer_id);
            $order['customer'] = $customer;

            $products = [];
            if (array_key_exists($orderId, $tempProducts)) {
                $cartProducts = $tempProducts[$orderId];
                foreach ($cartProducts as $cartProduct) {
                    $productInfo = $this->model_product->getListProducts($cartProduct['item_id']);

                    $products[] = array("name" => $productInfo["title"],"quantity" => $cartProduct['quantity']);
                }
            }

            foreach ($paymentData as $payment) {
                if ($order['payment_id'] === $payment['payment_id']) {
                    if ($payment['cash'] === 1) {
                        $order['payment'] = 'payment';
                    } else if ($payment['cash'] === 0) {
                        $order['payment'] = 'cash';
                    }
                    break;
                }
            }
            $order['products'] = $products;
            $combinedArray[] = $order;
        }

        return $combinedArray;
    }

    public function deleteOrder($id){
        $dataCart = $this->model_cart->getOrder($id);
        $customer_id = $dataCart['customer_id'];
        $payment_id = $dataCart['payment_id'];


        $deleteCustomer = $this->model_customer->deleteCustomer($customer_id);
        $deletePayment = $this->model_payment->deletePayment($payment_id);
        $deleteOrderItem = $this->model_orderProduct->deleteOrderItemFromCartId($id);

        $dataOrder = $this->model_cart->deleteCart($id);
        if ($dataOrder && $deleteCustomer && $deletePayment && $deleteOrderItem) {
            $_SESSION['delete_order_success'] = "Delete order successful.";
            header('Location: '._WEB_ROOT.'/admin/orders');
            exit;
        } else {
            $_SESSION['delete_order_fail'] = "Delete order fail.";
            header('Location: '._WEB_ROOT.'/admin/orders');
            exit;
        }
    }

    public function updateOrders($category, $id) {
        $infor = array(
            'status' => $category
        );
        $condition = "cart_id='$id'";
        $dataOrder = $this->model_cart->updateOrder($infor, $condition);
        if ($dataOrder) {
            $_SESSION['update_order_success'] = "Update order successful.";
            header('Location: '._WEB_ROOT.'/admin/orders');
            exit;
        } else {
            $_SESSION['update_order_fail'] = "Update order fail.";
            header('Location: '._WEB_ROOT.'/admin/orders');
            exit;
        }
    }


}