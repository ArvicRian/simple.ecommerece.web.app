<?php

include("../Database/auth.php");
require('../Database/database.php');


?>




<?php

	$id = $_GET['id'];

	$query = 'INSERT INTO `archive_customer` (`customer_id`,`fname`,`lname`,`address`,`contact`,`username`,`password`) 
	SELECT customer_id, fname, lname, address, contact, username, password FROM customer WHERE customer_id ="'.$_GET['id'].'" ';
	$result = mysqli_query($con, $query) or die (mysqli_error($con));

	if($result)
	{
		$query = 'DELETE FROM customer WHERE customer_id ='.$_GET['id'];
        $result = mysqli_query($con, $query) or die (mysqli_error($con));

        echo'<script> location.replace("customer.form.php"); </script>';
	}

						
?>
						
				
			