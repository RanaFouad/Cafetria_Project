<?php
require_once ("../classes/db_connection.php");

$data=$_GET['value'];

$received_data = json_decode($data);

//if($received_data->roomno == "")
//{
  //echo "you have to select room";
//}
//else
//{

    $db = db_connection::getInstance();
    $mysqli = $db->getConnection();




    $query = " select room_id from room where room_number=$received_data->roomno ";
    $res = $mysqli->query($query) or die (mysqli_error($mysqli));
    $room_id=mysqli_fetch_array($res);
    //echo $room_id['room_id'];
    $r_id=$room_id['room_id'];


    $query = " insert into order_user (notes,user_id,room_id) values ('".$received_data->notes."','".$received_data->userid."','".$r_id."') ";
    $res = $mysqli->query($query) or die (mysqli_error($mysqli));

    $query = " select max(order_id) as moid from order_user ";
    $res = $mysqli->query($query) or die (mysqli_error($mysqli));
    $max_order_id=mysqli_fetch_array($res);
    //echo $max_order_id['moid'];
    $mo_id=$max_order_id['moid'];
    $statu="processing";
    for($i=0;$i<count($received_data->prodid);$i++)
    {
        $query = " insert into order_product (order_id,product_id,amount,order_status,total_price) values ('".$mo_id."','".$received_data->prodid[$i]."','".$received_data->amount[$i]."','".$statu."','".$received_data->totalprice[$i]."') ";
        $res = $mysqli->query($query) or die (mysqli_error($mysqli));


    }




    /*while($row=mysqli_fetch_array($res))
    {
        ?>
        <figure class="nav navbar-nav navbar-left" >
            <div class="col-md-2" style="text-align:center;">
                <img src="imag/<?php echo $row['product_picture']; ?>"  id="<?php echo $row['product_id']; ?>" alt="Admin"  width="100" height="100"/>
                <figcaption class="bar" ><span id="sp_<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></span></figcaption>
            </div>
        </figure>
        <?php

    }
    */
    ?>



    <?php

//}
?>