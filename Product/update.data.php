<?php
include("../Database/auth.php");

require('../Database/database.php');


?>

<body>
<?php
			$a = $_POST['id'];
			$pname = $_POST['pname'];
            $ptype = $_POST['ptype'];
            $pprice = $_POST['pprice'];
            $pstock = $_POST['pstock'];

				$query = 'UPDATE product set pname ="'.$pname.'",
					ptype ="'.$ptype.'", pprice="'.$pprice.'",
					pstock="'.$pstock.'" WHERE product_id ="'.$a.'"';
					$result = mysqli_query($con, $query) or die(mysqli_error($con));
				
							
?>	
	<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "list.form.php";
		</script>
</body>