<?php

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
