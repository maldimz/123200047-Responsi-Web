<?php
    session_start();
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
                        <a href="list-inventory.php?tag=Building">Building</a>
                        <a href="list-inventory.php?tag=Vehicles">Vehicles</a>
                        <a href="list-inventory.php?tag=Office stationery">Office Inventory</a>
                        <a href="list-inventory.php?tag=Electronic">Electronic</a>
                    </div>
                </div>
            </li>
        </ul>

        <?php
      if(empty($_SESSION['username'])){
        echo "<a href='register.php'><button class='sign-in'>Register</button></a>";
      }else{
        echo "<a href='logout.php'><button class='sign-in'>Logout</button></a>";
      }
    ?>
    </div>

    <div class="content-container">
        <div class="head-content">
            LOGIN
        </div>
        
        <form action="check-login.php" method="post">
            
        <div class="row justify-content-center">
            <div class="col-6" >
                <label>Username</label> <br>
                <input class="input-form" type="text" name="user" placeholder="Username">
                <br>
                <label>Password</label> <br>
                <input class="input-form" type="password" name="pass" placeholder="Password">
                <?php
                if(isset($_GET['message'])){
                        echo "<p>Username/password wrong!</p>";  
                }else{
                    echo "<br>";
                }
                ?>
                <div class="center">
                    <button class="btn-input" type="submit" value="login">Login</button>
                </div>
            </div>
        </div>
        </form>
    </div>

    <div class="footer">
        <p>Inventory Web 2021</p>
    </div>
</body>
</body>
</html>