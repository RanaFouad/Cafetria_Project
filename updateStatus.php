<?php
						$servername = "127.7.18.2:3306";
						$username = "adminiGMhwvw";
						$password = "lpq88Pcq7He6";
						$dbname = "cafetria";
					
					$order_id=$_POST['id'];
					
					// Create connection
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Check connection
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "UPDATE order_product SET order_status ='Delivered'
					WHERE order_id = '$order_id'";
					if (mysqli_query($conn, $sql)) {
						echo "Record updated successfully";
					} else {
						echo "Error updating record: " . mysqli_error($conn);
					}
					
?>
