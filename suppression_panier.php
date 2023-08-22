<?php
session_start();
include("conn.php");

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    
    // Supprimez le produit du panier
    unset($_SESSION['cart'][$productId]);
    
    // Recalculez le prix total
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $totalPrice += $subtotal;
    }
    
    // Préparez les données de la réponse
    $responseData = array(
        'totalPrice' => $totalPrice,
    );
    
    // Renvoyez la réponse au format JSON
    echo json_encode($responseData);
}
?>
