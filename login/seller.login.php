<?php
session_start();

require('../Database/database.php');

if (isset($_POST['username'])){
    
$username = stripslashes($_REQUEST['username']);
    
$username = mysqli_real_escape_string($con,$username);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);


    $query = "SELECT * FROM `seller` WHERE username='$username' and password='$password'";
$result = mysqli_query($con,$query);
$rows = mysqli_num_rows($result);
    if($rows==1){
    $_SESSION['username'] = $username;
        
    header("Location: ../Product/list.form.php");
     }else{
        echo"<script type='text/javascript'>
        alert('Username or password incorrect');
        window.location = 'login.form.php';
    </script>";
}
}
?>

