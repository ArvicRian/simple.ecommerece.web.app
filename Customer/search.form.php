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
<link rel="stylesheet" href="plugins1/bootstrap/css/bootstrap.min.css">
<!-- Themefisher Icon font -->
<link rel="stylesheet" href="plugins1/themefisher-font/style.css">
<!-- bootstrap.min css -->
<link rel="stylesheet" href="plugins1/bootstrap/css/bootstrap.min.css">

<!-- Animate css -->
<link rel="stylesheet" href="plugins1/animate/animate.css">
<!-- Slick Carousel -->
<link rel="stylesheet" href="plugins1/slick/slick.css">
<link rel="stylesheet" href="plugins1/slick/slick-theme.css">

<!-- Main Stylesheet -->
<link rel="stylesheet" href="css1/style.css">
<!-- Animate css -->
<link rel="stylesheet" href="plugins1/animate/animate.css">
<!-- Slick Carousel -->
<link rel="stylesheet" href="plugins1/slick/slick.css">
<link rel="stylesheet" href="plugins1/slick/slick-theme.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<body>
    <section class="vh-100" style="background-color: #eeee;">
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


                        <body id="body">
                            <section class="page-header">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="content">
                                                <h1 class="page-name">Product List</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="search.form.php" method="post">
                                        <div class="card-body row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <i class="fas fa-search h4 text-body"></i>
                                            </div>
                                            <div class="col">
                                                <input class="form-control form-control-lg form-control-borderless mb-3"
                                                    type="search" name="search" placeholder="Search">
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-sm btn-success mb-3" name="submit"
                                                    type="submit">Search</button>
                                            </div>

                                        </div>
                                        <form>
                                        <a class="btn btn-success mb-1" href="browse.form.php" role="button"
                                        >Clear Search</a>
                                </div>
                            </section>

                            <section class="py-5">
                                <div class="container px-4 px-lg-5 mt-1" stye>
                                    
                                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                                        <?php  
           
                $search = $_POST['search'];
                $sql = "SELECT * FROM product WHERE pname LIKE '%$search%'";
                $result = mysqli_query($con,$sql);
                $queryResult = mysqli_num_rows($result);

                if ($queryResult > 0){
                    while ($row = mysqli_fetch_array($result)){

                    ?>
                                        <div class="col mb-5">
                                            <div class="card h-100">

                                                <img class="card-img-top"
                                                    src='data:image;base64,<?php echo base64_encode( $row['pimage'] )?>' />

                                                <div class="card-body p-4">
                                                    <div class="text-center">

                                                        <h5 class="fw-bolder"><?php echo $row["pname"]; ?></h5>

                                                        ₱<?php echo $row["pprice"]; ?>
                                                    </div>
                                                </div>

                                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                    <div class="text-center"><a class="btn btn-success mt-auto"
                                                            href='product.view.php?type=product&delete & id= <?php echo $row['product_id']; ?> '>View
                                                            product</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php  
                                        }
}  
?>




                                    </div>
                                </div>
                            </section>

                        </body>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>


</html>