<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantindahan</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.css">
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                                    <form class="mx-1 mx-md-4" name="form" action="login.data.php" method="POST">
                                        <?php if (isset($_GET["error"])) { ?>
                                            <div class="alert alert-danger mb-4" role="alert">
                                                <?=$_GET["error"]; ?>
                                            </div>  
                                        <?php } ?>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="username" id="form3Example3c" name="username"
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
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="login"
                                                class="btn btn-outline-success">Login</button>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <label class="form-label justify-content-center">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Not yet register? <br>
                                                Are you a <a href="../Customer/customer.form.php">Customer</a> or <a
                                                    href="../Seller/seller.form.php">Seller</a>.
                                            </label>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-start order-1 order-lg-2">

                                    <img src="../images/PantindahanLogo.png" class="img-fluid" alt="Sample image">

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


<script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-5.1.3-dist/js/bootstrap.js"></script>