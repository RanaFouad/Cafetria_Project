<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<br>
	<br>
	<br>
	<form class="form-horizontal" action="login_validation.php" method="POST" enctype="multipart/form-data" >
		<fieldset>
			<div id="legend">
				<legend class="">Login Page</legend>
			</div>

			<div class="control-group">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="email" id="email" name="email" placeholder="" class="form-control input-lg" value="" required>
					<p class="help-block" id="not_mail" ></p>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<input type="password" id="password" name="password" placeholder="" class="form-control input-lg" value="" required>

					<p class="help-block" id="not_password"></p>
				</div>
			</div>







			<div class="control-group">
				<!-- Button -->
				<div class="controls">
					<button class="btn btn-success" id="save" value="Login" name="submit">Login</button>
				</div>
			</div>

		</fieldset>
	</form>
	<a href="send_email.php">Forgot your Password?</a>
</div>
</div>








































</body>





































</html>