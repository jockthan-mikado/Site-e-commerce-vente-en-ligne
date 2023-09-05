<?php
session_start();
include("conn.php"); ?>
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
            <form action="">
                <div class="row mt-4">
                    <div class="col-md-4">
                        
                        <div class="form-group">
                            <input type="text" class="form-control p-3" placeholder="Estimate shipping & Tax" disabled>
                        </div>
                        <label for="country">Enter your destination to get a shipping estimate.</label>
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
                        <div class="form-group">
                            <input type="text" class="form-control p-3" placeholder="Order Total" disabled>
                        </div>
                        <label for="coupon">Enter coupon code below if you have one.</label>
                        <div class="formulaire mt-2">
                            <label for="Coupon" class="form-label">Get a Coupon Discount here</label>
                            <input type="text" class="form-control" id="Coupon">
                        </div>

                        <div class="mt-3">
                            <img src="images/cart-04.png" alt="Cart04">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control p-3" placeholder="Order Total" disabled>
                        </div>
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
            </form>

            <?php
                include('footer.php');
            ?>
            
        </div>
       <!-- Inclure la version complète de jQuery en premier -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <!-- Inclure les autres scripts -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Inclure votre fichier JavaScript -->
    <script type="text/javascript" src="js/index.js" defer></script>
        
    
</body>

</html>