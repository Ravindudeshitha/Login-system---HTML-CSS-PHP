<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="style/style.css">


</head>
<body>

    <?php

        include ('php/connection.php');

        if(isset($_POST['sign_up'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
        
            if($password ==  $confirm or $_POST['username'] == null or $_POST['confirm'] == null){
            
                $query = "SELECT user_name FROM login WHERE user_name = '$username'";
    
                $result1 = mysqli_query($con, $query);
    
                if(mysqli_num_rows($result1) != 0){
                    echo "<div class='container'>
                            <div class='log_box'>
                                <div class='field'>
                                <label>This email is used, Try another One Please!</label>
                             <br>";
                    echo "<a href='register.php'><button class='btn'>Go Back</button>";

                    echo "</div></div></div>";
                        
                }
                else{
                    $query2 = "INSERT INTO login(user_name, password) VALUES('$username', '$password')";
    
                    $result2 = mysqli_query($con, $query2) or die("Error");


                    echo "<div class='container'>
                            <div class='log_box'>
                                <div class='field'>
                                <label>Registration Successfull!</label>
                             <br>";
                    echo "<a href='index.php'><button class='btn'>Log In</button>";

                    echo "</div></div></div>";
    
                }
            }
            else{
                echo "<div class='container'>
                            <div class='log_box'>
                                <div class='field'>
                                <label>Password Does Not Exist.!</label>
                             <br>";
                    echo "<a href='register.php'><button class='btn'>Go Back</button>";

                    echo "</div></div></div>";
            }
        
        }

        else{

        
    ?>

    <div class="container">
        <div class="log_box">
            <h1>Sign Up</h1>

            <form action="" method="post">

                <div class="field">
                    <label for="username">User Name:</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">
                    <label for="confirm">Confirm</label>
                    <input type="password" name="confirm" id="confirm" required>
                </div>

                <div class="">
                    <input class="btn" type="submit" name="sign_up" value="Sign Up" >
                </div>
            </form>
        </div>
    </div>


    <?php

        }
    ?>
    
</body>
</html>