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
    <style>
        a {
            color: white;
        }
    </style>
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main>
    <h1 style="text-align: center">Hello <?php echo $loggedUser?>! Here you can find all Users of the application.</h1>
    <br>
    <div class="reg-container-main">
        <table class="styled-table">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "select * from `Users` WHERE `role`='user'";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                die("Invalid query!");
            }
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo "
                      <tr>
                        <td>$row[first_name]</td>
                        <td>$row[surname]</td>
                        <td>$row[email]</td>
                        <td>$row[telephone]</td>
                        <td>$row[address]</td>
                        <td>
                            <a style='color: red' href='../back-end/deleteUser.php?id=$row[user_id]'>Delete</a>
                        </td>
                      </tr>
                     ";
            }
            ?>
            </tbody>
        </table>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>