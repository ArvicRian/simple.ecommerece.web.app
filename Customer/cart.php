<?php
include("../Database/auth.php");

require('../Database/database.php');

?>


<!DOCTYPE html>
<html lang="en">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patindahan</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

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
                                        <a href="order.details.from.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
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

                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome Customer</p>
                        <section class="h-100" style="background-color: #eee;">
                            <div class="container h-100 py-5">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-10">

                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                                        </div>
                                        <?php if (isset($_GET["error"])) { ?>
                                        <div class="alert alert-success mb-4" role="alert">
                                            <?=$_GET["error"]; ?>
                                        </div>
                                        <?php } ?>
                                        <?php if (isset($_GET["error1"])) { ?>
                                        <div class="alert alert-danger mb-4" role="alert">
                                            <?=$_GET["error1"]; ?>
                                        </div>
                                        <?php } ?>
                                        <?php

$sql = "SELECT * FROM customer where username = '{$_SESSION['username']}'";
$result = $con->query($sql);
$i = 1;


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ${"v" . $i} = $row['customer_id'];
        $i++; 
    }
    if (!$i == 0){
        $query = 'SELECT * FROM cart WHERE customer_id ="'.$v1.'"';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));
                  
        while ($row = mysqli_fetch_assoc($result)) {
            
            $pquant = $row['pquant'];
            $total = $row["pprice"]* $row["pquant"];
            
            ?>

                                        <div class="card rounded-3 mb-4">
                                            <div class="card-body p-4">
                                                <div class="row d-flex justify-content-between align-items-center">
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <a href="cart.view.php?type=product&delete & id= <?php echo $row['product_id']; ?> ">
                                                        <p class="lead fw-normal mb-2"><?php echo $row["pname"]; ?></p></a>
                                                        <p><span class="text-muted">Price:
                                                            </span>₱<?php echo $row["pprice"]; ?>
                                                        <p><span class="text-muted">Quantity:
                                                            </span><?php echo $row["pquant"]; ?>
                                                    </div>

                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <p><span class="text-muted">Total Price:
                                                            </span>
                                                        <h5 class="mb-0">₱<?php echo $total ?></h5>
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        <a
                                                            href="cart.delete.php?type=product&delete & id= <?php echo $row['cart_id']; ?> "><i
                                                                class="fas fa-trash fa-lg"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <?php
                          
        }
        
        
        
       
       if($result->num_rows == 0){

        echo'<script> location.replace("cart1.php"); </script>';
    
        }
    }else{
      echo"error";
    }
}else{
  echo"error";
}
?>


                                        
                                            <div class="card">
                                                <div class="card-body">
                                                    <a button type="button" name="submit" href="checkout.data.php"
                                                        class="btn btn-success btn-block btn-lg">Checkout Order</a>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>