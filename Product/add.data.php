<?php
require('../Database/auth.php');

require('../Database/database.php');

		if(isset($_POST['submit']))
		{
			$pname = $_POST['pname'];
 			$ptype = $_POST['ptype'];
            $pprice = $_POST['pprice'];
            $pstock = $_POST['pstock'];
            $file = addslashes(file_get_contents($_FILES['pimage']['tmp_name']));
			
			$sql = "SELECT * FROM seller where username = '{$_SESSION['username']}'";
			$result = $con->query($sql);
			$i = 1;

			if ($result->num_rows > 0) {
    			while($row = $result->fetch_assoc()) {
        			${"v" . $i} = $row['seller_id'];
        			$i++;
    			}
    			if (!$i == 0){
					$query = "INSERT into `product` (`pname`, `ptype`, `pprice`, `pstock`, `pimage`,`seller_id`)
					VALUES ('$pname','$ptype','$pprice','$pstock','$file','$v1;')"; 
		 			 mysqli_query($con,$query)or die(mysqli_error($con));
    			}
    			else{
        		echo "error";
    			}
}			
		}
		
				?>
<script type="text/javascript">
alert("Successfully added.");
window.location = "list.form.php";
</script>