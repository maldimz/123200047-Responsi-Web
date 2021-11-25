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

$id = $_GET['id'];


if(!empty($itemCode) && !empty($name) && !empty($amount) && !empty($unit) && !empty($coming_date) && !empty($category) && !empty($status) && !empty($price)){
    $sql = "UPDATE inventory SET
        item_id = '$itemCode',
        item_name = '$name',
        amount = '$amount',
        unit = '$unit',
        arrival_date = '$coming_date',
        category = '$category',
        item_status = '$status',
        price = '$price' WHERE item_id = '$id';
        ";
    $update = $connection->query($sql);

    if($update){
        header("location:list-inventory.php");
    }else{
        header("location:edit-form.php?message=invalid&id=$id");
    }
}else{
    header("location:edit-form.php?message=empty&id=$id");
}
?>