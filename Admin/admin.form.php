<?php

session_start();
require('../Database/database.php');


?>

<!DOCTYPE html>
<html lang="en">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.css">


<body>
<?php


if (isset($_POST['username'])){
        
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);

	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	
        $query = "SELECT * FROM `admin` WHERE username='$username'
and password='$password'";
	$result = mysqli_query($con,$query);
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
           
	    echo'<script> location.replace("customer.form.php"); </script>';
         }else{
	echo"<script type='text/javascript'>
        alert('Username or password incorrect');
        window.location = 'admin.form.php';
        </script>";
	}
}else{
    ?>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Admin</p>

                                    <form class="mx-1 mx-md-4" action="" method="POST">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="username" id="form3Example3c" name="username" class="form-control" required/>
                                                <label class="form-label" for="form3Example3c">Username</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="password" class="form-control" required/>
                                                <label class="form-label" for="form3Example4c" >Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-outline-success">Login</button>
                                        </div>

                                        <div class="d-flex justify-content-center mb-5">
                                            <label class="form-label">
                                            Login as different user <a href="../login/login.form.php">HERE</a>
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
    <?php } ?>
</body>

</html>