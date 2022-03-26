<?php
include("../Database/auth.php");

require('../Database/database.php');
?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Product</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <nav class="navbar navbar-light navbar-expand bg-light justify-content-center rounded-3">
                            <div class="container">
                                <ul class="navbar-nav nav-justified w-100 text-center mt-1">
                                    <li class="nav-item">
                                        <a href="browse.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-house-door-fill"><br>Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cart.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-cart-fill"><br>Cart</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="order.details.from.php" class="nav-link active d-flex flex-column" data-toggle="collapse">
                                            <span class="bi bi-bell-fill"><br>Order</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="settings.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-gear-fill"><br>Settings</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../Database/logout.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-box-arrow-right"><br>Logout</span>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                        <?php

$id = $_GET['id'];
$query = 'SELECT * FROM product
 WHERE
 product_id ='.$_GET['id'];
$result = mysqli_query($con, $query) or die(mysqli_error($con));
 while($row = mysqli_fetch_array($result))
 {   
   $a= $row['product_id'];
   $b= $row['pname'];
   $c = $row['ptype'];
   $d= $row['pprice'];
   $e= $row['pstock'];
   $f = $row['pimage'];
   $g = $row['seller_id'];
 }
 
?>
                        <p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Product View</p>
                        <form class="mx-1 mx-md-4" action="addcart.data.php" method="POST">
                        <section style="background-color: #eee;">
                            <div class="container py-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 col-lg-6 col-xl-4">
                                        <div class="card text-black">
                                            <img src='data:image;base64,<?php echo base64_encode( $f )?>'
                                                class="card-img-top" alt="Product" />
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <h5 class="card-title"><?php echo $b;?></h5>
                                                </div>
                                                <div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>Product type:</span><span><?php echo $c;?></span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>Product stock:</span><span><?php echo $e;?></span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                                    <span>Price</span><span>₱<?php echo $d;?></span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                        <span><a href="seller_page.php?id= <?php echo $g;?> ">View Seller</a></span>
                                                    </div>
                                                <form class="mx-1 mx-md-4" action="addcart.data.php" method="POST">
                                                <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                                <span>Quantity:</span><span><input type="number" name="pquant" min="1" max="<?php echo $e;?>" required></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                        <input type="hidden" name="product_id" value="<?php echo $a;?>">
                                        <input type="hidden" name="pname" value="<?php echo $b;?>">
                                        <input type="hidden" name="pprice" value="<?php echo $d;?>">
                                        <input type="hidden" name="seller_id" value="<?php echo $g;?>">
                                        <div class="py-3 pb-4 border-bottom text-center">
                                            <button type="submit" name="submit"
                                                class="btn btn-success btn-block text-uppercase">ADD
                                                TO CART</button>

                                        </div>
                                </div>
                            </div>
                    </div>
                </div>


                </form>
    </section>


    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
</body>

</html>