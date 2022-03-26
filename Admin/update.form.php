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
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
                                        <a class="navbar-brand mb-0 h6"
                                            href="customer.form.php"><small>Customer</small></a>
                                        <a class="navbar-brand mb-0 h6" href="seller.form.php"><small>Seller</small></a>
                                        <a class="navbar-brand mb-0 h6"
                                            href="settings.form.php"><small>Settings</small></a>
                                    </div>
                                    <div class="navbar nav">
                                        <a class="navbar-brand mb-0 h6" href="../Database/logout.php"
                                            data-toggle="collapse">
                                            <span class="bi bi-box-arrow-right">
                                        </a>
                                    </div>
                            </nav>
                            <div class="wrapper bg-white mt-sm-5">

                                <h4 class="pb-4 border-bottom">Update Account</h4>
                                <form name="form" action="update.data.php" method="POST">
                                <?php

$sql = "SELECT * FROM admin where username = '{$_SESSION['username']}'";
$result = $con->query($sql);
$i = 1;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ${"v" . $i} = $row['admin_id'];
        $i++; 
    }
    if (!$i == 0){
        $query = 'SELECT * FROM admin WHERE admin_id ="'.$v1.'"';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));

        while ($row = mysqli_fetch_assoc($result)) {
            
            ?>
                                <div class="py-2">
                                    <div class="row py-2">
                                        <div class="col-md-6"> <label for="firstname">Username</label> <input
                                                type="text" class="bg-light form-control" name="username"
                                                value="<?php echo $row["username"]; ?>" readonly> </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6"> <label for="email">Password</label> <input
                                                type="password" class="bg-light form-control" name="password"
                                                value="<?php echo $row["password"]; ?>"> </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6"> <label for="email">Password</label> <input
                                                type="password" class="bg-light form-control" name="cpassword"
                                                value="<?php echo $row["password"]; ?>"> </div>
                                    </div>
                                </div>
                                <div class="py-3 pb-4 border-bottom"> <button type="submit" name="submit"
                                        class="btn btn-success mr-3">Save changes</button>
                                    <a button href="settings.form.php" class="btn btn-outline-success">Cancel</a>

                                </div>
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