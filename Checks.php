<?php
session_start();

?>

<html>
<head>
<title>Checks</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<script src="http://code.jquery.com/jquery-1.5.1.min.js" type="text/javascript"></script>
 <script type="text/javascript">
		   
             $(document).ready(function()
             {
                 $('.RowToClick').click(function ()
                 {
                     $(this).nextAll('tr').each( function()
                     {
                         if ($(this).is('.RowToClick'))
                        {
                           return false;
                        }
                        $(this).toggle(350);
                     });
                 });
             });
 </script>

     <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>


<nav class="nav navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="nav-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#link1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<figure>
					<img src="imag/logo1.png"class="logo" alt="logo" width="200" height="80"/>
					
				</figure>
			</a>	
		</div>
		<!-- nav-header-->
		<div class="collapse navbar-collapse" id="link1">
			<ul class="nav navbar-nav">
				<li class="AdminHome.html "><a href="AdminHome.php" class="glyphicon glyphicon-home"><strong> <span class="bar">Home</span></strong> <span class="sr-only">(current)</span></a></li> 
				<li ><a href="AddProducts.php" class="glyphicon glyphicon-cutlery"><strong> <span class="bar">Products</span></strong></a></li>
				<li ><a href="all_user.php" class="glyphicon glyphicon-user"> <strong><span class="bar">Users</span></strong></a></li>
				<li ><a href="order_admin.php" class="glyphicon glyphicon-cutlery"> <strong><span class="bar">ManualOrders</span></strong></a></li>
				<li ><a href="Checks.php" class="glyphicon glyphicon-log-out"> <strong><span class="bar">Checks</span></strong></a></li>
			</ul>
				 <figure class="nav navbar-nav navbar-right" >
					<img src="imag/<?php echo $_SESSION['picture']; ?>"  alt="Admin"  width="50" height="50"/>
					<figcaption class="bar" ><span><?php  echo $_SESSION['user_name']; ?></span></figcaption>
				 </figure>
		</div>

	</div>
	<!-- container fluid-->
	<a name="myPage" >
	
	
</nav>
	
	<div class="row">
		<div class="col-sm-12">
			<pre>
			
			</pre>
		</div>
		
	</div>

	<hr>
	<!-- body -->
	<div class="row">
		<div class="col-sm-12">
			<pre>
			<h2>Checks</h2>
			</pre>
		</div>
		
	</div>
	 <div class="row">
	 <div class="col-md-3"></div>
  	<div class="col-md-6">

    </div> 
  </div>
 
  <div class="row">
	<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<form class="form-inline" role="form">
	  <div class="form-group">
		<label for="from">Date From</label>
		<input type="date" class="form-control" id="from" name="from">
	  </div>
	  <div class="form-group">
		<label for="ro">Date To</label>
		<input type="date" class="form-control" id="to" name="to">
	  </div>
	  
	   <div class="control-group">
              <label class="control-label" for="users">Select User:</label>
              <div class="controls">
			  
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

					$sql = "SELECT * FROM users";
					$result = mysqli_query($conn, $sql);
					
					echo "<select class='form-control' id='users' >";
					
					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						
						while($row = mysqli_fetch_assoc($result)) {
							echo "<option id='".$row['user_id']."'>" . $row['user_name']. "</option>";
						}
					} else {
						echo "<option >There are no users..</option>";
					}
					echo "</select>";
					mysqli_close($conn);
			?>
	</div>	
	</div>
	</form>
			</div>
		<div class="col-sm-2"></div>
	</div>
	
	<div id="checks">
	
	</div>
	
	
<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
         
		  
		  <script type="text/javascript">
		    $(document).ready(function()
            {
				  $("#to").change(function (){
				  
					$from=$("#from").val();
					$to=$("#to").val();
					//$id=$(this).find(":selected").attr('id');
					
					console.log($from);
					console.log($to);
					//sconsole.log($id);
					
					$.ajax({
						async:true,
						method:"GET",
						url:"checksFromTo.php",
						data: {from:$from ,to:$to },
						success:function(response){
							console.log(response);
							$('#checks').html(response);
						},
						error:function(xhr,status,error){
							console.log(error);
						},
						complete:function(xhr){
							console.log("Complete ");
						}
					});
				});
				
				$("#users").change(function (){
				  
					$from=$("#from").val();
					$to=$("#to").val();
					$id=$(this).find(":selected").attr('id');
					
					console.log($from);
					console.log($to);
					console.log($id);
					
					$.ajax({
						async:true,
						method:"GET",
						url:"checksFromTo.php",
						data: {from:$from ,to:$to,id:$id },
						success:function(response){
							console.log(response);
							$('#checks').html(response);
						},
						error:function(xhr,status,error){
							console.log(error);
						},
						complete:function(xhr){
							console.log("Complete ");
						}
					});
				});
				
			});
		  </script>
		  
        </h4>
      </div>
   


	
	<!-- footer using well -->
<div class="navbar navbar-fixed-bottom">
	<footer class="text-center" style="background-color:#000000 ">
		  
		<p>Cafetria Om Gamal Made By <span >Jaguars</span> &copy;</p> 
	</footer>
</div>
	<script>
	$(document).ready(function(){
		// Initialize Tooltip
		$('[data-toggle="tooltip"]').tooltip(); 
	})
	</script>

</body>
</html>
