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
    <title>123200047 - List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css-inventory.css">
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
                        <a href="list-inventory.php?tag=Office Inventory">Office Inventory</a>
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
        <div class="row">
            <div class="col-2">
                <a href="add-form.php"><button class="btn-add">+ Add</button></a>
            </div>
        </div>
        <div class="row">
            <table>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Name of goods</th>
                    <th>Amount</th>
                    <th>Unit</th>
                    <th>Coming Date</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>

        <?php
            include 'db/connect.php';
            $totalPrice=0;
            $no=0;

            if(isset($_GET['tag'])){
                $tag = $_GET['tag'];
                $sql = "SELECT * FROM inventory WHERE category='$tag'";
            }else{
                $sql = "SELECT * FROM inventory";
            }

            $query = $connection->query($sql);
            
            while($data = $query->fetch_object()){
                $itemId = $data->item_id;
                $itemName = $data->item_name;
                $amount = $data->amount;
                $unit = $data->unit;
                $coming = $data->arrival_date;
                $category = $data->category;
                $itemStatus = $data->item_status;

                $price = $data->price;
                $total=$price*$amount;

                $totalPrice+=$total;

                $formattedPrice = number_format($price, 2);
                $formattedTotal = number_format($total, 2);
        ?>
                <!-- php -->
                <tr>
                    <td><?php echo ++$no ?></td>
                    <td><?php echo $itemId ?></td>
                    <td><?php echo $itemName ?></td>
                    <td><?php echo $amount ?></td>
                    <td><?php echo $unit ?></td>
                    <td><?php echo $coming ?></td>
                    <td><?php echo $category ?></td>
                    <td><?php echo $itemStatus ?></td>
                    <td><?php echo "Rp $formattedPrice" ?></td>
                    <td><?php echo "Rp $formattedTotal" ?></td>
                    <td>
                        <a href="edit-form.php?id=<?php echo $itemId ?>"><button class="btn-form">Edit</button></a>
                        <a href="delete-confirm.php?id=<?php echo $itemId ?>"><button class="btn-form">Delete</button></a>
                    </td>
                </tr>
            <?php
            }

            $formattedTotalPrice = number_format($totalPrice, 2);
            ?>



                <!-- php -->
            </table>
        </div>

        <div class="row">
            <p>Total Inventory = Rp. <?php echo $formattedTotalPrice ?></p>
        </div>
    
    </div>

    <div class="footer">
        <p>Inventory Web 2021</p>
    </div>
</body>
</html>