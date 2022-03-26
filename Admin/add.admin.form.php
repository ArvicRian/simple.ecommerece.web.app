<?php

include("../Database/auth.php");
require('../Database/database.php');


?>


<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">



<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">

                            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <a class="navbar-brand mb-0 h6" href="customer.form.php"><small>Customer</small></a>
                                        <a class="navbar-brand mb-0 h6" href="seller.form.php"><small>Seller</small></a>
                                        <a class="navbar-brand mb-0 h6" href="settings.form.php"><small>Settings</small></a>
                                    </div>
                                <div class="navbar nav">
                                <a class="navbar-brand mb-0 h6" href="../Database/logout.php"><small>Logout</small></a>
                                </div>
                            </nav>
                            <?php


error_reporting(0);

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM admin WHERE username='$username'";
		$result = mysqli_query($con, $sql);
		if(!$result->num_rows > 0){
            $sql = "INSERT INTO admin (username, password)
                VALUES ('$username','$password')";
            $result = mysqli_query($con, $sql);
            echo '<script type="text/javascript">'; 
            echo 'alert("Successfully Registered");'; 
            echo 'window.location.href = "settings.form.php";';
            echo '</script>';                
        }else {
            $errorMsg = "Username Already Taken!";
        }
		
	} else {
        $errorMsg  = "Password Not Matched!";
	}
}


?>
                            <p class="text-center h5 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add new Admin</p>
                            <form class="mx-1 mx-md-4" action="" method="post">


<p class="text-center h5 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create username and
    password</p>
<?php if (isset($errorMsg)) { ?>
<div class="alert alert-danger alert-dismissible">
    <?php echo $errorMsg; ?>
</div>
<?php } ?>
<div class="d-flex flex-row align-items-center mb-4">
    <div class="form-outline flex-fill mb-0">
        <input type="username" id="form3Example3c" name="username"
            class="form-control" value="<?php echo $username; ?>" required />
        <label class="form-label" for="form3Example3c">Username</label>
    </div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
    <div class="form-outline flex-fill mb-0">
        <input type="password" id="form3Example4c" name="password"
            class="form-control" value="<?php echo $password; ?>"
            placeholder="Enter your password" required />
        <label class="form-label" for="form3Example4c">Password</label>
    </div>
</div>

<div class="d-flex flex-row align-items-center mb-4">
    <div class="form-outline flex-fill mb-0">
        <input type="password" id="form3Example4c" name="cpassword"
            class="form-control" value="<?php echo $cpassword; ?>"
            placeholder="Re-Enter your password" required />
        <label class="form-label" for="form3Example4c">Re-enter Password</label>
    </div>
</div>

<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
    <button type="submit" name="submit"
        class="btn btn-outline-success">Register</button>
        &nbsp;&nbsp;&nbsp;
        <a button href="settings.form.php"
        class="btn btn-outline-success">Cancel</a>
</div>


</form>
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