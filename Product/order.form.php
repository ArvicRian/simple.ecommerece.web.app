<?php
include("../Database/auth.php");

require('../Database/database.php');

?>
<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Patindahan</title>
<link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<!--  Datatables  -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />

<!--  extension responsive  -->
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<title></title>

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
                        <h1>Order List</h1>

                        <nav class="navbar navbar-expand-sm navbar-light">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <a class="navbar-brand mb-0 h6" href="order.form.php"><small><mark>Pending</mark></small></a>
                                    <a class="navbar-brand mb-0 h6" href="order.form1.php"><small>Accepted</small></a>
                                    <a class="navbar-brand mb-0 h6" href="order.form2.php"><small>Cancelled</small></a>
                                </div>
                            </div>
                        </nav>
                        <br>
                        <br>

                        <?php if (isset($_GET["accept"])) { ?>
                        <div class="alert alert-success mb-4" role="alert">
                            <?=$_GET["accept"]; ?>
                        </div>
                        <?php } ?>
                        <?php if (isset($_GET["cancel"])) { ?>
                        <div class="alert alert-danger mb-4" role="alert">
                            <?=$_GET["cancel"]; ?>
                        </div>
                        <?php } ?>
                        <style>
                        .dataTables_filter
                        { display: none; }
                        
                        </style>
                        <script></script>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="example" class="table table-bordered  display nowrap" cellspacing="0"
                                        width="100%">

                                        <thead>
                                            <tr>

                                                <th>Order ID</th>
                                                <th>Buyer</th>
                                                <th>Product purchase</th>
                                                <th>Total Amount</th>
                                                <th>Delivery Time</th>
                                                <th>Status</th>
                                                <th>Order</th>
                                            </tr>
                                        </thead>
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
        $query = 'SELECT * FROM orders WHERE pstatus="Pending" AND seller_id ="'.$v1.'"';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));
                  
        while ($row = mysqli_fetch_assoc($result)) {
            
            $total = $row['pprice'] * $row['pquant'];

        ?>

                                        <tbody>

                                            <tr>
                                                <td>
                                                    <span class="active-circle bg-success"></span>
                                                    <?php echo $row["order_id"]; ?>
                                                </td>
                                                <td><?php echo $row["fname"]; ?> <?php echo $row["lname"]; ?></td>
                                                <td><?php echo $row["pname"]; ?></td>
                                                <td>₱<?php echo $total ?></td>
                                                <form method="post" action="order.accept.php">
                                                    <input type="hidden" name="order_id"
                                                        value="<?php echo $row["order_id"];?>">
                                                    <input type="hidden" name="pstatus" value="Accepted">
                                                    <td><select id="cars" name="dtime">
                                                            <option value="<?php echo $row["dtime"]; ?>">
                                                                7:00 AM</option>
                                                            <option value="9:00 AM">9:00 AM</option>
                                                            <option value="11:00 AM">11:00 AM</option>
                                                            <option value="1:00 PM">1:00 AM</option>
                                                            <option value="3:00 AM">3:00 AM</option>
                                                        </select></td>
                                                    <td><?php echo $row["pstatus"]; ?></td>

                                                    <td>


                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary btn-sm">Accept</button>
                                                        <a href="order.cancel.php?type=product&delete & id= <?php echo $row['order_id']; ?>"
                                                            class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;

                                                    </td>

                                            </tr>
                                            </form>
                                        </tbody>


                                        <?php

        
        }
    }
    else{
    echo "error";
    }
}
?>

                                    </table>
                                </div>
    </section>
</body>

</html>


</div>
</div>
</div>
</div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

<!--   Datatables-->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

<!-- extension responsive -->
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>



<script>
$(document).ready(function() {
    $('#example').DataTable({
        responsive: true
    });
});
</script>

</body>

</html>