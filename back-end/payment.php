<?php
session_start();
global $conn;
include '../db-config.php';

if (!isset($_SESSION["user_id"])) {
    header("location: ../front-end/login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tirana International Airport-Welcome</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        a {
            color: white;
        }
    </style>
</head>
<body onload="realtimeClock(),getRouting()">
<main>
    <div class="admin-container">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sqlFlight = "SELECT * FROM `flight` WHERE flight_id='$id'";
            $result = mysqli_query($conn, $sqlFlight);
            $flight = mysqli_fetch_array($result);


            ?>

            <?php
        }
        ?>
    </div>
</main>
</body>
</html>

