<?php

global $conn;
include "../db-config.php";

if(isset($_POST['submit'])){

    $nm = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $surname  = mysqli_real_escape_string($conn, $_POST["surname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $tel = mysqli_real_escape_string($conn, $_POST["telephone"]);
    $birthday = mysqli_real_escape_string($conn, $_POST["birthday"]);
    $re = "user";                                                   //--->>> make sure the first time you run the application
                                                                    // $re must be set to admin
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $pas = mysqli_real_escape_string($conn, $_POST["password"]);
    $passw = password_hash($pas,PASSWORD_BCRYPT);

    $sql2 = "SELECT * FROM `Users` where email='$email';";
    $result = mysqli_query($conn,$sql2);
    $row_count = mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Email already used'); window.location = '../front-end/sign-up.php';</script>";
        exit();
    }

    $sql1 = "INSERT INTO `Users` (first_name, surname, email, telephone, birthday, role, address, password) 
             VALUES ('$nm','$surname', '$email', '$tel', '$birthday', '$re', '$address', '$passw');";

    if(mysqli_query($conn, $sql1)){
        echo "<script>alert('New User created'); window.location = '../front-end/login.php';</script>";
        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
}
