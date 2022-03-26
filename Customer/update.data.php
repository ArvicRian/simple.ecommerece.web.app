<?php
include("../Database/auth.php");

require('../Database/database.php');

?>

<body>

<?php
if(isset($_POST['submit'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $user = $_SESSION["username"];

    $sql = "UPDATE customer SET fname='$fname', lname='$lname', address='$address', contact='$contact' WHERE username = '$user'";

    $result = mysqli_query($con,$sql) or die(mysqli_error($con));

    echo'<script> location.replace("settings.form.php"); </script>';


}
                                                     
?>
</body>