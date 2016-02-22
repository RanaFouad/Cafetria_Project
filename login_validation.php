<?php

require_once ("classes/db_connection.php");
session_start();

$user_email=$_POST["email"];

$user_password=md5($_POST["password"]);

$db = db_connection::getInstance();
$mysqli = $db->getConnection();

$query = " select * from users where user_email='".$user_email."' and password='".$user_password."' ";
$res = $mysqli->query($query) or die (mysqli_error($mysqli));

if($res)
{

    while($row=mysqli_fetch_array($res))
    {


        if($row['user_id']==1)
        {
	

            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['user_name']=$row['user_name'];
            $_SESSION['picture']=$row['picture'];
            header("location: AdminHome.php");

        }
        else
        {


            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['user_name']=$row['user_name'];
            $_SESSION['picture']=$row['picture'];
            header("location: order_user.php");


        }






    }




}
else
{

    header("location: login.php");

}














?>
