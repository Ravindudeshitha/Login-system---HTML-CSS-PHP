<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>

    <link rel="stylesheet" href="style/style.css">
</head>
<body>

    <?php
        include ('php/connection.php');

        if(isset($_POST['product_add'])){
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            
            $query = "INSERT INTO product(name, price, discount) VALUES('$product_name', '$price', '$discount')";

            $result = mysqli_query($con, $query);

            if($result){
                header("location: home.php");
            }
            else{
                echo "connection error";
                mysqli_connect_error();
            }
        }

    ?>

    <div class="container">
        <div class="log_box">
            <h1>Add New Product</h1>

            <form action="" method="post">
                <div class="field">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name">
                </div>

                <div class="field">
                    <label for="price">Price</label>
                    <input type="text" name="price">
                </div>

                <div class="field">
                    <label for="discount">Discount</label>
                    <input type="text" name="discount">
                </div>

                <div class="">
                    <input class="btn" name="product_add" type="submit" value="Add">
                </div>
            </form>

        </div>
    </div>
    
</body>
</html>