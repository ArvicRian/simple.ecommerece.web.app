<?php
include("../Database/auth.php");

require('../Database/database.php');


$id = $_GET['id'];

$sql = "SELECT * FROM customer where username = '{$_SESSION['username']}'";
$result = $con->query($sql);

$i = 1;


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ${"v" . $i} = $row['customer_id'];
        $i++; 

    }if (!$i == 0){
        $query = 'UPDATE orders set pstatus="Receive" WHERE order_id ="'.$_GET['id'].'" AND customer_id ="'.$v1.'"';
        $result = mysqli_query($con, $query) or die (mysqli_error($con));

        if($result){

            $query = 'INSERT INTO `orders_history` (`order_id`,`product_id`, `pname`, `pprice`, `pquant`,`pstatus`,`customer_id`,`seller_id`,`dtime`,`fname`,`lname`,`address`,`contact`,`time`) 
            SELECT order_id, product_id, pname, pprice, pquant, pstatus, customer_id, seller_id, dtime, fname, lname, address, contact, time FROM orders WHERE order_id ="'.$_GET['id'].'" AND customer_id ="'.$v1.'" ';
            $result = mysqli_query($con, $query) or die (mysqli_error($con));

            if ($result){
                $query = 'DELETE FROM orders WHERE order_id ='.$_GET['id'];
                $result = mysqli_query($con, $query) or die (mysqli_error($con));

                echo'<script> location.replace("order.complete.php"); </script>';
            }
        }
        
}

}


?>