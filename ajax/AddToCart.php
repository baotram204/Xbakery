<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $productId = $data->productId;
    $quantity = $data->quantity;


    $cart = $_SESSION['cart'];

    // weather  product exit in cart
    if (array_key_exists($productId, $cart)) {
        $cart[$productId]['quantity'] += $quantity;
    } else {
        $cart[$productId] = ['quantity' => $quantity];
    }

    $_SESSION['cart'] = $cart;


    $response = ['status' => 'success', 'message' => 'Product added successfully'];
    echo json_encode($response);

} else {
    $response = ['status' => 'error', 'message' => 'Invalid request method.'];
    echo json_encode($response);
}
