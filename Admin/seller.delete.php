<?php

include("../Database/auth.php");
require('../Database/database.php');


?>




<?php

$id = $_GET['id'];

$query = 'INSERT INTO `archive_seller` (`seller_id`,`fname`,`lname`,`address`,`contact`,`sname`,`username`,`password`) 
SELECT seller_id, fname, lname, address, contact, sname, username, password FROM seller WHERE seller_id ="'.$_GET['id'].'" ';
$result = mysqli_query($con, $query) or die (mysqli_error($con));

if($result)
{
	$query = 'DELETE FROM seller WHERE seller_id ='.$_GET['id'];
	$result = mysqli_query($con, $query) or die (mysqli_error($con));

	echo'<script> location.replace("seller.form.php"); </script>';
}
						
?>
			<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "seller.form.php";
			</script>				
				
		
			
