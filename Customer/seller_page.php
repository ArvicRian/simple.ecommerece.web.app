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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php

    if (isset($_GET['id'])){
        
        $sellid = $_GET['id'];

        $sql = "SELECT * FROM seller WHERE seller_id ='$sellid'";
        $result = $con->query($sql);
        $i = 1;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ${"v" . $i} = $row['seller_id'];
                $i++; 
            }
        }
    }

?>
<body>
    <section class="vh-100" style="background-color: #eeee;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <nav class="navbar navbar-light navbar-expand bg-light justify-content-center rounded-3"
                            style="background-color: #e3f2fd;">
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

                            <div class="container">

                            <?php

                        $query = 'SELECT * FROM seller WHERE seller_id ="'.$v1.'"';
                        $result = mysqli_query($con, $query) or die (mysqli_error($con));
        
        while ($row = mysqli_fetch_assoc($result)) {   
            
            $a = $row['fname'];
            $b = $row['lname'];
            $c = $row['sname'];
            $d = $row['contact'];

            ?>
 <div class="card mt-3 pt-2 pb-0 px-3">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <h1 class="card-title "><b><?php echo $c ?></b></h1>
                                            </div>
                                            <div class="col">
                                                <h6 class="card-subtitle mb-2 text-muted">
                                                    <p class="card-text text-muted"> <span
                                                            class="vl mr-2 ml-0"></span> Store Name </p>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white px-0 ">
                                        <div class="row">
                                            <div class=" col-md-auto "> <a href="#"
                                                    class="btn btn-outlined btn-black text-muted bg-transparent"
                                                    data-wow-delay="0.7s"><img src="https://img.icons8.com/ios/50/000000/apple-phone.png"
                                                        width="19" height="19"> <big><?php echo $d ?></big></a> <i
                                                    class="mdi mdi-settings-outline"></i> 
                                                    <a href="#"
                                                    class="btn btn-outlined btn-black text-muted bg-transparent"
                                                    data-wow-delay="0.7s"><img src="https://img.icons8.com/pastel-glyph/64/000000/person-male--v1.png"
                                                        width="19" height="19"> <big><?php echo $a ?> <?php echo $b ?></big></a> <i
                                                    class="mdi mdi-settings-outline"></i> 
                                        </div>
                                    </div>
                                </div>
            <?php
        }
                      ?>

                               
                            </div>

                            <section class="py-5">
                                <div class="container px-4 px-lg-5 mt-1">
                                <div class="input-group rounded mb-4">
                                    <input type="search" class="form-control rounded" placeholder="Search"
                                        aria-label="Search" aria-describedby="search-addon" />
                                </div>
                                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                                    <?php
 $query = 'SELECT * FROM product WHERE seller_id ="'.$v1.'"';
 $result = mysqli_query($con, $query) or die (mysqli_error($con));
 while ($row = mysqli_fetch_assoc($result)) { 
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
    ?>






                                    </div>
                                </div>
                            </section>
                             
                        </body>
                        <a href="#" class="float">
<i class="bi bi-arrow-up-circle-fill"></i><br>
Back to top
</a>
<style>
    .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	border-radius:50px;
	text-align:center;
}

.my-float{
	margin-top:22px;
}
</style>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
</body>



</html>