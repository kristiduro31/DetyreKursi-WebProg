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
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <title>Aeroporte</title>
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
    </style>
    <script>
        $(document).ready(function(){
            $("#my-search").on("keyup", function (){
                var value = $(this).val().toLowerCase();
                $("#aeroporte tr").filter(function (){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
                });
            });
        });
    </script>
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main>
    <h1 style="margin-left: 12.5%">Aeroporte</h1>
    <br>
    <div class="reg-container-main">
        <div class="table-title">
            <div id="search-box">
                <input style="width: 55%" type="text" id="my-search" placeholder="Search..." class="searchQueryInput">
                <span style="margin-top: 4%; margin-left: 15%;font-size:130%"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
            <button onclick="location.href = 'add-airport.php'"><i class="fa-solid fa-plus" style="color: white"></i> Shto Aeroport</button>
        </div>
        <table class="styled-table">
            <thead>
            <tr>
                <th>Emri Aerportit</th>
                <th>Link-u i Web</th>
                <th>Numër Telefoni</th>
                <th>Qyteti</th>
                <th colspan="2">ACTIONS</th>
            </tr>
            </thead>
            <tbody id="aeroporte">
            <?php
            $sql = "SELECT a.airport_id, a.label, a.website, a.tel, c.city_name FROM airport as a INNER JOIN city c on a.city = c.city_id ORDER BY a.label ASC;";
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
                           <a style='margin: 0 5px; color: darkgreen' href='editAirport.php?id=$row[airport_id]'><i class='fa-solid fa-pen-to-square' title='Perditeso Aeroport'></i></a>
                        </td>
                        <td>
                            <a style='color: red' href='../back-end/deleteAirport.php?id=$row[airport_id]'><i class='fa-solid fa-trash' title='Fshi Aeroport'></i></a>
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

