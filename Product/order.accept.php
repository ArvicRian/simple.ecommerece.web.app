<?php
include("../Database/auth.php");

require('../Database/database.php');

$dtime = $_POST['dtime'];
$order_id = $_POST['order_id'];
$pstatus = $_POST['pstatus'];

$query = "SELECT * FROM orders WHERE order_id = '$order_id'";
$result = $con->query($query);

if ($result->num_rows > 0) {

    $query = 'UPDATE orders set pstatus="'.$pstatus.'", dtime="'.$dtime.'" WHERE order_id ="'.$order_id.'" ';
    $result = mysqli_query($con, $query) or die (mysqli_error($con));
    
    if($result == 1){

        echo'<script> location.replace("order.form.php?accept=Order Accepted"); </script>';
    }
}

?>