<?php
session_start();
include("conn.php");

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];
    if ($newQuantity >= 1) {
        $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $totalPrice += $subtotal;
        }
        $responseData = array(
            'totalPrice' => $totalPrice,
            
        );
        echo json_encode($responseData);
    }
}
?>
