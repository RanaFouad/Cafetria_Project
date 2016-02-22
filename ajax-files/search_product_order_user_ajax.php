<?php
require_once ("../classes/db_connection.php");

$product_name=$_GET['value'];
//$connect = mysqli_connect('localhost', 'rana', 'iti','cafetria');
//mysqli_select_db($connect , 'cafetria');
$db = db_connection::getInstance();
$mysqli = $db->getConnection();
$query = " select * from product where product_name like '".$product_name."%' and product_amount ='avaliable' ";
$res = $mysqli->query($query) or die (mysqli_error($mysqli));


while($row=mysqli_fetch_array($res))
{
       ?>
    <figure class="nav navbar-nav navbar-left" >
        <div class="col-md-2" style="text-align:center;">
            <img src="imag/<?php echo $row['product_picture']; ?>"  id="<?php echo $row['product_id']; ?>" alt="Admin"  width="100" height="100" name="image_div" />
            <figcaption class="bar" ><span id="sp_<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></span></figcaption>
            <input type="hidden" name="price"    id="price_<?php echo $row['product_id']; ?>"  value="<?php echo $row['product_price']; ?>">
        </div>
    </figure>
<?php

}/*
$row_numbers=mysqli_affected_rows($connect);
echo $row_numbers;
for ($i = 0; $i < $row_numbers; $i++)
{
    $row = mysqli_fetch_assoc($result);
    var_dump($row);
}
$response['msg'] = $row;
echo json_encode($response);
*/
?>