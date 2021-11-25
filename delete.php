<?php
include 'db/connect.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql = "DELETE FROM inventory WHERE item_id ='$id'";
    $delete = $connection->query($sql);

    if($delete){
        header("location:list-inventory.php");
    }else{
        header("location:list-inventory.php");
    }
}else{
    header("location:list-inventory.php");
}

?>