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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="payment.css">
    <link href="style.css" type="text/css" rel="stylesheet" />


<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">


                        <main class="page payment-page">
                            <section class="payment-form dark">
                                <div class="container">
                                    <div class="block-heading">
                                        <h2 style="color:green">Check out order</h2>
                                    </div>
                                    <form class="payment-form">
                                        <div class="products">
                                            <h3 class="title">Checkout</h3>
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
        $query = 'SELECT * FROM orders WHERE pstatus="Pending" AND customer_id ="'.$v1.'"  ';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));
                  
        while ($row = mysqli_fetch_assoc($result)) {   
            $total = $row['pprice'] * $row['pquant'];
            $totalSum += $total
            ?>
                                            <div class="item">
                                                <span class="price">
                                                    <span class="text-muted">Price</span>
                                                    <p>₱<?php echo $total; ?></p>
                                                </span>
                                                <p class="item-name"><?php echo $row["pname"]; ?>&nbsp;&nbsp;</p>
                                                <span class="text-muted"> Quantity:<?php echo $row["pquant"]; ?></span>
                                            </div>

                                            <?php

        }if($result){
            $query = 'SELECT * FROM customer WHERE customer_id ="'.$v1.'"';
            $result = mysqli_query($con, $query) or die (mysqli_error($con));
            while ($row = mysqli_fetch_assoc($result)) { 
                $a= $row['fname'];
                $b= $row['lname'];
                $c = $row['address'];
                $d= $row['contact'];

            }

        }                  
}
}

?>

                                            <div class="total">
                                                <p>Amount Payable: <span class="price">₱<?php echo $totalSum; ?></span>
                                                </p>
                                                <span class="text-muted">Cash on Delivery</span>
                                            </div>

                                        </div>
                                    </form>




                                    <form method="post" action="order.data.php">

                                        <div class="card-details">

                                            <div class="total">
                                                <h5>Delivery Time
                                                    <span><label for="cars"></label>
                                                        <select id="cars" name="dtime">
                                                            <option value="7:00 AM">7:00 AM</option>
                                                            <option value="9:00 AM">9:00 AM</option>
                                                            <option value="11:00 AM">11:00 AM</option>
                                                            <option value="1:00 PM">1:00 PM</option>
                                                            <option value="3:00 AM">3:00 PM</option>
                                                        </select>
                                                </h5>
                                            </div>
                                            <h5>Customer Details</h5>
                                            <div class="row">
                                                <div class="form-group col-sm-7">
                                                    <label for="card-number">First Name</label>
                                                    <input id="card-number" name="fname" type="text"
                                                        class="form-control" placeholder="Card Number"
                                                        aria-label="Card Holder" aria-describedby="basic-addon1"
                                                        value="<?php echo $a?>" required />
                                                </div>

                                                <div class="form-group col-sm-7">
                                                    <label for="card-number">Last Name</label>
                                                    <input id="card-number" name="lname" type="text"
                                                        class="form-control" placeholder="Card Number"
                                                        aria-label="Card Holder" aria-describedby="basic-addon1"
                                                        value="<?php echo $b?>" required />
                                                </div>

                                                <div class="form-group col-sm-7">
                                                    <label for="card-holder">Address</label>
                                                    <input id="card-holder" name="address" type="text"
                                                        class="form-control" placeholder="Address" aria-label="Address"
                                                        aria-describedby="basic-addon1" value="<?php echo $c?>"
                                                        required />
                                                </div>

                                                <div class="form-group col-sm-7">
                                                    <label for="card-number">Contact</label>
                                                    <input id="card-number" name="contact" type="text"
                                                        class="form-control" placeholder="Card Number"
                                                        aria-label="Card Holder" aria-describedby="basic-addon1"
                                                        value="<?php echo $d?>" required />
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <button type="submit" name="submit"
                                                        class="btn btn-success btn-block">Proceed</button>
                                                    <a button type="button" href="order.cancel.data.php"
                                                        class="btn btn-outline-success btn-block">Cancel</a>

                                                </div>


                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </main>

















                    </div>
                </div>
            </div>
        </div>
    </section>



</body>


</html>