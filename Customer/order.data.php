<?php
include("../Database/auth.php");

require('../Database/database.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$dtime = $_POST['dtime'];


$sql = "SELECT * FROM customer where username = '{$_SESSION['username']}'";
$result = $con->query($sql);
$i = 1;




if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ${"v" . $i} = $row['customer_id'];
        $i++;
    }
    if(!$result == 0){
            $query = 'UPDATE orders set dtime="'.$dtime.'", lname ="'.$lname.'", fname ="'.$fname.'", address ="'.$address.'", contact ="'.$contact.'" WHERE customer_id ="'.$v1.'" ';
            $result = mysqli_query($con, $query) or die (mysqli_error($con));

            if($result == 1){
                $query = 'DELETE FROM cart WHERE customer_id ="'.$v1.'"';
                $result = mysqli_query($con, $query) or die (mysqli_error($con));

                echo'<script> location.replace("order.details.from.php"); </script>';
            }

        }

    }



?>