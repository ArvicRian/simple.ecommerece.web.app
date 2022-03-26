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
                        <p class="h2 fw-bold mb-3 mx-1 mx-md-4 mt-4">Order Details</p>
                        <nav class="navbar navbar-expand-sm navbar-light">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <a class="navbar-brand mb-0 h6" href="order.pending.form.php"><small><mark>Pending</mark></small></a>
                                    <a class="navbar-brand mb-0 h6" href="order.details.from.php"><small>Accepted</small></a>
                                    <a class="navbar-brand mb-0 h6" href="order.complete.php"><small>Completed</small></a>
                                    <a class="navbar-brand mb-0 h6" href="order.history.php"><small>History</small></a>
                                </div>
                            </div>
                        </nav>
                        
                        <section class="h-100 h-custom" style="background-color: #eee;">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-lg-8 col-xl-6">
                                        <div class="card border-top border-bottom border-3"
                                            style="border-color: #f37a27 !important;">
                                            <div class="card-body p-5">

                                                <p class="lead fw-bold mb-5" style="color: #f37a27;">Order Status: Pending</p>
                                                
                                                <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <p class="small text-muted mb-1">Details</p>

                                                        </div>
                                                    </div>
                                                    <?php
$sql = "SELECT * FROM customer where username = '{$_SESSION['username']}'";
$result = $con->query($sql);
$i = 1;
$totalSum = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ${"v" . $i} = $row['customer_id'];
        $i++; 
    }
    if (!$i == 0){
        $query = 'SELECT * FROM orders WHERE customer_id ="'.$v1.'"';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));

        if ($result){
            $query = 'SELECT * FROM orders WHERE pstatus ="Pending" AND customer_id ="'.$v1.'"';
            $result = mysqli_query($con, $query) or die (mysqli_error($con));

            while ($row = mysqli_fetch_assoc($result)) {
                $total = $row['pprice'] * $row['pquant'];
                $totalSum += $total;
    
                $a = $row['fname'];
                $b = $row['lname'];
                $c = $row['address'];
                $d = $row['contact'];
                $e = $row['pstatus'];
                $f = $row['dtime'];
                
                ?>
    
                                                        <div class="row">
                                                        
                                                            <div class="col-md-8 col-lg-9">
                                                            
                                                                <p class="mb-0"><?php echo $row["pname"]; ?> Total of
                                                                    ₱<?php echo $total ?>
                                                                <p class="small text-muted mb-0"><?php echo $row["time"]; ?>
                                                                
                                                                </p>
                                                                </p>
                                                            </div>
    
    
                                                            <?php
                
            }if($result->num_rows == 0){

                echo'<script> location.replace("nopending.form.php"); </script>';
            
                }
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