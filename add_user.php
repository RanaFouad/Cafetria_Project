
<?php
ob_start();
session_start();
function __autoload($name)
{
    require_once("classes/".$name.".php");
}

$product = new product();
$room = new room();
$last_product = new product();
?>

<html>
<head>
    <title>Add User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/add_user.js"></script>
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
                    <img src="imag/logo.png"class="logo" alt="logo" width="150" height="30"/>
                    <figcaption>Cafeteria Om 7asn</figcaption>
                </figure>
            </a>
        </div>
        <!-- nav-header-->
        <div class="collapse navbar-collapse" id="link1">
            <ul class="nav navbar-nav">
                <li class="AdminHome.html "><a href="AdminHome.html" class="glyphicon glyphicon-home"><strong> <span class="bar">Home</span></strong> <span class="sr-only">(current)</span></a></li> 
				<li ><a href="AddProducts.html" class="glyphicon glyphicon-cutlery"><strong> <span class="bar">Products</span></strong></a></li>
				<li ><a href="all_user.html" class="glyphicon glyphicon-user"> <strong><span class="bar">Users</span></strong></a></li>
				<li ><a href="order_admin.php" class="glyphicon glyphicon-cutlery"> <strong><span class="bar">ManualOrders</span></strong></a></li>
				<li ><a href="Checks.html" class="glyphicon glyphicon-log-out"> <strong><span class="bar">Checks</span></strong></a></li>
            </ul>
            <figure  class="nav navbar-nav navbar-right" >
                <img src="imag/admin.jpg"   alt="Admin"  width="50" height="50"/>
                <figcaption  ><span>Admin Name</span></figcaption>
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

        <form class="form-horizontal" action="ajax-files/add_user_validation_ajax.php" method="POST" enctype="multipart/form-data" >
            <fieldset>
                <div id="legend">
                    <legend class="">Add Users</legend>
                </div>
                <div class="control-group">
                    <label class="control-label" for="name">Name</label>
                    <div class="controls">
                        <input type="text" id="name" name="name" placeholder="" class="form-control input-lg" value="" required>
                        <p class="help-block" id="not_name" ></p>
                    </div>
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
                    <label class="control-label" for="confirm_password">Confirm Password</label>
                    <div class="controls">
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="" class="form-control input-lg" value="" required>
                        <p class="help-block" id="not_confirm_password"></p>
                    </div>
                </div>

                <div>
                <label class="control-label" for="room">Room</label>
                <select name="room" id="room" required>
                    <option value="">Select Room</option>
                    <?php

                    if($myroom= $room -> select_rooms())
                    {
                        while ($rowroom = mysqli_fetch_array($myroom))
                        {
                            ?>
                            <option value="<?php  echo $rowroom['room_number'];  ?>"  ><?php  echo $rowroom['room_number'];?></option>

                            <?php

                        }
                    }
                    else
                    {
                        ?>
                        <div class="alert alert-danger ">No room Founds</div>
                        <?php
                    }
                    ?>
                </select>
                <div id="not_select"></div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="name">EXT</label>
                    <div class="controls">
                        <input type="text" id="ext" name="ext" placeholder="" class="form-control input-lg" value="" required>
                        <p class="help-block" id="not_ext"></p>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" for="product-picture">User Picture</label>

			  <span class="btn-file file-input btn btn-block btn-primary">
                Browse  <input type="file" name="file" id="file" required/>

				</span>
                </div>
                <div id="not_file" ></div>
                <div class="control-group">
                    <label>-</label>
                </div>

                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-success" id="save" disabled="disabled" value="Save" name="submit">Save</button>
                        <input type="reset"  name="reset"  class="btn btn-warning" value="Reset">
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
<footer class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p>Cafetria Om Gamal Made By <a href="#" data-toggle="tooltip" title="Jaguars">Jaguars</a> &copy;</p>
</footer>

<script>
    $(document).ready(function(){
        // Initialize Tooltip
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>

</body>
</html>
