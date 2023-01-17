<?php

global $conn;
include "../db-config.php";

if(isset($_POST['submit'])){

    $nm = $_POST["first_name"];
    $surname  = $_POST["surname"];
    $email = $_POST["email"];
    $tel = $_POST["telephone"];
    $birthday = $_POST["birthday"];
    $re = "admin"; //--> to be turnt to user "default role"
    $address = $_POST["address"];
    $pas = $_POST["password"];
    $passw = password_hash($pas,PASSWORD_BCRYPT);

    $sql2 = "SELECT * FROM TestU where email='$email';";
    $result = mysqli_query($conn,$sql2);
    $row_count = mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Email already used'); window.location = '../front-end/sign-up.php';</script>";
        exit();
    }

    $sql1 = "INSERT INTO TestU (first_name, surname, email, telephone, birthday, role, address, password) 
             VALUES ('$nm','$surname', '$email', '$tel', '$birthday', '$re', '$address', '$passw');";

    if(mysqli_query($conn, $sql1)){
        echo "<script>alert('New User created'); window.location = '../front-end/login.php';</script>";
        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
}
