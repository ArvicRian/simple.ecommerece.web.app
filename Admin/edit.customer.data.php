<?php
include("../Database/auth.php");
require('../Database/database.php');

$customer_id = $_POST['customer_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$username = $_POST['username'];
$password = $_POST['password'];


$sql = "UPDATE customer SET fname='$fname', lname='$lname', address='$address', contact='$contact', username='$username', password='$password' WHERE customer_id = '$customer_id'";

$result = mysqli_query($con,$sql) or die(mysqli_error($con));


if($result){
    echo '<script type="text/javascript">'; 
    echo 'alert("Account Updated");'; 
    echo 'window.location.href = "customer.form.php";';
    echo '</script>'; 
}else{
    echo '<script type="text/javascript">'; 
    echo 'alert("Something went wrong!");'; 
    echo 'window.location.href = "edit.customer.form.php";';
    echo '</script>'; 

}


?>