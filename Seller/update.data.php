<?php
include("../Database/auth.php");

require('../Database/database.php');

?>

<body>

<?php
if(isset($_POST['submit'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $sname = $_POST['sname'];

    $user = $_SESSION["username"];

    $sql = "UPDATE seller SET fname='$fname', lname='$lname', contact='$contact', sname='$sname'WHERE username = '$user'";

    $result = mysqli_query($con,$sql) or die(mysqli_error($con));

    echo'<script> location.replace("../Product/settings.form.php"); </script>';


}

    
                                                     
?>

</body>