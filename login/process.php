<?php

//Get values passes from form in login.php file
$username = $_POST['user'];
$password = $_POST['pass'];
//connect to the server and select database
$con = mysqli_connect("localhost", "root", "","login");

//to prevent mysql injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password);



//Query the database for user
$result = mysqli_query($con,"SELECT * FROM users WHERE username = '$username' AND password = '$password'")
    or die("Failed to query database " . mysqli_error($con));
    $row = mysqli_fetch_array($result);
    if($row['username'] == $username && $row['password'] == $password){
        echo "Login success!!! Welcome " . $row['username'];
    }else{
       echo "Failed To Login!";
        
    }