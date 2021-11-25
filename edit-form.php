<?php
    session_start();
    if(empty($_SESSION['username']) && !isset($_GET['id'])){
        header("location:home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>123200047 - Edit</title>

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
        echo "<a href='login.php'><button class='sign-in'>Sign In</button></a>";
      }else{
        echo "<a href='logout.php'><button class='sign-in'>Logout</button></a>";
      }
    ?>
    </div>

    <?php
         $id = $_GET['id'];

         include 'db/connect.php';
         $sql = "SELECT * FROM inventory WHERE item_id = '$id';";
         $query = $connection->query($sql);
         if($query){
             $data = $query->fetch_object();
 
             $itemId = $data->item_id;
             $itemName = $data->item_name;
             $amount = $data->amount;
             $unit = $data->unit;
             $coming = $data->arrival_date;
             $category = $data->category;
             $itemStatus = $data->item_status;
             $price = $data->price;
 
         }else{
             header("location:list-inventory.php?edit=error");
         }
    ?>
    <div class="content-container">
        <div class="head-content">
            Add Inventory Data
        </div>
        <form action="check-edit.php?id=<?php echo $id ?>" method="post">
            <div class="row">
                <div class="col-3">
                    <label>Item Code</label>
                </div>

                <div class="col-9">
                    <input style="width:98%;" type="text" name="item_code" placeholder="Item code" value="<?php echo $itemId?>">
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label>Name of goods</label>
                </div>

                <div class="col-9">
                    <input style="width:98%;" type="text" name="name" placeholder="Name of goods" value="<?php echo $itemName?>">
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label >Amount</label>
                </div>
                    
                <div class="col-9">
                    <input type="text" name="amount" placeholder="Amount" value="<?php echo $amount?>">
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label >Unit</label>
                </div>

                <div class="col-9">
                    <input type="text" name="unit" placeholder="Unit" value="<?php echo $unit?>">
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label >Cooming Date</label>
                </div>

                <div class="col-9">
                    <input style="width:50%;" type="date" name="coming_date" value="<?php echo $coming?>">  
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label >Category</label>
                </div>
                
                <div class="col-9">
                <select name="category" style="width:50%;">
                    <option 
                        <?php
                        if($category=="Building"){
                            echo "selected";
                        }
                        ?> 
                        value="Building">Building
                    </option>

                    <option 
                        <?php
                        if($category=="Vehicles"){
                            echo "selected";
                        }
                        ?>
                        value="Vehicles">Vehicles
                    </option>

                    <option 
                        <?php
                        if($category=="Office Inventory"){
                            echo "selected";
                        }
                        ?>
                        value="Office Inventory">Office Inventory
                    </option>

                    <option <?php
                        if($category=="Electronic"){
                            echo "selected";
                        }
                        ?>
                        value="Electronic">Electronic
                    </option>
                </select>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label >Status</label>
                </div>

                <div class="col-9">
                <input 
                    type="radio" id="well" name="status" value="Well"
                    
                    <?php 
                        if($itemStatus=="Well"){
                            echo "checked";
                        }
                    ?>

                    ><label for="well">Well</label>

		        <input 
                    type="radio" id="maintenance" name="status" value="Maintenance"
                    
                    <?php 
                        if($itemStatus=="Maintenance"){
                            echo "checked";
                        }
                    ?>
                    
                    ><label for="maintenance">Maintenante</label>

                <input 
                    type="radio" id="damaged" name="status" value="Damaged"
                    
                    <?php 
                        if($itemStatus=="Damaged"){
                            echo "checked";
                        }
                    ?>

                    ><label for="damaged">Damaged</label>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label>Unit price</label>
                </div>

                <div class="col-9">
                    <input style="width:98%;" type="text" name="price" placeholder="Unit Price" value="<?php echo $price?>">
                </div>
            </div>
            
            <div class="row" style="text-align:center;">
            <?php
            if(isset($_GET['message'])){
                if($_GET['message']=="invalid"){
                    echo "<p>Item code arelady used!</p>";
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