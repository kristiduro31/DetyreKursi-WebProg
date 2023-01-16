<?php

global $conn;
include "../db-config.php";

if(isset($_POST['submit'])){

    $username = $_POST["username"];
    $nm = $_POST["first_name"];
    $surname  = $_POST["surname"];
    $email = $_POST["email"];
    $birthday = $_POST["birthday"];
    $re = $_POST["role"];
    $pas = $_POST["password"];
    $passw = password_hash($pas,PASSWORD_BCRYPT);

    $sql2 = "SELECT * FROM TestU where email='$email';";
    $result = mysqli_query($conn,$sql2);
    $row_count = mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Email already used'); window.location = '../front-end/sign-up.html';</script>";
        exit();
    }

    $sql1 = "INSERT INTO TestU (username, first_name, surname, email, birthday, role, password)
             VALUES ('$username', '$nm','$surname', '$email', '$birthday', '$re','$passw')";

    if(mysqli_query($conn, $sql1)){
        echo "<script>alert('New User created'); window.location = '../front-end/sign-up.html';</script>";
        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
}
