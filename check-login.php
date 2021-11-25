<?php
include 'db/connect.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM staff WHERE username = '$user' AND password = '$pass'";
$query = $connection->query($sql);

$data = $query->fetch_object();
$check = $query->num_rows;

if($check > 0){
    session_start();
    $_SESSION['fullname'] = $data->full_name;
    $_SESSION['username'] = $user;
    header("location:home.php");
}else{
    header("location:login.php?message=invalid");
}


?>