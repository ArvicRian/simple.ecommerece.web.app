<?php
include("../Database/auth.php");

require('../Database/database.php');

?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller</title>
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
                                        <a href="list.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-list-ul"><br>Product</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="add.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-bag-plus-fill"><br>Add</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="order.form.php" class="nav-link active d-flex flex-column" data-toggle="collapse">
                                            <span class="bi bi-bell-fill"><br>Order</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="settings.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-gear-fill"><br>Setting</span>

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
                            <div class="wrapper bg-white mt-sm-5">
                                <div class="py-2">
                                    <h3 class="tm-block-title d-inline-block">User Profile</h3>
                                    <div class="row py-2">
                                        <div class="col-md-6"> <label for="firstname">Hi user
                                                <mark><?php echo $_SESSION['username']; ?></mark></label>

                                        </div>

                                        <?php
                                         $user = $_SESSION["username"];

                                         $sql = "SELECT * FROM seller WHERE username = '$user'";

                                         $result = mysqli_query($con,$sql);

                                         if($result){
                                             if(mysqli_num_rows($result)>0){
                                                 while($row = mysqli_fetch_array($result)){
                                                     
                                                     ?>
                                        <div class="row py-2">
                                            <div class="col-md-6"> <label for="firstname">First Name</label> <input
                                                    value="<?php echo $row['fname']; ?>" class="bg-light form-control"
                                                    readonly>
                                            </div>
                                            <div class="col-md-6 pt-md-0 pt-3"> <label for="lastname">Last
                                                    Name</label> <input value="<?php echo $row['lname']; ?>"
                                                    class="bg-light form-control" readonly> </div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Contact</label>
                                                <input value="<?php echo $row['contact']; ?>"
                                                    class="bg-light form-control" readonly>
                                            </div>
                                            <div class="col-md-6"> <label for="email">Store Name</label> <input
                                                    value="<?php echo $row['sname']; ?>" class="bg-light form-control"
                                                    readonly> </div>

                                        </div>
                                        <div class="py-3 pb-4 border-bottom"><a button
                                                class="btn btn-primary mr-3" href="../Seller/update.form.php">Update Account</a>
                                                
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
            </div>
    </section>