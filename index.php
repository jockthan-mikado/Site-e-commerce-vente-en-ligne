<?php include("conn.php"); ?>
<!DOCTYPE HTML>

<html class lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <title>M2GPI2021 – Projet WEB – MIKADO KINSHIERE Jockthan</title>
    <meta name="description" content="Ce site e-commerce est un exercice d'apprentissage" />
    <meta name="keyword" content="site, internet, e-commerce, logiciel, place de marché" />

    <!-- <link rel='stylesheet' href='stylcss' type='text/css' media='all' /> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>

<body>
    <div class="container">
        <?php
        include('header.php');
        ?>

        <div class="row mt-4">
            <div class="col-md-12">
                <div>
                    <span>Home > Design</span><br>
                    <span>
                        <h1>Design</h1>
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3  mt-3 ">
                    <div class="barre_menu" id="menu">
                        <div class="shop" id="shop">
                            <span>
                                <a class="nav-link" href="?category=">
                                    <h4>Shop By</h4>
                                </a>

                            </span>
                        </div>

                        <div id="categories ">
                            <h5 class="categorie border-bottom mt-3 pb-2">
                                <a class="nav-link" href="?category=">CATEGORIES</a>
                            </h5>

                            <div class="category-list">
                                <?php
                                // Récupérer les catégories de la base de données
                                $categories = "SELECT DISTINCT c.`name` FROM `products` p
							JOIN `categories` c ON p.`category_id` = c.`id`";

                                $result_categories = $conn->query($categories);

                                // Vérifier s'il y a des catégories dans la base de données
                                if ($result_categories->num_rows > 0) {
                                    $i = 0;
                                    while ($row_categories = $result_categories->fetch_assoc()) {
                                        $categorieProduit = $row_categories['name'];
                                        $i = $i + 1;
                                ?>

                                        <ul class="category mt-3">
                                            <a class="nav-link mb-3" onclick="toggleCategory('category<?php echo $i; ?>')"><?php echo $categorieProduit; ?></a>
                                            <?php
                                            // Récupérer les sous catégories pour cette catégorie
                                            $sql_type_categorie = "SELECT DISTINCT p.`type_categorie`
																FROM `products` p
																JOIN `categories` c ON p.`category_id` = c.`id`
																WHERE c.`name` = '$categorieProduit'";
                                            $result_type_categorie = $conn->query($sql_type_categorie);
                                            if ($result_type_categorie->num_rows > 0) {
                                            ?>
                                                <ul class="category-content" id="category<?php echo $i; ?>-content">
                                                    <?php
                                                    while ($row_type_categorie = $result_type_categorie->fetch_assoc()) {
                                                        $type_categorie = $row_type_categorie['type_categorie'];
                                                    ?>
                                                        <li><a class="nav-link mb-3" href="?category=<?php echo urlencode($categorieProduit); ?>&type=<?php echo urlencode($type_categorie); ?>"><?php echo $type_categorie ?></a>
                                                        </li>

                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </ul>

                                    <?php }

                                    ?>

                            </div>
                        <?php } ?>
                        </div>
                        <script>
                            function toggleCategory(categoryId) {
                                const contentElement = document.getElementById(categoryId + '-content');
                                contentElement.style.display = contentElement.style.display === 'block' ? 'none' : 'block';
                            }
                        </script>

                        <div class="price border-bottom">
                            <span>
                                <h5 class="font-weight-bold">PRICE</h5>
                            </span>
                        </div>
                        <div class="price-slider ">
                            <input type="range" id="price-slider" min="100" max="10000" step="1" value="30">

                            <div>
                                <span id="min-price">$100</span>
                                <span id="max-price">$10000</span>
                            </div>
                        </div>

                        <div class="color border-bottom" <span>
                            <h5>COLOR</h5></span>
                        </div>
                        <div class="color-palette mt-3">
                            <div class="color-option" style="background-color: #E74C3C;"></div>
                            <div class="color-option" style="background-color: #E67E22;"></div>
                            <div class="color-option" style="background-color: #F1C40F;"></div>
                            <div class="color-option" style="background-color: #1E8449;"></div>
                            <div class="color-option" style="background-color: #52BE80;"></div>
                            <div class="color-option" style="background-color: #A6F5F4;"></div>
                            <div class="color-option" style="background-color: #5AA3F0;"></div>
                            <div class="color-option" style="background-color: #5A6EF0;"></div>
                            <div class="color-option" style="background-color: #6B2197;"></div>
                            <div class="color-option" style="background-color: #8C39B0;"></div>
                            <div class="color-option" style="background-color: #17202A;"></div>
                            <div class="color-option" style="background-color: #FDFEFE;"></div>
                            <div class="color-option" style="background-color: #D32FFF;"></div>
                            <div class="color-option" style="background-color: #76136D;"></div>


                        </div>

                        <div class="brand" id="BRAND" class="mt-3">
                            <span>
                                <h5>BRAND</h5>
                            </span>
                            <div class="checkbox border-top pt-3">
                                <?php
                                function getCountByMarque($marque)
                                {
                                    global $conn;

                                    $query = "SELECT COUNT(*) as total FROM products WHERE marque = '$marque'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);

                                    return $row['total'];
                                }

                                // Récupérer les marques distinctes de la base de données
                                $query = "SELECT DISTINCT marque FROM products";
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $marque = $row['marque'];
                                ?>
                                    <li style="list-style-type: none;">
                                        <input class="form-check-input brand-checkbox" type="checkbox" name="brand" value="<?php echo $marque; ?>">
                                        <?php echo $marque; ?> (<?php echo getCountByMarque($marque); ?>)
                                    </li>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row"><img src="images/banner.png"></div>
                    <div class="row pb-2">
                        <div class="col-6 mt-3  border-bottom">
                            <p><?php $query = "SELECT COUNT(*) as total FROM products";

                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                $total_items = $row['total'];
                                echo $total_items ?> Article(s)</p>
                        </div>
                        <div class="col-md-6 mt-3  border-bottom">
                            <img src="images/img-04.png">
                            <img src="images/img-05.png">
                            <img src="images/img-06.png">
                            <img src="images/img-07.png">
                        </div>

                        <div class="row  pb-2">
                            <?php
                            // Récupération de la catégorie et du type sélectionnés
                            $minValue = isset($_GET['min']) ? $_GET['min'] : '';
                            $maxValue = isset($_GET['max']) ? $_GET['max'] : '';
                            $category = isset($_GET['category']) ? $_GET['category'] : '';
                            $type = isset($_GET['type']) ? $_GET['type'] : '';
                            $selectedBrands = isset($_GET['brands']) ? $_GET['brands'] : '';
                            $selectedColor = isset($_GET['color']) ? $_GET['color'] : '';

                            // // Pagination
                            $items_per_page = 3; // 3 colonnes avec 3 produits par colonne
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start = ($page - 1) * $items_per_page;
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

                            $query .= " LIMIT $start, $items_per_page";
                            $result = mysqli_query($conn, $query);

                            // Génération du HTML pour les produits filtrés
                            $html = '<div   class="row">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                $html .= '
									<div class="col-md-4 mb-4" >
										<div class="product mt-3" >
											<div class="card-body">
												<div class="image-container">
													<img class="card-img-top" width="160px" height="206px" src="' . $row['link'] . '" alt="' . $row['link'] . '">
												</div>
                                                <div class="pt-3">
													<p class="card-text text-center">Article : ' . $row['name'] . '</p>
                                                    <p class="card-text text-center">Description : ' . $row['description'] . '</p>
                                                    <p class="card-text text-center">marque : ' . $row['marque'] . '</p>
                                                    <p class="card-text text-center">Prix : ' . $row['price'] . ' €</p>
                                                </div>
											</div>
											<div class="rating  vignette text-center" style="color: #509FF3; text-align: left; margin-left: 10px;">
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
                            ?>
                            <?php
                            $category = isset($_GET['category']) ? $_GET['category'] : '';
                            $type = isset($_GET['type']) ? $_GET['type'] : '';
                            // Pagination
                            $query = "SELECT COUNT(*) as total FROM products p
									LEFT JOIN pictures pic ON p.id = pic.product_id ";

                            if (!empty($category)) {
                                $query .= " WHERE p.category_id = (SELECT id FROM categories WHERE name =  '$category')";
                            }
                            if (!empty($type)) {
                                $query .= "AND p.type_categorie = '$type'";
                            }
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $total_items = $row['total'];

                            $total_pages = ceil($total_items / $items_per_page);

                            ?>
                            <?php
                            mysqli_close($conn);
                            ?>
                        </div>
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-5 ">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center mt-5">
                    <ul class="pagination">
                        <?php
                        $category = isset($_GET['category']) ? $_GET['category'] : '';
                        $type = isset($_GET['type']) ? $_GET['type'] : '';
                        $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

                        // Afficher les trois premiers chiffres
                        for ($i = 1; $i <= min(3, $total_pages); $i++) {
                        ?>
                            <li><a href="?page=<?php echo $i . '&category=' . $category . '&type=' . $type; ?>" style="text-decoration: none;"><?php echo $i; ?></a>
                            </li>
                        <?php
                        }
                        // Si le nombre total de pages est supérieur à 3, afficher le bouton "Next"
                        if ($total_pages > 3) {
                        ?>
                            <li class="next"><a  href="?page=<?php echo min($total_pages, $current_page + 1) . '&category=' . $category . '&type=' . $type;; ?>" style="text-decoration: none;">Next
                            Page</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
                include('footer.php');
            ?>
        </div>

    </div>
   
    <script type="text/javascript" src="js/index.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>