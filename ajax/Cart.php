<?php
// xử lí trên cart bằng session
session_start();

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
        if ( $data->status == "update") {
            // weather product exit in cart
            if (array_key_exists($productId, $cart)) {
                $cart[$productId]['quantity'] = $quantity;
            } else {
                $cart[$productId] = ['quantity' => $quantity];
            }

        } else if($data->status == "add") {
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
