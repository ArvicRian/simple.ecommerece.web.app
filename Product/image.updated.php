<?php
require('../Database/auth.php');

require('../Database/database.php');

$product_id = $_POST['product_id'];
$file = addslashes(file_get_contents($_FILES['pimage']['tmp_name']));

$query = 'UPDATE product set pimage ="'.$file.'" WHERE product_id ="'.$product_id.'"';
					$result = mysqli_query($con, $query) or die(mysqli_error($con));

    if($result == 1){

        echo'<script type="text/javascript">
        alert("Successfully added.");
        window.location = "list.form.php";
        </script>';
    }

?>