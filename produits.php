<?php 
session_start();
include("conn.php");?> 
<!DOCTYPE HTML>

<html class lang="fr-FR">

	<head>
		<meta charset="UTF-8">
		<title>M2GPI2021 – Projet WEB – MIKADO KINSHIERE Jockthan</title>

		<meta name="description"
			content="votre site ou e-commerce sur mesure : conseil, conception, design, réalisation et référencement PRO. Votre catalogue en temps réel sur les places de marché." />
		<meta name="keyword"
			content="site, internet, e-commerce, logiciel, place de marché" />
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<!-- <link rel='stylesheet' href='stylcss' type='text/css' media='all' />
		<script type='text/javascript' src="fonctions.js"></script> -->
		
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
			crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>

	<body>
		<div class="container" id="products_">
			<div class="row">
				<div class="col-md-4">
					Shop by Phone <b>(01) 234 456 SM </b><a href="#"> Live Chat With Us</a>
				</div>
				<div class="col-md-4">
				</div>
				<div class="col-md-4 text-end">
					<span class="dropdown">
						<button class="btn btn dropdown-toggle" type="button"
							data-bs-toggle="dropdown" aria-expanded="false" style ="color: #509FF3;">
							My account
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</span>

					<span class="dropdown"> <a href="cart.php"><button class="btn btn dropdown-toggle   " type="button"
							data-bs-toggle="dropdown" aria-expanded="false" style ="color: #509FF3;">| My cart <span class="cart-items-count" ></span> </button></a></span>
				</div>
			</div>

			<div class="row mt-3 border-bottom pb-4">

				<div class="col-md-3">
				<div class="col-md-3">
					<a href="produits.php"><img src="images/logo.png" /></a>
				</div>
				</div>
				<div class="col-md-6">
					<div id="top">
						<div class="navbar">
							<a class="nav-link active" aria-current="page" href="#">OFFICE</a>
							<a class="nav-link" href="#">MULTIMEDIA</a>
							<a class="nav-link" href="#">DESIGN</a>
							<a class="nav-link disabled">DEVELOPER</a>
							<a class="nav-link disabled">UTILITIES</a>
							<a class="nav-link disabled">GAMES</a>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="input-group">
						<input type="text" class="form-control" id="type-input" list="suggestions">
						<datalist id="suggestions"></datalist>
						<span class="input-group-text" id="basic-addon2"><img src="images\img-02.png" /></span>
					</div>
				</div>
			</div>

			<div class="row mt-4">
				<div class="col-md-12">
					<div>
						<span>Home > Design</span><br>
						<span><h1>Design</h1></span>
					</div>
				</div>
			</div>
				
			<div class="row"   >
				<div class="col-md-3  mt-3 ">
					<div class ="barre_menu" id="menu"> 
						<div  class="shop" id="shop">
							<span><h4>Shop By</h4></span>
						</div>

						<div id="categories ">
							<h5 class="categorie border-bottom mt-3 pb-2"> <a class="nav-link" href="?category=">CATEGORIES</a> </h5>
							
							<div class="category-list">
								<?php
									// Récupérer les catégories de la base de données
									$categories = "SELECT DISTINCT c.`name` FROM `products` p
									JOIN `categories` c ON p.`category_id` = c.`id`";
									
									$result_categories = $conn->query($categories);
									
									// Vérifier s'il y a des catégories dans la base de données
									if ($result_categories->num_rows > 0) {
										$i=0;
										while ($row_categories = $result_categories->fetch_assoc()) {
											$categorieProduit = $row_categories['name'];
											$i= $i+1;		    
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
										<li><a class="nav-link mb-3" href="?category=<?php echo urlencode($categorieProduit); ?>&type=<?php echo urlencode($type_categorie); ?>"><?php echo $type_categorie ?></a></li>
										
										<?php } ?>
									</ul>
									<?php } ?>
								</ul>

								<?php }
									
								?>

							</div>										
							<?php } ?>
						<script>
							function toggleCategory(categoryId) {
								const contentElement = document.getElementById(categoryId + '-content');
								contentElement.style.display = contentElement.style.display === 'block' ? 'none' : 'block';
							}
						</script>
							
						</div>
						
						
						<div class="price border-bottom"<span><h5>PRICE</h5></span></div>
						<div class="price-slider ">
							<input type="range" id="price-slider" min="100" max="10000" step="1" value="50">
						
							<div>
								<span id="min-price">$100</span>
								<span id="max-price">$10000</span>
							</div>
						</div>

						<div class="color border-bottom"><span><h5>COLOR</h5></span></div>
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
							<span><h5>BRAND</h5></span>
							<div class="checkbox border-top pt-3">
								<?php
								function getCountByMarque($marque) {
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
									    <input type="checkbox" name="brand" value="<?php echo $marque; ?>">   
										
										<?php echo $marque; ?> (<?php echo getCountByMarque($marque); ?>)
									</li>
									<?php
								}
								?>
							</div>
						</div>

					</div>
					
				</div>
				<div class="col-md-9" >
					<div class="row"><img src="images/banner.png"></div>
						<div class="row pb-2">
							<div class="col-6 mt-3  border-bottom">
								<p><?php	$query = "SELECT COUNT(*) as total FROM products";
				
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
													<img class="card-img-top" width="100%" height="200" src="' . $row['link'] . '" alt="' . $row['link'] . '">
												</div>
													<p class="card-text">Article: ' . $row['name'] . '</p>
												<p class="card-text">Description: ' . $row['description'] . '</p>
												<p class="card-text">marque: ' . $row['marque'] . '</p>
												<p class="card-text">Prix: ' . $row['price'] . ' €</p>
											</div>
											<div class="rating  vignette" style="color: #509FF3; text-align: left; margin-left: 10px;">
												<span class="star">&#9733;</span>
												<span class="star">&#9733;</span>
												<span class="star">&#9733;</span>
												<span class="star">&#9733;</span>
												<span class="star">&#9734;</span>
											</div>
											<div class="row">
												<div class="col-md-7 text-center mt-3">
													<img src="images/img-11.png" class="add-to-cart" data-product-id="' .$row['id']. '">
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
							<li><a href="?page=<?php echo $i . '&category=' . $category . '&type='.$type ; ?>"><?php echo $i; ?></a></li>
						<?php
						}
						// Si le nombre total de pages est supérieur à 3, afficher le bouton "Next"
						if ($total_pages > 3) {
						?>
							<li class="next"><a href="?page=<?php echo min($total_pages, $current_page + 1) . '&category=' . $category .'&type='.$type ; ; ?>">Next Page</a></li> 
							
						<?php
						}
						?>
					</ul>
				</div>
			</div>


			<div>
				<footer>
					<div class="row ">
						<div class="col-md-3">
							<img src="images/img-14.png">
						</div>
						<div class="col-md-3 ">
							<img src="images/img-15.png">
						</div>
						<div class="col-md-3 ">
							<img src="images/img-16.png">
						</div>
						<div class="col-md-3 ">
							<img src="images/img-17.png">
						</div>
					</div>
					<div class="row">

						<div class="col-md-8">
							<img src="images/img-27.png">
						</div>
					</div>

				</footer>
			</div>
			<div class="row mt-3 border-bottom pb-4">
				<!-- <div class="row " class="bottom-border"> -->
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-3">
							<img src="images/img-19.png" alt>  Facebook
						</div>
						<div class="col-md-3">
							<img src="images/img-20.png" alt>  Twitter
						</div>
						<div class="col-md-3">
							<img src="images/img-21.png" alt>  Youtube 
						</div>
						<div class="col-md-3">
							<img src="images/img-22.png" alt> RSS Feed
						</div>
					</div>

				</div>
				<div class="col-md-4 ">
					<div class="row">
						<div class="col-md-6">
						</div>
						<div class="col-md-6 text-end">
							<img src="images/img-25.png" alt>

							<img src="images/img-26.png" alt>

							<img src="images/img-23.png" alt>

							<img src="images/img-24.png" alt>
						</div>

					</div>
				</div>

			</div>

			<!---->
			<div class="row mt-3 mb-4">
				<div class="col-md-6">
					2013 SoftMarket Mangento Store by emthemes.com
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3 text-end">

					<span class="dropdown">
						EN
					</span>FR ES $ € £
				</div>
			</div>

		</div>
		<script>

			$(document).ready(function() {
				$(".add-to-cart").click(function() {
					var productId = $(this).data("product-id");
					$.ajax({
						type: "POST",
						url: "add_to_cart.php",
						data: { product_id: productId },
						success: function(response) {
							// Mettre à jour le nombre d'articles dans le panier
							$(".cart-items-count").text(response);
						}
					});
				});
			});

			const slider = document.getElementById('price-slider');
			const minPrice = document.getElementById('min-price');
			const maxPrice = document.getElementById('max-price');

			slider.addEventListener('input', updatePrices);

			function updatePrices() {
				const minValue = slider.min;
				const maxValue = slider.max;
				const currentValue = slider.value;

				const priceRange = parseFloat(maxValue) - parseFloat(minValue);
				const priceIncrement = parseFloat(currentValue) / priceRange;

				const minPriceValue = 100;
				const maxPriceValue = 10000;

				const newMinPrice = minPriceValue + (priceIncrement * (maxPriceValue - minPriceValue));
				const newMaxPrice = maxPriceValue;

				minPrice.textContent = `$${newMinPrice}`;
				maxPrice.textContent = `$${newMaxPrice}`;
				const minValeur = `$${newMinPrice}`;
				const maxValeur = `$${newMaxPrice}`;
				
			}


			
			/// Script pour la gestion des cases à cocher (marques)
			const brandCheckboxes = document.querySelectorAll('.checkbox input[type="checkbox"]');
			brandCheckboxes.forEach(checkbox => {
				checkbox.addEventListener('change', function () {
					const selectedBrands = getSelectedBrands();
					const minValue=100;
					const maxValue=1000;
					//const selectedColor = getSelectedColor(); // Obtenez la couleur sélectionnée
					updateFilteredProducts( selectedBrands);
				});
			});
			// Script pour la gestion de la couleur sélectionnée
			const colorOptions = document.querySelectorAll('.color-option');
			colorOptions.forEach(option => {
				option.addEventListener('click', function () {
					const selectedColor = this.style.backgroundColor;
					colorOptions.forEach(opt => opt.classList.remove('selected'));
					this.classList.add('selected');
					const selectedBrands = getSelectedBrands();
					updateFilteredProducts(minValue, maxValue, selectedBrands);
				});
			});

			// Fonction pour obtenir les marques sélectionnées
			function getSelectedBrands() {
				const selectedBrands = Array.from(brandCheckboxes)
					.filter(checkbox => checkbox.checked)
					.map(checkbox => checkbox.value);
				return selectedBrands.join(',');
			}

			// Fonction pour obtenir la couleur sélectionnée
			function getSelectedColor() {
				const selectedColor = Array.from(colorOptions)
					.find(option => option.classList.contains('selected'))
					.style.backgroundColor;
				return selectedColor;
			}
			function getUrlParameter(name) {
				name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
				const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
				const results = regex.exec(window.location.search);
				return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
			}


			// Fonction pour mettre à jour les produits filtrés via AJAX
			function updateFilteredProducts(minValue=100, maxValue=10000, selectedBrands) {
				const category = getUrlParameter('category'); // Récupérez la catégorie depuis l'URL
				const type = getUrlParameter('type'); // Récupérez le type depuis l'URL

				const xhr = new XMLHttpRequest();
				xhr.open('GET', `produits.php?min=${minValue}&max=${maxValue}&category=${category}&type=${type}&brands=${selectedBrands}`, true);

				xhr.onload = function () {
					if (xhr.status === 200) {
						const products_ = document.getElementById('products_');
						products_.innerHTML = xhr.responseText;
					}
				};

				xhr.send();
			}


			document.addEventListener('DOMContentLoaded', function() {
				const imageContainers = document.querySelectorAll('.image-container');

				imageContainers.forEach(function(container) {
					const image = container.querySelector('img');

					container.addEventListener('mouseover', function() {
						image.classList.add('zoom-image');
					});

					container.addEventListener('mouseout', function() {
						image.classList.remove('zoom-image');
					});
				});
			});



			document.addEventListener('DOMContentLoaded', function() {
			const typeInput = document.getElementById('type-input');
			const suggestionsDatalist = document.getElementById('suggestions');

			typeInput.addEventListener('input', function() {
				const userInput = typeInput.value;

				// Envoyer une requête au serveur pour obtenir les suggestions
				fetch('obtenir_suggestions.php') // Le chemin vers votre script PHP
					.then(response => response.json())
					.then(data => {
						const filteredSuggestions = data.filter(suggestion =>
							suggestion.type_categorie.toLowerCase().includes(userInput.toLowerCase()) ||
							suggestion.name.toLowerCase().includes(userInput.toLowerCase())
						);

						// Remplacer le contenu du datalist avec les suggestions filtrées
						suggestionsDatalist.innerHTML = '';
						filteredSuggestions.forEach(suggestion => {
							const option = document.createElement('option');
							option.value = suggestion.type_categorie + '  ' + suggestion.name;
							suggestionsDatalist.appendChild(option);
						});
					})
					.catch(error => {
						console.error('Erreur lors de la récupération des suggestions', error);
					});
			});
		});


		</script>
		

	</body>
</html>