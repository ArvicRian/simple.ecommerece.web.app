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
                                        <a href="../Product/list.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-list-ul"><br>Products</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../Product/add.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-bag-plus-fill"><br>Add</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../Product/order.form.php" class="nav-link active d-flex flex-column" data-toggle="collapse">
                                            <span class="bi bi-bell-fill"><br>Order</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../Product/settings.form.php" class="nav-link active d-flex flex-column"
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

                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                            <div class="py-2">
                                    <h3 class="tm-block-title d-inline-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Profile</h3>
                            </div>
                                <form class="mx-1 mx-md-4" name="form" action="username.data.php" method="POST">

                                <?php
                                         $user = $_SESSION["username"];

                                         $sql = "SELECT * FROM seller WHERE username = '$user'";

                                         $result = mysqli_query($con,$sql);

                                         if($result){
                                             if(mysqli_num_rows($result)>0){
                                                 while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input value="<?php echo $row['username']; ?>" id="form3Example3c" name="username"
                                                class="form-control" required />
                                            <label class="form-label" for="form3Example3c">Username</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4c" name="password"
                                                class="form-control" required />
                                            <label class="form-label" for="form3Example4c">Password</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4c" name="cpassword"
                                                class="form-control" required />
                                            <label class="form-label" for="form3Example4c">Re-enter Password</label>
                                        </div>
                                    </div>

                                    <div class="py-3 pb-5 border-bottom mb-4"><button type="submit" name="submit"
                                            class="btn btn-primary mr-3">Save Changes</button> <a button
                                            class="btn border button" href="../Product/settings.form.php">Cancel</a>
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
    </section>
</body>

</html>