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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>

<script>
$(document).ready(function() {

    // Delete 
    $('.delete').click(function() {
        var el = this;

        // Delete id
        var deleteid = $(this).data('id');

        // Confirm box
        bootbox.confirm("Do you really want to delete product?", function(result) {

            if (result) {
                // AJAX Request
                $.ajax({
                    url: 'delete.data.php',
                    type: 'POST',
                    data: {
                        id: deleteid
                    },
                    success: function(response) {

                        // Removing row from HTML Table
                        if (response == 1) {
                            $(el).closest('tr').css('background', 'tomato');
                            $(el).closest('tr').fadeOut(800, function() {
                                $(this).remove();
                            });
                        } else {
                            bootbox.alert('Record not deleted.');
                        }

                    }
                });
            }

        });

    });
});
</script>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <nav class="navbar navbar-light navbar-expand bg-light justify-content-center rounded-3">
                            <div class="container">
                                <ul class="navbar-nav nav-justified w-100 text-center mt-1">
                                    <li class="nav-item">
                                        <a href="list.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-list-ul"><br>Product</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="add.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-bag-plus-fill"><br>Add</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="order.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-bell-fill"><br>Order</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="settings.form.php" class="nav-link active d-flex flex-column"
                                            data-toggle="collapse">
                                            <span class="bi bi-gear-fill"><br>Setting</span>

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
                        <div class="col-lg-12 mb-3">
                            <h2>Product List</h2>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Type</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php

$sql = "SELECT * FROM seller where username = '{$_SESSION['username']}'";
$result = $con->query($sql);
$i = 1;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ${"v" . $i} = $row['seller_id'];
        $i++;
    }
    if (!$i == 0){
        $query = 'SELECT * FROM product WHERE seller_id ="'.$v1.'"';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));
                  
        while ($row = mysqli_fetch_assoc($result)) {
                                             
        echo '<tr>';
        echo '<td>'. $row['pname'].'</td>';
        echo '<td>'. $row['ptype'].'</td>';
        echo '<td>'. $row['pprice'].'</td>';
        echo '<td>'. $row['pstock'].'</td>';
        echo '<td> <img src="data:image;base64,'.base64_encode( $row['pimage'] ).'"  style="width: 100px; height: 100px;>"</td>'; 
        echo '<td> <a  type="button" class="btn btn-success btn-sm" href="edit.product.php?action=edit & id='.$row['product_id'] . '"> Edit </a>
        <a button class="btn btn-danger btn-sm" href="delete.data.php?id='.$row['product_id'] . '">Delete</a>';
        echo '</tr> ';
        }
    }
    else{
    echo "error";
    }
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
    </section>



</body>

</html>