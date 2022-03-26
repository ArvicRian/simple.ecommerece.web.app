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
                                <a class="navbar-brand mb-0 h6" href="../Database/logout.php"
                                            data-toggle="collapse">
                                            <span class="bi bi-box-arrow-right">
                                        </a>
                            </div>
                            </nav>

                            <nav class="navbar navbar-expand-sm navbar-light">
                                <div class="container-fluid">
                                       <h4>Archived customer accounts </h4>
                                    
                            </nav>
                            <div class="col-lg-12 mb-3">
                               
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address</th>
                                                <th>Contact</th>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php

    $query = 'SELECT * FROM archive_customer';
    $result = mysqli_query($con, $query) or die (mysqli_error($con));
                  
        while ($row = mysqli_fetch_assoc($result)) {
                                             
        echo '<tr>';
        echo '<td>'. $row['fname'].'</td>';
        echo '<td>'. $row['lname'].'</td>';
        echo '<td>'. $row['address'].'</td>';
        echo '<td>'. $row['contact'].'</td>';
        echo '</tr> ';
        }
?>
                                        </tbody>
                                    </table>
                                </div>



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