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
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <title>Admin Panel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        a {
            color: white;
        }
        .table-title button{
            width: 150px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#my-search").on("keyup", function (){
                var value = $(this).val().toLowerCase();
                $("#admin tr").filter(function (){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
                });
            });
        });
    </script>
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main>
    <h1 style="margin-left: 12.5%">Administratorët e faqjes</h1>
    <br>
    <div class="reg-container-main">
        <div class="table-title">
            <div id="search-box">
                <input style="width: 55%" type="text" id="my-search" placeholder="Search..." class="searchQueryInput">
                <span style="margin-top: 4%; margin-left: 15%;font-size:130%"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
            <button onclick="location.href = 'add-admin.php'"><i class="fa-solid fa-plus" style="color: white;"></i> Shto Administrator</button>
        </div>

        <table class="styled-table">
            <thead>
            <tr>
                <th>Emër</th>
                <th>Mbiemër</th>
                <th>Email</th>
                <th>Numër Telefoni</th>
                <th>Adresa</th>
                <th colspan="2">ACTIONS</th>
            </tr>
            </thead>
            <tbody id="admin">
            <?php
            $sql = "select * from `Users` WHERE `role`='admin' ORDER BY first_name, surname ASC;";
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
                           <a style='color: darkgreen' href='update-admin.php?id=$row[user_id]'><i class='fa-solid fa-pen-to-square' title='Perditeso Administrator'></i></a>
                        </td>
                        <td>
                            <a style='color: red' href='../back-end/deleteAdmin.php?id=$row[user_id]'><i class='fa-solid fa-trash' title='Fshi administrator'></i></a>
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
