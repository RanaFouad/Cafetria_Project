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

					$from=$_GET['from'];
					$to=$_GET['to'];
				
					if(!isset($_GET['id']) || empty($_GET['id'])){
						//from-to for all users 
					
						$sql="SELECT u.user_name from users u inner join (select order_id,user_id from order_user
							where order_date between '$from' and '$to') as ou on u.user_id=ou.user_id ";
							
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
											
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								echo "<div class='panel-group'>";
								echo "<div class='panel panel-default'>";
								echo "<div class='panel-heading'>";
								echo "<h4 class='panel-title'>";
								echo "<a data-toggle='collapse' href='#".$row['user_name']."'>".$row['user_name']."</a>";
								echo "</h4>";
								echo "</div>";
								echo "</div>";
								echo "</div>";
							}
						} else {
							echo "<p>There is No Checks during these dates</p>";
						}	
						
					}else{
						//choose specific user
						$id=$_GET['id'];
						
						$sql="SELECT u.user_name from users u right join (select order_id,user_id from order_user
							where order_date between '$from' and '$to') as ou on u.user_id='$id' ";
							
						$result = mysqli_query($conn, $sql);
						
						if (mysqli_num_rows($result) > 0) {
											
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								echo "<div class='panel-group'>";
								echo "<div class='panel panel-default'>";
								echo "<div class='panel-heading'>";
								echo "<h4 class='panel-title'>";
								echo "<a data-toggle='collapse' href='#".$row['user_name']."'>".$row['user_name']."</a>";
								echo "</h4>";
								echo "</div>";
								echo "</div>";
								echo "</div>";
							}
						} else {
							echo "<p>There is No Checks during these dates for this user</p>";
						}
					}
				
					//$sql = "SELECT user_name from users where user_id in ( SELECT user_id FROM order_user 
					//WHERE order_date between '$from' and '$to' and user_id='$id')";
					
					
									
					mysqli_close($conn);
?>
