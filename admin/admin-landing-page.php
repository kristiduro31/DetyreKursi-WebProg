<?php
session_start();
global $conn;
include '../db-config.php';

global $loggedUser;
if (isset($_SESSION["user_id"])) {
    $useroo = $_SESSION["user_id"];
    $sql = "SELECT * FROM `Users` WHERE `user_id` = '$useroo';";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $loggedUser = $user["first_name"];
}
if(!isset($_SESSION["user_id"])){
    header("location: ../front-end/landing-page.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tirana Internation Airport-Admin Panel</title>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main class="landing-container">
    <h1>Pershendetje <?php echo $loggedUser ?>!</h1>
    <div class="admin-panel">
        <a href="airports.php">
            <div class="admin-option">
                <img src="../images/add-airport.PNG" alt="">
                <h2>Aeroporte</h2>
            </div>
        </a>
        <a href="flight-manage.php">
            <div class="admin-option">
                <img src="../images/add-flight.PNG" alt="">
                <h2>Fluturime</h2>
            </div>
        </a>
        <a href="">
            <div class="admin-option">
                <img src="../images/add-space.PNG" alt="">
                <h2>Hapesira Aeroporti</h2>
            </div>
        </a>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>