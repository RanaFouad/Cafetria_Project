<?php
session_start();
?>


<html>
<head>
<title>Add Products</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">	
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/AddProductsValidation.js"></script>
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
	 <div class="col-md-3"></div>
  	<div class="col-md-6">
    
          <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
          <fieldset>
            <div id="legend">
              <legend class="">Add Products</legend>
            </div>
            <div class="control-group">
              <label class="control-label" for="product">Product</label>
              <div class="controls">
                <input type="text" id="product" name="product" placeholder="" class="form-control input-lg">
                <p class="help-block">Product can contain any letters</p>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="price">Price</label>
              <div class="controls">
                <input type="number" id="price" name="price" placeholder="" class="form-control input-lg">
                <p class="help-block">Please provide the product price</p>
              </div>
            </div>
         
			 <div class="control-group">
              <label class="control-label" for="category">Category</label>
              <div class="controls">
				
			<?php
					
					echo "<select class='form-control' name='category' >";
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

						$sql = "SELECT * FROM category";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								echo "<option name='".$row["category_name"]."'>" . $row["category_name"]. "</option>";
							}
						} else {
							echo "<option >aaa</option>";
						}
						echo "</select>";
						mysqli_close($conn);
				?>
				
			  <p class="help-block">Please provide the product Category</p>
              </div>
            </div>
           
		     <div class="control-group">
              <label class="control-label" for="product-picture">Product Picture</label>
              
			  <span class="btn-file file-input btn btn-block btn-primary">
					Browse<input type="file" name="fileToUpload">

				</span>
            </div>
			<div class="control-group">
			<label>
			
			</label>
			</div>
         
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <input type="submit" class="btn btn-success" name="save" id="save">
				<input type="reset" class="btn btn-warning"/>
              </div>
            </div>
			
          </fieldset>
        </form>
    
    </div> 
  </div>
  
  
  
  <div class="row">
		<div class="col-sm-12">
			<pre>
			
			</pre>
		</div>
		
	</div>
	
		

	<!-- footer using well -->
	<div class="navbar ">
		<footer class="text-center" style="background-color:#000000 ">
			  
			<p>Cafetria Om Gamal Made By <span data-toggle="tooltip">Jaguars</span> &copy;</p> 
		</footer>
	</div>

</body>
</html>

<?php
				if(isset($_POST['save'])){
				
						include_once('dbconfig.php');

						$p_name=$_POST['product'];
						$p_price=$_POST['price'];
						$p_cat_name=$_POST['category'];
						$p_pic=$_FILES["fileToUpload"]["name"];
						
						$target_dir = "upload/";
						$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
												
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
							echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							$uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
						}
						
										
							
						$sql1="SELECT category_id from category WHERE category_name ='$p_cat_name'";
						$res=mysqli_query($conn,$sql1);
						
						if ($res->num_rows > 0) {
						
							while($row = $res->fetch_assoc()) {
								 $p_cat_id=$row["category_id"];
							 }
						}
	 						
						$sql="INSERT INTO product(product_name,product_price,category_id,product_picture)
											VALUES ('$p_name','$p_price','$p_cat_id','$p_pic')";
						
						
						$result = mysqli_query($conn, $sql);

						if ($result)
						{
							echo "Successful";
							echo "<BR>";
							echo "<a href='insert.php'>Back to main page</a>";
						} else {
							echo "ERROR";
						}
						mysqli_close($conn);
				}
?>



