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
    <link href="style.css" type="text/css" rel="stylesheet" />


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
        $query = 'SELECT * FROM orders WHERE pstatus ="Accepted" AND customer_id ="'.$v1.'"';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));
                  
        if($result->num_rows > 0) {  

            echo'<script> location.replace("order.details.from.php"); </script>';
            
        }else{

            ?>
                                       
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body cart">
                                                            <div class="col-sm-12 empty-cart-cls text-center"> <img
                                                                    src="../images/PantindahanLogo.png" width="320"
                                                                    height="320" class="img-fluid mb-4 mr-2">
                                                                <h4><strong>No orders have been made yet or check <a href="order.pending.form.php">Pending orders</a></strong></h4>
                                                                <h4><strong>View <a href="#">Order History</a></strong></h4>
                                                               <a href="browse.form.php"
                                                                    class="btn btn-success cart-btn-transform m-1"
                                                                    data-abc="true">Continue Shopping</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                     
                                        <?php
        
            }
    }
}

?>




                                                
                                                    
                                                    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>

</body>


</html>