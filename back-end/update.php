<?php

global $conn;
include "../db-config.php";

if(isset($_POST["updateAdmin"])){
    $id = mysqli_real_escape_string($conn, $_POST["user_id"]);
    $nm = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $surname  = mysqli_real_escape_string($conn, $_POST["surname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $tel = mysqli_real_escape_string($conn, $_POST["telephone"]);
    $birthday = mysqli_real_escape_string($conn, $_POST["birthday"]);
    $re = mysqli_real_escape_string($conn, $_POST["role"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password"]);
    $passw = password_hash($pass,PASSWORD_BCRYPT);

    $sqlUpdate = "UPDATE `Users` SET first_name='$nm', surname='$surname', email='$email', telephone='$tel', 
                  birthday='$birthday', `role`='$re', address='$address', `password`= '$passw' WHERE user_id='$id'";
    if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>alert('Account updated'); window.location = '../admin/admin-manage.php';</script>";
        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
}

if(isset($_POST["updateProfile"])){
    $id = mysqli_real_escape_string($conn, $_POST["user_id"]);
    $nm = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $surname  = mysqli_real_escape_string($conn, $_POST["surname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $tel = mysqli_real_escape_string($conn, $_POST["telephone"]);
    $birthday = mysqli_real_escape_string($conn, $_POST["birthday"]);
    $re = mysqli_real_escape_string($conn, $_POST["role"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password"]);
    $passw = password_hash($pass,PASSWORD_BCRYPT);

    $sqlUpdate = "UPDATE `Users` SET first_name='$nm', surname='$surname', email='$email', telephone='$tel', 
                  birthday='$birthday', `role`='$re', address='$address', `password`= '$passw' WHERE user_id='$id'";
    if(mysqli_query($conn, $sqlUpdate)){
        if($re==="admin"){
            echo "<script>alert('Account updated'); window.location = '../admin/admin-landing-page.php';</script>";
            exit();
        }else {
            echo "<script>alert('Account updated'); window.location = '../front-end/landing-page.php';</script>";
            exit();
        }
    } else{
        echo "Something went wrong. Please try again later.";
    }
}



