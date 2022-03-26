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
        
   ?>


<p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Product View</p>
                        <section style="background-color: #eee;">
                            <div class="container py-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 col-lg-6 col-xl-4">
                                        
                                        <div class="card text-black">
                                            
                                            <img src='data:image;base64,<?php echo base64_encode( $f )?>'
                                                class="card-img-top" alt="Product" />
                                                <a href="cart.php" button 
                                                class="btn btn-success btn-sm">Back to cart</a>

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
                                                <div>
                                                <div class="d-flex justify-content-between">
                                                        <span><a href="#">View Seller</a></span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                                    <span>Price</span><span>₱<?php echo $d;?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>


               
    </section>
<?php






 }
 
?>
                        
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
</body>

</html>