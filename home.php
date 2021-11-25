<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>123200047 - Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css-home.css">
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
        echo "<a href='login.php'><button class='sign-in'>Login</button></a>";
      }else{
        echo "<a href='logout.php'><button class='sign-in'>Logout</button></a>";
      }
    ?>
    </div>

    <div class="content-container">
        <?php
            if(!empty($_SESSION['username'])){
                echo "<h3>Welcome</h3>";
                echo "<h2>".$_SESSION['fullname']."</h2>";
            }else{
                echo "<div class='center'>Must Login First!</div>";
            }
        ?>
    </div>

    <div class="footer">
        <p>Inventory Web 2021</p>
    </div>
</body>
</html>