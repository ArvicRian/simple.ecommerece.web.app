<?php
include("../Database/auth.php");

require('../Database/database.php');


$id = $_GET['id'];
$query = 'DELETE FROM product
 WHERE
 product_id ='.$_GET['id'];

$result = mysqli_query($con, $query) or die(mysqli_error($con));

if(!$result==0){
    
    echo'<script> location.replace("list.form.php?error=Succesfully deleted"); </script>';

}


?>