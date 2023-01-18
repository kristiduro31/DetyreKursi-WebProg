<?php

global $conn;
include "../db-config.php";


$sql1 = "INSERT INTO `Users` (first_name, surname, email, telephone, birthday, role, address, password) 
             VALUES ('TestName','TestSurname', 'test@gmail.com', '123123', '2002-10-10', 'admin', 'Tirana','password');";

if(mysqli_query($conn, $sql1)){
    echo "<script>alert('New User created'); window.location = '../front-end/login.php';</script>";
    exit();
} else{
    echo "Something went wrong. Please try again later.";
}