<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System</title>


    <link rel="stylesheet" href="style/style.css">
    <script src="script/script.js"></script>

</head>
<body>

    <?php
        include ('php/connection.php');

       
    ?>

    


    <header>
        <div class="System_name">
            <h2>Billing System</h2>
        </div>

        <div class="logoutBut">
            <a href="php/action.php"><input type="button" id="logout" name="logout" value="Log Out"></a>

        </div>
    </header>

    <div class="billing_system">
        <div class="billing_system_header">
            <h3>Shoping Cart</h3>
        </div>
        
        <div class="cart_table">

            <table id="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="cart_body">
                    
                    
                </tbody>
                <tr class="total_tr">
                    <td>Total</td>
                    <td id="total">0</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="products">
        <div class="prod_header">
            <h3>Product Details</h3>
            <a href="addProuduct.php">Add New Product</a>
        </div>

        <div class="product_table">
            <table id="prod_table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        $query = "SELECT * FROM product";

                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){

                    ?>

                        <tr>
                            <td><?php echo $row['id'] ?></td>

                            <td id="name"><?php echo $row['name']?></td>

                            <td id="price"><?php echo $row['price'] ?></td>

                            <td id="discount"><?php echo $row['discount'] ?>%</td>

                            <td><button class="action_but" onclick="additem(this)">Add Item</button></td>

                        </tr>
                    
                    <?php
                        }
                    ?>
                
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>