<?php
    session_start();
    if(empty($_SESSION['username']) && !isset($_GET['id'])){
        header("location:home.php");
    }else{
        include 'db/connect.php';

        $id = $_GET['id'];
        $sql = "SELECT * FROM inventory WHERE item_id = '$id'";
        $select = $connection->query($sql);

        $data = $select->fetch_object();
        $name = $data->item_name;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>123200047 - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css-logreg.css">
    <link rel="stylesheet" href="nav.css">
</head>
<body>
<div class="header">
        <h1>Web Based Inventory Application</h1>
    </div>

    <div class="nav-container">
        <ul class="nav-item">
            <li><a href="home.php">Home</a></li>
            <li><a href="list-inventory.php">Inventory List</a></li>
            <li>
                <div class="dropdown">
                    <a href="">List Per Category</a>
                    <div class="dropdown-content">
                        <a href="list-inventory.php?tag=building">Building</a>
                        <a href="list-inventory.php?tag=vehicles">Vehicles</a>
                        <a href="list-inventory.php?tag=office">Office Inventory</a>
                        <a href="list-inventory.php?tag=electronic">Electronic</a>
                    </div>
                </div>
            </li>
        </ul>

        <?php
      if(empty($_SESSION['username'])){
        echo "<a href='login.php'><button class='sign-in'>login</button></a>";
      }else{
        echo "<a href='logout.php'><button class='sign-in'>Logout</button></a>";
      }
    ?>
    </div>

    <div class="content-container">
        <div class="head-content">
            Clear Inventory Data
        </div>
        <div class="row justify-content-center">
            <div class="col-6" >
                <p>Are you sure you want to remove <?php echo $name?>?</p>
                <div class="center">
                    <a href="delete.php?id=<?php echo $id ?>"><button class="btn-input" style="margin-right: 10px;">Delete</button></a>
                    <a href="list-inventory.php"><button class="btn-input">Cancel</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Inventory Web 2021</p>
    </div>
</body>
</body>
</html>