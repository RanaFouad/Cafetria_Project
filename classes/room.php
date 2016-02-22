<?php

require_once ("db_connection.php");

class room {


    public function select_rooms() {
        $db = db_connection::getInstance();
        $mysqli = $db->getConnection();
        $query = " select room_number from room ";
        $res = $mysqli->query($query) or die (mysqli_error($mysqli));
       // $row_numbers = $mysqli->mysqli_affected_rows;
       // echo $row_numbers;
        if($res)
        {

            return $res;
        }
        else
        {
            return false;
        }


    }

}

?>
