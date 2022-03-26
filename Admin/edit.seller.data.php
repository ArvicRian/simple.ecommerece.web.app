<?php
include("../Database/auth.php");
require('../Database/database.php');

$seller_id = $_POST['seller_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$sname = $_POST['sname'];
$contact = $_POST['contact'];
$username = $_POST['username'];
$password = $_POST['password'];


$sql = "UPDATE seller SET fname='$fname', lname='$lname', address='$address', sname='$sname', contact='$contact', username='$username', password='$password' WHERE seller_id = '$seller_id'";

$result = mysqli_query($con,$sql) or die(mysqli_error($con));


if($result){
    echo '<script type="text/javascript">'; 
    echo 'alert("Account Updated");'; 
    echo 'window.location.href = "seller.form.php";';
    echo '</script>'; 
}else{
    echo '<script type="text/javascript">'; 
    echo 'alert("Something went wrong!");'; 
    echo 'window.location.href = "edit.seller.form.php";';
    echo '</script>'; 

}


?>