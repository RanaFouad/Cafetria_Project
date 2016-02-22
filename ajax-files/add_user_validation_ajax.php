<?php

require_once ("../classes/db_connection.php");
session_start();
//$flag=0;
$image_name=$_FILES['file']['name'];
$upfile = '/var/www/html/Cafetria/imag'.$_FILES['file']['name'] ;
if (is_uploaded_file($_FILES["file"]['tmp_name']))
{
    if (!move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
    {
        echo "Problem: Could not move file to destination directory";
        exit;
    }
    echo "File uploaded successfully";
}
$file_type=$_FILES["file"]["type"];
#$check = getimagesize($_FILES["userfile"]["tmp_name"]);
if($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg" && $file_type != "image/gif")
{
    header('Location: ../add_user.php');

    echo "not image";
    exit;
}

$user_name=$_POST["name"];
$user_email=$_POST["email"];
$user_password= md5($_POST["password"]);
$room_number=$_POST["room"];
$user_ext=$_POST["ext"];
$pic_name = $_FILES['file']['name'];


$db = db_connection::getInstance();
$mysqli = $db->getConnection();

$query = " select room_id from room where room_number=$room_number ";
$res = $mysqli->query($query) or die (mysqli_error($mysqli));
$room_id=mysqli_fetch_array($res);
//echo $room_id['room_id'];
$r_id=$room_id['room_id'];


$query = " insert into users (user_name,user_email,password,picture,ext,room_id) values ('".$user_name."','".$user_email."','".$user_password."','".$pic_name."','".$user_ext."','".$r_id."') ";
$res = $mysqli->query($query) or die (mysqli_error($mysqli));


header('Location: ../add_user.php');








?>