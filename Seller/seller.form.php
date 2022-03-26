<?php
session_start();

require('../Database/database.php');
error_reporting(0);
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

    <?php



if (isset($_POST['submit'])) {

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$contact = $_POST['contact'];
    $sname = $_POST['sname'];
    $address = $_POST['address'];
    $username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM seller WHERE username='$username'";
		$result = mysqli_query($con, $sql);
		if (!$result->num_rows > 0) {
            $sql = "SELECT * FROM customer WHERE username='$username'";
            $result = mysqli_query($con, $sql);

            if(!$result->num_rows > 0){
                $sql = "INSERT INTO seller (fname, lname, address, contact, sname, username, password)
					VALUES ('$fname','$lname','$address','$contact','$sname','$username','$password')";
			    $result = mysqli_query($con, $sql);
                echo '<script type="text/javascript">'; 
                echo 'alert("Successfully Registered");'; 
                echo 'window.location.href = "../login/login.form.php";';
                echo '</script>';                
            }else {
				$errorMsg = "Username Already Taken!";
			}
		} else {
			$errorMsg = "Username Already Taken!";
		}
		
	} else {
        $errorMsg  = "Password Not Matched!";
	}
}
?>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h5 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome Seller</p>
                                    <form class="mx-1 mx-md-4" action="" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="fname" class="form-control"
                                                    value="<?php echo $fname; ?>" required />
                                                <label class="form-label" for="form3Example1c">First Name</label>
                                            </div>
                                            &nbsp; &nbsp;
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example3c" name="lname" class="form-control"
                                                    value="<?php echo $lname; ?>" required />
                                                <label class="form-label" for="form3Example3c">Last Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example4c" name="address"
                                                    class="form-control" value="<?php echo $address; ?>" required />
                                                <label class="form-label" for="form3Example4c">Address</label>
                                            </div>
                                        </div>

                                        
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example4c" name="sname"
                                                    class="form-control" value="<?php echo $sname; ?>" placeholder="Name of your Store" required />
                                                <label class="form-label" for="form3Example4c">Store Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example4cd" name="contact"
                                                    class="form-control" value="<?php echo $contact; ?>" required />
                                                <label class="form-label" for="form3Example4cd">Contact Number</label>
                                            </div>
                                        </div>

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
                                        </div>
                                        <div class="d-flex justify-content-center mb-5">
                                            <label class="form-check-label" for="form2Example3">
                                                Already Registered? Login <a href="../login/login.form.php">HERE</a>
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