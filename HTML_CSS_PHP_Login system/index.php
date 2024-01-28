<?php

    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="style/style.css">
    
</head>
<body>

    <?php

        include("php/connection.php");

        if(isset($_POST['submit'])){
            $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $log_query = "SELECT * FROM login WHERE user_name = '$user_name' AND password = '$password' ";
            $result = mysqli_query($con, $log_query);

            $row = mysqli_fetch_assoc($result);

            if(is_array($row) && !empty($row)){
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['password'] = $row['password'];
            }

            if(isset($_SESSION['user_name'] )){
                header("location: home.php");
            }
        }

        
    ?>
    
    <div class="container">
        <div class="log_box">
            <h1>Login</h1>
            <form action="" method="post">
    
                <div class="field">
                    <label for="user_name">User Name</label>
                    <input type="text" name="user_name" id="user_name">
                </div>
    
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
    
                <div class="">
                    <input class="btn" type="submit" name="submit" value="Login">
                </div>

                <div class="msg">
                    <p>Dont have an account <a href="register.php">Sign UP!</a></p>
                </div>

                
            </form>
    
        </div>
    </div>
    
</body>
</html>