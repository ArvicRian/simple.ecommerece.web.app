<?php
include("../Database/auth.php");

require('../Database/database.php');




$sql = "SELECT * FROM customer where username = '{$_SESSION['username']}'";
$result = $con->query($sql);
$i = 1;


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ${"v" . $i} = $row['customer_id'];
        $i++;
    }
    if (!$i == 0){

        $query = 'DELETE FROM orders WHERE customer_id ="'.$v1.'"';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));

        echo'<script> location.replace("cart.php"); </script>';

    }
}


?>