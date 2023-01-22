<?php
session_start();
global $conn;
include '../db-config.php';

global $loggedUser;

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
    <br>
    <div class="reg-container-main">
        <div class="table-title">
            <h1>Aeroporte</h1>
            <button onclick="location.href = 'add-airport.php'">Shto Aeroport</button>
        </div>
        <table class="styled-table">
            <thead>
            <tr>
                <th>Emri Aerportit</th>
                <th>Link-u i Web</th>
                <th>Numer Telefoni</th>
                <th>Qyteti</th>
                <th colspan="2">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT a.airport_id, a.label, a.website, a.tel, c.city_name FROM airport as a INNER JOIN city c on a.city = c.city_id;";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                die("Invalid query!");
            }
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo "
                      <tr>
                        <td>$row[label]</td>
                        <td>$row[website]</td>
                        <td>$row[tel]</td>
                        <td>$row[city_name]</td>
                        <td>
                           <a style='margin: 0 5px; color: darkgreen' href='editAirport.php?id=$row[airport_id]'>Perditeso</a>
                        </td>
                        <td>
                            <a style='color: red' href='../back-end/deleteAirport.php?id=$row[airport_id]'>Fshi</a>
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

