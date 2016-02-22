<?php


						$servername = "127.7.18.2:3306";
						$username = "adminiGMhwvw";
						$password = "lpq88Pcq7He6";
						$dbname = "cafetria";
					
					// Create connection
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Check connection
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT DISTINCT ou.order_id,ou.order_date,u.user_name,r.room_number,u.ext FROM order_user ou,room r,order_product op,product p,users u 
							WHERE ou.user_id = u.user_id
							AND op.product_id = p.product_id
							AND ou.room_id = r.room_id";
							
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
				
							echo "<input type='hidden' name='".$row["order_id"]."' value='".$row["order_id"]."'>";						
							echo "<tr>";
							echo "<td>".$row["order_date"]."</td>";
							echo "<td>".$row["user_name"]."</td>";
							echo "<td>".$row["room_number"]."</td>";
							echo "<td>".$row["ext"]."</td>";
							echo "<td><button id=".$row["order_id"].">Deliver</button></td>";
							echo "</tr>";
							
							$sql1 = "select product_picture from product p left join order_product op on p.product_id=op.product_id WHERE op.order_id=".$row["order_id"]."";
							$result1= mysqli_query($conn,$sql1);
							
							echo "<tr>";
							//echo "<div class='well well-lg'>";
							while($row1 = mysqli_fetch_assoc($result1)){
								echo  "<td>".'<img src="imag/'.$row1["product_picture"].'" width="100" height="70"/>'."</td>";
							}
							
							
							
							//echo "</div>";
							echo "</tr>";		
						}
					} else {
						echo "<p>There is No Orders</p>";
					}
									
					mysqli_close($conn);
			?>
