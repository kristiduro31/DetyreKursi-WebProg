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

    $sql = "INSERT INTO Users (username, first_name, surname, email, birthday, role, password)
             VALUES ('$username', '$nm','$surname', '$email', '$birthday', '$re','$passw')";

    if(mysqli_query($conn, $sql)){
        // header("location: ../index.php");
        echo "New User record";
        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
}
?>