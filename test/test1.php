<?php


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
                                            <input class="form-control form-control-lg form-control-borderless"
                                                type="search" name="search" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-sm btn-success" name="submit" type="submit">Search</button>
                                        </div>
                                    </div>
                                    <form>
                                </div>
                            </section>
                            <section class="py-5">
                                <div class="container px-4 px-lg-5 mt-5">
                                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                                    <?php

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 4;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM product ");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1

    $result = mysqli_query($con,"SELECT * FROM product LIMIT $offset, $total_records_per_page");
    while($row = mysqli_fetch_array($result)){
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
	mysqli_close($con);
    ?>





                                    </div>
                                </div>
                            </section>
                            <center>
                            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination justify-content-center">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>
</center>
                        </body>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>


</html>