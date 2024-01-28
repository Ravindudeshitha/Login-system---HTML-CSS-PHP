<?php
    $hostname ='localhost';
    $username = 'root';
    $pass = '';
    $database = 'billing';

    $con = mysqli_connect($hostname, $username, $pass, $database);

    if(!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }


?>