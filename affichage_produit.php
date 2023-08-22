<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "username", "password", "dbname");

// Vérifiez la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Récupération de la catégorie et du type sélectionnés
$minValue = isset($_GET['min']) ? $_GET['min'] : '';
$maxValue = isset($_GET['max']) ? $_GET['max'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';
$selectedBrands = isset($_GET['brands']) ? $_GET['brands'] : '';
$selectedColor = isset($_GET['color']) ? $_GET['color'] : '';

// Construction de la requête SQL pour récupérer les produits filtrés
$query = "SELECT p.*, pic.link
          FROM products p
          LEFT JOIN pictures pic ON p.id = pic.product_id ";
          

$whereClauses = array();

if (!empty($category)) {
    $whereClauses[] = "p.category_id = (SELECT id FROM categories WHERE name = '$category')";
}

if (!empty($type)) {
    $whereClauses[] = "p.type_categorie = '$type'";
}

if (!empty($minValue) && !empty($maxValue)) {
    $whereClauses[] = "p.price BETWEEN '$minValue' AND '$maxValue'";
}

if (!empty($selectedBrands)) {
    $brands = explode(',', $selectedBrands);
    $brandConditions = array();
    foreach ($brands as $brand) {
        $brandConditions[] = "p.marque = '$brand'";
    }
    $whereClauses[] = "(" . implode(" OR ", $brandConditions) . ")";
}

if (!empty($selectedColor)) {
    $whereClauses[] = "p.color = '$selectedColor'";
}

if (!empty($whereClauses)) {
    $query .= " WHERE " . implode(" AND ", $whereClauses);
}
          

$result = mysqli_query($conn, $query);

// Génération du HTML pour les produits filtrés
$html = '<div id="products-container" class="row">';
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '
    <div class="col-md-4 mb-4">
        <div class="product card">
            <div class="card-body">
                <img class="card-img-top" width="100%" height="200" src="' . $row['link'] . '" alt="' . $row['link'] . '">
                <p class="card-text">Article: ' . $row['name'] . '</p>
                <p class="card-text">Description: ' . $row['description'] . '</p>
                <p class="card-text">marque: ' . $row['marque'] . '</p>
                <p class="card-text">Prix: ' . $row['price'] . ' €</p>
            </div>
            <div class="rating" style="color: #509FF3; text-align: left; margin-left: 10px;">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9734;</span>
            </div>
            <div class="row">
                <div class="col-md-7 text-center mt-3">
                    <img src="images/img-11.png" class="add-to-cart" data-product-id="' . $row['id'] . '">
                </div>
                <div class="col-md-5 text-center mt-3">
                    <img src="images/img-12.png">
                    <img src="images/img-13.png">
                </div>
            </div>
        </div>
    </div>';
}
$html .= '</div>'; // Fermeture du conteneur
echo $html;

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
