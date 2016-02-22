<?php
require_once ("db_connection.php");



class product {

    public function search_product($param) {
        //rana
    }

    public function search_favorite_product() {
        //rana
      /*  $db = db_connection::getInstance();
        $mysqli = $db->getConnection();
        $query = " select product.* from product,order_user,order_product where order_user.order_id = order_product.order_id and product.product_id = order_product.product_id and order_user.user_id = 2 order by order_user.order_date desc limit 3;
 ";
        $res = $mysqli->query($query) or die (mysqli_error($mysqli));*/
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
        /*if($res)
        {
            return $res;
        }
        else
        {
            return false;
        }*/

    }

    public function get_all_product() {
        //rana
        $db = db_connection::getInstance();
        $mysqli = $db->getConnection();
        $query = " select * from product where product_amount = 'avaliable' ";
        $res = $mysqli->query($query) or die (mysqli_error($mysqli));
        if($res)
        {
            return $res;
        }
        else
        {
            return false;
        }

    }

    public function select_all_prodcut($param) {
        //fathi
    }

    public function edit_product($param) {
        //fathi
        // hayro7 3ala add product page but  with current data 
    }

    public function delete_product($param) {
        //fathi  ajax
    }

    public function add_product($param) {
        // sobhy
    }

    public function total_amount_per_user($param) {
        // sobhy
    }
    public function select_prodcut_from_to($param) {
        //sobhy
    }
    
}

?>
