<?php
include("../Database/auth.php");

require('../Database/database.php');



$id = $_GET['id'];
$query = 'DELETE FROM cart
 WHERE
 cart_id ='.$_GET['id'];

$result = mysqli_query($con, $query) or die(mysqli_error($con));

if(!$result==0){
    
    echo'<script> location.replace("cart.php?error=Succesfully deleted"); </script>';

}

?>