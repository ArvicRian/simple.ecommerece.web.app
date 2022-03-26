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
                        <nav class="navbar navbar-expand-sm navbar-light">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <a class="navbar-brand mb-0 h6" href="order.pending.form.php"><small>Pending</small></a>
                                    <a class="navbar-brand mb-0 h6" href="order.details.from.php"><small>Accepted</small></a>
                                    <a class="navbar-brand mb-0 h6" href="order.complete.php"><small>Completed</small></a>
                                    <a class="navbar-brand mb-0 h6" href="order.history.php"><small><mark>Canceled</mark></small></a>
                                </div>
                            </div>
                        </nav>
                        <h1>Order History</h1>
                        <div class="table-responsive">
                        <section class="main-content">
                            <div class="container">
                                
                                <br>
                                <br>
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Time</th>
                                            <th>Name</th>
                                            <th>Product purchase</th>
                                            <th>Total Amount</th>
                                            <th>Order</th>
                                        </tr>
                                    </thead>
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
        $query = 'SELECT * FROM orders_history WHERE pstatus="Cancel" AND customer_id ="'.$v1.'"';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));
                  
        while ($row = mysqli_fetch_assoc($result)) {
            
            $total = $row['pprice'] * $row['pquant'];
            $a = $row['time'];
            $b = $row['fname'];
            $c = $row['lname'];
            $d = $row['pname'];
            $e = $row['pstatus'];

            ?>

        <tbody>
            <tr>
                <td>
                    <span class="active-circle bg-success"></span> <?php echo $a?>
                </td>
                <td><?php echo $b ?> <?php echo $c ?></td>
                <td><?php echo $d ?></td>
                <td>₱<?php echo $total ?></td>
                <td><?php echo $e ?>ed</td>
            </tr>
        </tbody>
        </form>

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
    </section>
</body>

</html>