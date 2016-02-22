<html>
<head>
<?php
session_start();

?>

<title>Admin Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">	
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.2.js"></script>


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

		$('.navbar').find('a').each(function()
		{
		    if (window.location.href.indexOf($(this).attr('href')) > -1)
		    {
			    $(this).parent().addClass('active');
		    }
		});
		
		
		
		//Deliver Buttons
			$("button").click(function() {	
				
				alert("dd");
				$id=$(this).attr('id');
				$(this).hide();
				$.ajax({
					method:"POST",
					url:"updateStatus.php",
					async:true,
					data:{id:$id},
					success:function(response){
						 
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
				<li ><a href="all_user.html" class="glyphicon glyphicon-user"> <strong><span class="bar">Users</span></strong></a></li>
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
			<h2>Orders</h2>
			</pre>
		</div>
		
	</div>
	 <div class="row">
	 <div class="col-md-12">
	 <table class="table table-striped">
    <thead>
      <tr>
        <th>Order-Date</th>
        <th>name</th>
        <th>Room</th>
		<th>Ext</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody id="table">
	
	 
	 <script type="text/javascript">
	 
		function getMyOrders(){
		
			$.ajax({
				method:"POST",
				url:"adminOrders.php",
				data:{
				},
				success:function(response){	
					$("#table").html(response);
					setTimeout(getMyOrders,5000);	
				},
				error:function(xhr,status,error){
					console.log(error);
				},
				complete:function(xhr){
					console.log("Complete ");
				},
				async:true
			});
		
		}
		
		getMyOrders();
	 
	 </script>
	 
	 
	 
	 
    </tbody>
	
  </table>

    </div> 
  </div>
 
	
	<!-- footer using well -->
	<!-- footer using well -->
<div class="navbar">
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
