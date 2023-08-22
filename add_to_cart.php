<?php
session_start();
include("conn.php");

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Vérifier si le produit existe
    $query = "SELECT p.*, pic.link
    FROM products p
    LEFT JOIN pictures pic ON p.id = pic.product_id 
    WHERE p.id = $productId";

    #$query = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $product = mysqli_fetch_assoc($result);

        // Ajouter le produit au panier (utiliser la session)
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Vérifier si le produit est déjà dans le panier
        if (array_key_exists($productId, $_SESSION['cart'])) {
            $_SESSION['cart'][$productId]['quantite']++;
        } else {
            $_SESSION['cart'][$productId] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['link'],
                'quantity' => 1
            ];
        }
        // Retourner le nombre total d'articles dans le panier
        echo count($_SESSION['cart']);
    }
}
?>
