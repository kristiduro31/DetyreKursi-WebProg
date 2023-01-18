<?php
session_start();
global $conn;
include '../db-config.php';

global $user;
if (isset($_SESSION["user_id"])) {
    $useroo = $_SESSION["user_id"];
    $sql = "SELECT * FROM `Users` WHERE `user_id` = '$useroo';";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
    <h1 style="text-align: center">Hello <?php echo $user["first_name"]?>! Here you can find all administrators of the application.</h1>
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
                <th colspan="2">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "select * from `Users` WHERE `role`='admin'";
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
                           <a style='margin: 0 5px; color: darkgreen' href='updateAdminsProfile.php?id=$row[user_id]'>Edit</a>
                        </td>
                        <td>
                            <a style='color: red' href='../back-end/deleteAdmin.php?id=$row[user_id]'>Delete</a>
                        </td>
                      </tr>
                     ";
            }
            ?>
            </tbody>
        </table>
        <div>
            <button class="login-button" style="padding: 4px; width: 150px; margin-bottom: 20px; margin-top: 20px">
                <a href="new-admin-signup.php">
                    <i class="fa-solid fa-plus" style="color: white"></i>  <b>ADD NEW ADMIN</b>
                </a>
            </button>
        </div>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>
