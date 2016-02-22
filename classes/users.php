<?php
require_once ("db_connection.php");
class users {

    public function add_user($user_name,$user_email,$password,$picture,$ext,$room_id) {
        $res = mysqli_query($this->con, "INSERT INTO ` users`(user_name,user_email,password,picture,ext,room_id) 
            VALUES ('" . $user_name . "','" . $user_email . "','" . $password . "','" . $picture . "',$ext,$room_id)");
           return $res;

        }
        public function select_all_users() {
            //rana

            $db = db_connection::getInstance();
            $mysqli = $db->getConnection();
            $query = " select * from users ";
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
        public function edit_user($param) {
            //fathi hayro7 3ala page el add user
        }
        public function delete_user($param) {
            // fathi ajax
        }
       
}

?>
