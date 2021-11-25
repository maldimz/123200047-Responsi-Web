<?php
include 'db/connect.php';

$user = $_POST['user'];
$pass = $_POST['pass'];
$full = $_POST['full'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if(!empty($user) && !empty($email) && !empty($pass) && !empty($full) && !empty($phone)){
    $sql = "INSERT INTO staff (username, password, full_name, email, phone_num) values ('$user', '$pass', '$full', '$email', '$phone')";
    $insert = $connection->query($sql);

    if($insert){
        header("location:login.php");
    }else{
        header("location:register.php?message=invalid");
    }
}else{
    header("location:register.php?message=empty");
}

?>