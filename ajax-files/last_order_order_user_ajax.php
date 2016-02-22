<?php
require_once ("../classes/db_connection.php");
$user_id=$_GET['user_id'];
//$data=$_GET['value'];

//$received_data = json_decode($data);

//if($received_data->roomno == "")
//{
//echo "you have to select room";
//}
//else
//{

//$db = db_connection::getInstance();
//$mysqli = $db->getConnection();




$db = db_connection::getInstance();
$mysqli = $db->getConnection();
$query = " select product.* from product,order_user,order_product where order_user.order_id = order_product.order_id and product.product_id = order_product.product_id and order_user.user_id = $user_id order by order_user.order_date desc limit 2;
 ";
$res = $mysqli->query($query) or die (mysqli_error($mysqli));
/*$max_order_id=mysqli_fetch_array($res);
$mo_id=$max_order_id['moid'];
$query = " select product_id from order_product where order_id = $mo_id ";
$res = $mysqli->query($query) or die (mysqli_error($mysqli));

$rowProduct = mysqli_fetch_array($res);

foreach($rowProduct as $row)
{
    $query = " select * from product where product_id = $row ";
    $res1 = $mysqli->query($query) or die (mysqli_error($mysqli));
    //$array[$rowProduct] = mysqli_fetch_array($res1);

}

*/




while($row=mysqli_fetch_array($res))
{
    ?>
    <figure class="nav navbar-nav navbar-left" >
        <div class="col-md-2" style="text-align:center;">
            <img src="imag/<?php echo $row['product_picture']; ?>"  id="<?php echo $row['product_id']; ?>" alt="Admin"  width="100" height="100" name="image_div1" />
            <figcaption class="bar" ><span id="sp_<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></span></figcaption>
            <input type="hidden" name="price"    id="price_<?php echo $row['product_id']; ?>"  value="<?php echo $row['product_price']; ?>">
        </div>
    </figure>
    <?php



?>



<?php

}
?>