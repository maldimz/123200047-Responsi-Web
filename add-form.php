<?php
    session_start();
    if(empty($_SESSION['username'])){
        header("location:home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>123200047 - Add</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css-add.css">
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
        echo "<a href='login.php'><button class='sign-in'>Sign In</button></a>";
      }else{
        echo "<a href='logout.php'><button class='sign-in'>Logout</button></a>";
      }
    ?>
    </div>

    <div class="content-container">
        <div class="head-content">
            Add Inventory Data
        </div>
        <form action="check-add.php" method="post">
            <div class="row">
                <div class="col-3">
                    <label>Item Code</label>
                </div>

                <div class="col-9">
                    <input style="width:98%;" type="text" name="item_code" placeholder="Item code">
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label>Name of goods</label>
                </div>

                <div class="col-9">
                    <input style="width:98%;" type="text" name="name" placeholder="Name of goods">
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label >Amount</label>
                </div>
                    
                <div class="col-9">
                    <input type="number" name="amount" placeholder="Amount" min="0">
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label >Unit</label>
                </div>

                <div class="col-9">
                    <input type="text" name="unit" placeholder="Unit">
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label >Cooming Date</label>
                </div>

                <div class="col-9">
                    <input style="width:50%;" type="date" name="coming_date"> 
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label >Category</label>
                </div>
                
                <div class="col-9">
                    <select name="category" style="width:50%;">
                        <option value="Building">Building</option>
                        <option value="Vehicles">Vehicles</option>
                        <option value="Office stationery">Office stationery</option>
                        <option value="Electronic">Electronic</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label >Status</label>
                </div>

                <div class="col-9">
                <input type="radio" id="well" name="status" value="Well"><label for="well">Well</label>
		        <input type="radio" id="maintenance" name="status" value="Maintenance"><label for="maintenance">Maintenante</label>
                <input type="radio" id="damaged" name="status" value="Damaged"><label for="damaged">Damaged</label>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label>Unit price</label>
                </div>

                <div class="col-9">
                    <input style="width:98%;" type="number" name="price" placeholder="Unit Price" min="0">
                </div>
            </div>
            
            <div class="row" style="text-align:center;">
            <?php
            if(isset($_GET['message'])){
                if($_GET['message']=="invalid"){
                    echo "<p>Item code already used!</p>";
                }else if($_GET['message']=="empty"){
                    echo "<p>Field cannot be empty!</p>";
                }
            }
            ?>
           </div>
            
            <div class="row btn-wrap" style="text-align: center;">
                <input class="btn-form" type="submit" name="submit" value="Save">
                <a class="btn-form" href="home.php">Cancel</a>
            </div>
        </form>
    </div>

    <div class="footer">
        <p>Inventory Web 2021</p>
    </div>
</body>
</html>