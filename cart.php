<?php
session_start();
include("conn.php"); ?>
<!DOCTYPE HTML>

<html class lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <title>M2GPI2021 – Projet WEB – MIKADO KINSHIERE Jockthan</title>

    <meta name="description" content="votre site ou e-commerce sur mesure : conseil, conception, design, réalisation et référencement PRO. Votre catalogue en temps réel sur les places de marché." />
    <meta name="keyword" content="site, internet, e-commerce, logiciel, place de marché" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <link rel='stylesheet' href='stylcss' type='text/css' media='all' />
		<script type='text/javascript' src="fonctions.js"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                Shop by Phone <b>(01) 234 456 SM </b><a href="#"> Live Chat With Us</a>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-end">
                <span class="dropdown">
                    <button class="btn btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #509FF3;">
                        My account
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </span>

                <span class="dropdown"> <a href="cart.php"><button class="btn btn dropdown-toggle   " type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #509FF3;">| My cart <span class="cart-items-count"></span> </button></a></span>
            </div>
        </div>

        <div class="row mt-3 border-bottom pb-4">

            <div class="col-md-3">
                <a href="index.php"><img src="images/logo.png" /></a>
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
                    <input type="text" class="form-control">
                    <span class="input-group-text" id="basic-addon2"><img src="images\img-02.png" /></span>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div>
                    <span>Home > Shoping Cart</span><br>
                    <span>
                        <font face="arial">
                            <h1>Shoping Cart</h1>
                        </font>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="background-color:#B4FEAE; border-radius: 5px; margin-left : 1%; width : 98%">
                    <span class="checked">&#128504;</span><span class="added">
                        <font face="arial">Consecteture Adipisicing 331 AA has been successfully added to your shopping
                            cart. </font>
                    </span>
                </div>

            </div>
            <div class="row mt-4">
                <div class="col-md-12" style="font-family:arial;">

                    <table>
                        <tr>
                            <th>Item Names</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                        <?php
                        $totalPrice = 0;

                        foreach ($_SESSION['cart'] as $productId => $item) {
                            $subtotal = $item['price'] * $item['quantity'];
                            $totalPrice += $subtotal;

                        ?>
                            <tr>
                                <td>
                                    <img class="card-img-top" width="20px" height="210px" src="<?php echo $item['image']; ?>" alt="<?php $item['image']; ?>">
                                </td>
                                <td><?php echo $item['price']; ?></td>
                                <td>
                                    <input type="number" class="quantity-input" width="35px" value="<?php echo $item['quantity']; ?>" data-product-id="<?php echo $productId; ?>" min="1">
                                </td>
                                <td class="subtotal"><?php echo $subtotal; ?></td>
                                <td><a class="remove-from-cart" data-product-id="<?php echo $productId; ?>"><img src="images/cart-02.png"></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <span Class="shipping mt-3"> Estimate Shipping and Tax</span><br><br>
                    <span>Enter your destination to get a shipping Estimate.</span>
                    <div class="formulaire mt-2">
                        <label for="Country" class="form-label">Country *</label>
                        <input type="text" class="form-control" id="Country" required>
                    </div>
                    <div class="formulaire mt-2">
                        <label for="Province" class="form-label">State/Province *</label>
                        <input type="text" class="form-control" id="Province" required>

                    </div>
                    <div class="formulaire mt-2">
                        <label for="Postal_Code" class="form-label">Zip/Postal Code *</label>
                        <input type="text" class="form-control" id=Postal_Code" required>
                    </div>
                    <div class="mt-3">
                        <img src="images/cart-05.png" alt="Cart05">
                    </div>
                </div>
                <div class="col-md-4">
                    <span Class="discount mt-3"> Discount Coupon</span><br><br>
                    <span>Enter Coupon Code below if you have one.</span>
                    <div class="formulaire mt-2">
                        <label for="Coupon" class="form-label">Get a Coupon Discount here</label>
                        <input type="text" class="form-control" id="Coupon">
                    </div>

                    <div class="mt-3">
                        <img src="images/cart-04.png" alt="Cart04">
                    </div>
                </div>
                <div class="col-md-4">
                    <span Class="total mt-3"> Order Total</span>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <span>Sub Total</span>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <b><?php echo "$" . $totalPrice; ?></b>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-4">
                            <span>Grand Total</span>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <b style="font-size:30px; font-family:arial;"><?php echo "$" . $totalPrice; ?></b>
                        </div>
                    </div>

                    <div class="mt-3">
                        <img src="images/cart-03.png" alt="Cart03">
                    </div>
                </div>
            </div>




            <div>
                <footer>

                    <div class="row mt-4">
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
                            <img src="images/img-19.png" alt> Facebook
                        </div>
                        <div class="col-md-3">
                            <img src="images/img-20.png" alt> Twitter
                        </div>
                        <div class="col-md-3">
                            <img src="images/img-21.png" alt> Youtube
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
                $(".remove-from-cart").click(function() {
                    var productId = $(this).data("product-id");
                    var rowToRemove = $(this).closest("tr"); // Obtenez la ligne du tableau à supprimer

                    $.ajax({
                        type: "POST",
                        url: "suppression_panier.php", // Remplacez par l'URL de votre script PHP
                        data: {
                            product_id: productId
                        },
                        success: function(response) {
                            // En supposant que votre script PHP renvoie du JSON avec le prix total mis à jour
                            var responseData = JSON.parse(response);
                            var updatedTotal = responseData.totalPrice;

                            // Mettez à jour le prix total dans la balise <b>
                            $("div b").text("$" + updatedTotal);

                            // Supprimez la ligne du tableau correspondante
                            rowToRemove.remove();
                        }
                    });
                });
            });




            $(document).ready(function() {
                $(".quantity-input").change(function() {
                    var productId = $(this).data("product-id");
                    var newQuantity = $(this).val();
                    var row = $(this).closest("tr");
                    var price = parseFloat(row.find("td:nth-child(2)").text());

                    $.ajax({
                        type: "POST",
                        url: "quantite_modifier.php", // Remplacez par l'URL de votre script PHP de mise à jour de la quantité
                        data: {
                            product_id: productId,
                            quantity: newQuantity
                        },
                        success: function(response) {
                            var responseData = JSON.parse(response);
                            var updatedSubtotal = price * newQuantity;
                            var updatedTotal = responseData.totalPrice;

                            row.find(".subtotal").text(updatedSubtotal);
                            $("div b").text("$" + updatedTotal);

                        }
                    });
                });

                // Reste du code pour la suppression...
            });
        </script>


</body>

</html>