<?php
// Inclure la connexion à la base de données
include 'conn.php';

$suggestions = array();

// Récupérer les suggestions depuis la table categories
// $queryCategories = "SELECT id, name FROM categories";
$queryCategories = "SELECT c.name , p.type_categorie 
FROM products p
JOIN categories c ON p.category_id = c.id";
$resultCategories = mysqli_query($conn, $queryCategories);
while ($row = mysqli_fetch_assoc($resultCategories)) {
    $suggestions[] = array(
        'type_categorie' => $row['type_categorie'],
        'name' => $row['name']
    );
}


// Supprimer les doublons et renvoyer les suggestions au format JSON
$suggestions = array_values(array_unique($suggestions, SORT_REGULAR)); // Assurez-vous que les indices du tableau sont réinitialisés
echo json_encode($suggestions);
?>
