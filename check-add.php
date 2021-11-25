<?php
include 'db/connect.php';

$itemCode = $_POST['item_code'];
$name = $_POST['name'];
$amount = $_POST['amount'];
$unit = $_POST['unit'];
$coming_date = $_POST['coming_date'];
$category = $_POST['category'];
$status = $_POST['status'];
$price = $_POST['price'];


if(!empty($itemCode) && !empty($name) && !empty($amount) && !empty($unit) && !empty($coming_date) && !empty($category) && !empty($status) && !empty($price)){
    $sql = "INSERT INTO inventory 
    (item_id, item_name, amount, unit, arrival_date, category, item_status, price) 
    values 
    ('$itemCode', '$name', '$amount', '$unit', '$coming_date', '$category', '$status', '$price')";
    $insert = $connection->query($sql);

    if($insert){
        header("location:list-inventory.php");
    }else{
        header("location:add-form.php?message=invalid");
    }
}else{
    header("location:add-form.php?message=empty");
}
?>