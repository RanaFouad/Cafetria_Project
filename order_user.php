
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
    <title>Order User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/order_user.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script>
        $(function()
        {

            function getData()
            {

            }
            getData();



        });




    </script>
</head>

<body>

<nav class="nav navbar-inverse">
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
                    <img src="imag/logo1.png" class="logo" alt="logo" width="200" height="80"/>
                  
                </figure>
            </a>
        </div>
        <!-- nav-header-->
        <div class="collapse navbar-collapse" id="link1">
            <ul class="nav navbar-nav">
                <li class="# "><a href="order_user.php" class="glyphicon glyphicon-home"><strong> <span class="bar">Home</span></strong> <span class="sr-only">(current)</span></a></li>
                <li ><a href="my_order.php" class="glyphicon glyphicon-cutlery"> <strong><span class="bar">My Orders</span></strong></a></li>
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
<br>



<div class="row" style="padding:5;margin:5;">
    <div class="col-md-4" style=" border: 2px solid; background: #BF4068; padding:5;margin:5;">
        <div class="table-responsive" id="tab">
            <table  class="table table-striped table-bordered table-condensed table-hover">
                <thead data="-1">
                    <td>Product Name</td>
                    <td>Amount</td>
                    <td>increment order</td>
                    <td>decrement order</td>
                    <td>Total Price</td>
                    <td>Cancel</td>
                </thead>
                <tbody id="table">


                </tbody>


            </table>
        </div>

        <label class="control-label col-sm-2" for="notes">Notes</label>
        <textarea name="notes" id="notes" rows="4" cols="47" value=""></textarea>
        <br>
        <br>
        <br>
        <label class="control-label col-sm-2" for="room">Room</label>
        <select name="room" id="room">
            <option value="">Select Room</option>
            <?php

                if($myroom= $room -> select_rooms())
                {
                    while ($rowroom = mysqli_fetch_array($myroom))
                    {
             ?>
                        <option value="<?php  echo $rowroom['room_number'];  ?>"><?php  echo $rowroom['room_number'];?></option>

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

        <br>
        <div id="not_select"></div>
        <hr>

        <div>
            <label class="control-label col-sm-6" for="notes">Total Price:</label>
            <p id="total_price"></p>
        </div>
        <br>
        <br>
        <br>
        <div  class="controls" style='float: right;'>
            <button class="btn btn-success" id="confirm"  >Confirm</button>
        </div>

    </div>
    <div class="col-md-7" style="padding:5;margin:5;">
        <div  style='float: right;' class="glyphicon glyphicon-search">
            <input type="text" id="search_product" name="product" placeholder="search for product"  value="" >
        </div>
	<div id="latest_order" >



	</div>
<br>
<br>        
<br>
<br>
<br>
<br>
<br>
<hr>
        <input type="hidden" name="user_id"    id="user_id"  value="<?php echo  $_SESSION['user_id']; ?>">


        <div  id="productView">

        <?php
            if( $myvar= $product -> get_all_product())
            {


                while($rowProduct = mysqli_fetch_array($myvar))
                {
                    ?>
                    <figure class="nav navbar-nav navbar-left"  >
                        <div class="col-md-2" style="text-align:center;"   >
                            <img src="imag/<?php echo $rowProduct['product_picture']; ?>" id="<?php echo $rowProduct['product_id']; ?>"  alt="Admin"  width="100" height="100" name="image_div"/>
                            <figcaption class="bar" ><span id="sp_<?php echo $rowProduct['product_id']; ?>"><?php echo $rowProduct['product_name'] ?></span></figcaption>
                            <input type="hidden" name="price"    id="price_<?php echo $rowProduct['product_id']; ?>"  value="<?php echo $rowProduct['product_price']; ?>">
                        </div>
                    </figure>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="alert alert-danger ">No Product Founds</div>
        <?php
            }
        ?>

	</div>


    </div>
</div>

	<div class="navbar navbar-fixed-bottom">
	<footer class="text-center" style="background-color:#000000 ">
		  
		<p>Cafetria Om Gamal Made By <span >Jaguars</span> &copy;</p> 
	</footer>
</div>
</body>
</html>
