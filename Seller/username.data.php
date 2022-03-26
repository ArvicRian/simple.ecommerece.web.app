<?php
session_start();

require('../Database/database.php');

?>

<body>

<?php

if(isset($_POST['submit'])){

    $usernamenew = $_POST['username'];
    $passwordnew = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    $newuser = $_SESSION["username"];

    if ($passwordnew == $cpassword) {

    $sql = "UPDATE seller SET  username='$usernamenew', password='$passwordnew' WHERE username = '$newuser'";

    $result = mysqli_query($con,$sql) or die(mysqli_error($con));

    echo '<script type="text/javascript">'; 
    echo 'alert("Username/password has been change. Login again to continue...");'; 
    echo 'window.location.href = "../login/login.form.php";';
    echo '</script>';    


}else {
    echo '<script type="text/javascript">'; 
    echo 'alert("Password not Matched!");'; 
    echo 'window.location.href = "username.form.php";';
    echo '</script>';
}
}
    
                                                     
?>

</body>