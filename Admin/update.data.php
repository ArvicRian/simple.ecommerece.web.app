<?php

include("../Database/auth.php");
require('../Database/database.php');




if(isset($_POST['submit'])){

    $passwordnew = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    $newuser = $_SESSION["username"];

    if ($passwordnew == $cpassword) {

    $sql = "UPDATE admin SET password='$passwordnew' WHERE username = '$newuser'";

    $result = mysqli_query($con,$sql) or die(mysqli_error($con));

    echo '<script type="text/javascript">'; 
    echo 'alert("Password has been change. Login again to continue...");'; 
    echo 'window.location.href = "settings.form.php";';
    echo '</script>';    


}else {
    echo '<script type="text/javascript">'; 
    echo 'alert("Password not Matched!");'; 
    echo 'window.location.href = "update.form.php";';
    echo '</script>';
}
}
    
                                                     
?>