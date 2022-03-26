<?php
include("../Database/auth.php");

require('../Database/database.php');

?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registraton</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.css">
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
                            
                            <form class="mx-1 mx-md-4" name="form" action="update.data.php" method="POST">

                            <div class="wrapper bg-white mt-sm-5">
                                <div class="py-2">
                                    <h3 class="tm-block-title d-inline-block">Update Profile</h3>
                                    <div class="row py-2">
                                        

                                        <?php
                                         $user = $_SESSION["username"];

                                         $sql = "SELECT * FROM customer WHERE username = '$user'";

                                         $result = mysqli_query($con,$sql);

                                         if($result){
                                             if(mysqli_num_rows($result)>0){
                                                 while($row = mysqli_fetch_array($result)){
                                                     
                                                     ?>
                                        <div class="row py-2">
                                            <div class="col-md-6"> <label for="firstname">First Name</label> <input name="fname"
                                                    value="<?php echo $row['fname']; ?>" class="bg-light form-control">
                                            </div>
                                            <div class="col-md-6 pt-md-0 pt-3"> <label for="lastname">Last
                                                    Name</label> <input name="lname" value="<?php echo $row['lname']; ?>"
                                                    class="bg-light form-control"> </div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-md-6"> <label for="email">Address</label> <input name="address"
                                                    value="<?php echo $row['address']; ?>" class="bg-light form-control"> </div>
                                            <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Contact</label>
                                                <input name="contact" value="<?php echo $row['contact']; ?>"
                                                    class="bg-light form-control"> </div>
                                        </div>
                                        <div class="py-3 pb-4 border-bottom"> <button type="submit" name="submit" class="btn btn-success mr-3">Save Changes</button> 
                                        <a button class="btn border button" href="settings.form.php">Cancel</a>
                                        </div>
                                        <div class="py-3 pb-4 border-bottom"><a p href="username.form.php">Update Username and Password</a>
                                        </div>
                                        <?php
                                                 }
                                             }
                                         }

                                    ?>
                                    </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>