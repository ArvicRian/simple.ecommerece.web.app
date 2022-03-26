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

$id = $_GET['id'];

$query = "SELECT * FROM seller where seller_id = '$id'";
$result = mysqli_query($con, $query) or die (mysqli_error($con));
                  
        while ($row = mysqli_fetch_assoc($result)) {
                                             
            $a = $row['fname'];
            $b = $row['lname'];
            $c = $row['address'];
            $d = $row['contact'];
            $e = $row['sname'];
            $f = $row['username'];
            $g = $row['password'];
            $h = $row['seller_id'];
        }
?>


                                    <p class="text-center h5 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Account</p>
                                    <form class="mx-1 mx-md-4" action="edit.seller.data.php" method="post">
                                        <input type="hidden" name="seller_id" value="<?php echo $h; ?>">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="fname" class="form-control"
                                                    value="<?php echo $a; ?>" required />
                                                <label class="form-label" for="form3Example1c">First Name</label>
                                            </div>
                                            &nbsp; &nbsp;
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example3c" name="lname" class="form-control"
                                                    value="<?php echo $b; ?>" required />
                                                <label class="form-label" for="form3Example3c">Last Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example4c" name="address"
                                                    class="form-control" value="<?php echo $c; ?>" required />
                                                <label class="form-label" for="form3Example4c">Address</label>
                                            </div>
                                        </div>

                                        
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example4c" name="sname"
                                                    class="form-control" value="<?php echo $e; ?>" placeholder="Name of your Store" required />
                                                <label class="form-label" for="form3Example4c">Store Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example4cd" name="contact"
                                                    class="form-control" value="<?php echo $d ?>" required />
                                                <label class="form-label" for="form3Example4cd">Contact Number</label>
                                            </div>
                                        </div>

                                        <p class="text-center h5 fw-bold mb-5 mx-1 mx-md-4 mt-4">Username and
                                            Password</p>
                                       
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="username" id="form3Example3c" name="username"
                                                    class="form-control" value="<?php echo $f; ?>" required />
                                                <label class="form-label" for="form3Example3c">Username</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="password"
                                                    class="form-control" value="<?php echo $g; ?>"
                                                    placeholder="Enter your password" required />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" name="submit"
                                            class="btn btn-outline-success">Update</button>
                                        &nbsp;&nbsp;&nbsp;
                                        <a button href="seller.form.php" class="btn btn-outline-success">Cancel</a>
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