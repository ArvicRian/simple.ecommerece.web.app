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

    echo'<script>
    setTimeout(function () {
       window.location.href= "../Product/list.form.php";
    }, 1000);
    </script>';

    }elseif(!$rows==1){
        $query = "SELECT * FROM `customer` WHERE username='$username' and password='$password'";
        $result = mysqli_query($con,$query);
        $rows = mysqli_num_rows($result);

        if($rows==1){
            $_SESSION['username'] = $username;
            
            echo'<script>
                setTimeout(function () {
                    window.location.href= "../Customer/browse.form.php";
                }, 1000);
                </script>';


        }else{
            echo'<script> location.replace("login.form.php?error=Incorrect password or username"); </script>';

        }
    }
}
?>