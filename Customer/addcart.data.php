<?php
session_start();

require('../Database/database.php');


if(isset($_POST['submit']))
		{
            $product_id = $_POST['product_id'];
			$pname = $_POST['pname'];
            $pprice = $_POST['pprice'];
			$pquant = $_POST['pquant'];
			$seller_id = $_POST['seller_id'];

			$sql = "SELECT * FROM customer where username = '{$_SESSION['username']}'";
			$result = $con->query($sql);
			$i = 1;
			$stock = 0;
			if ($result->num_rows > 0) {
    			while($row = $result->fetch_assoc()) {
        			${"v" . $i} = $row['customer_id'];
        			$i++;
    			}if (!$i == 0){
					$sql = "SELECT * FROM cart WHERE product_id ='$product_id'";
					$result = $con->query($sql);
					
					if($result->num_rows == 1){
						echo'<script> location.replace("cart.php?error1=Product Already Added"); </script>';
					}else if($result->num_rows == 0){
						
					$query = "INSERT into `cart` (`product_id`,`pname`, `pprice`,`pquant`,`customer_id`,`seller_id`)
					VALUES ('$product_id','$pname','$pprice','$pquant','$v1;','$seller_id')"; 
					$result = $con->query($query);
					
						if($result){

							$query = "SELECT * FROM product WHERE product_id = $product_id";
							$result = $con->query($query);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									
									$stock = $row["pstock"] - $pquant;
									$query = "UPDATE product set pstock='".$stock."' WHERE product_id = $product_id";
									$result = $con->query($query);
									
									echo'<script> location.replace("cart.php"); </script>';
													
								 }  
							}  
							

						}
					   
					}

				}else{
        		echo "error";
    			}
            }
        }



?>