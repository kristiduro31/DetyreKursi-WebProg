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
        .table-title button {
            margin-right: 0px;
            margin-left: 0px
        }
    </style>
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main>
    <br>
    <div class="reg-container-main">
        <div class="table-title">
            <h1>Fluturime</h1>
            <button onclick="location.href = 'add-departure.php'"><i class="fa-solid fa-plus" style="color: white"></i> Krijo Nisje</button>
            <button onclick="location.href = 'add-arrival.php'"><i class="fa-solid fa-plus" style="color: white"></i> Krijo Mberritje</button>
        </div>
        <table class="styled-table">
            <thead>
            <tr>
                <th>Kompania</th>
                <th>Ora-Nisja</th>
                <th>Avioni</th>
                <th>Nisja</th>
                <th>Destinacioni</th>
                <th>Vende te mbetura</th>
                <th>Cmimi biletes</th>
                <th colspan="2">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT fc.logo, f.flight_id, f.departure, f.airplane, f.seats_left,f.ticket_price, a.label AS Arrival, a2.label AS Departure
                    FROM flight f INNER JOIN airport a on f.arrival_airport = a.airport_id
                    INNER JOIN airport a2 on f.departure_airport = a2.airport_id
                    INNER JOIN flight_company fc on f.company = fc.flight_company_id";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                die("Invalid query!");
            }
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo "
                      <tr>
                        <td><img src='../images/companies/$row[logo]' style='height: 40px'></td>
                        <td>$row[departure]</td>
                        <td>$row[airplane]</td>
                        <td>$row[Departure]</td>
                        <td>$row[Arrival]</td>
                        <td>$row[ticket_price]</td>
                        <td>$row[seats_left]</td>
                        <td>
                           <a style='margin: 0 5px; color: darkgreen' href='editFlight.php?id=$row[flight_id]'>Perditeso</a>
                        </td>
                        <td>
                            <a style='color: red' href='../back-end/deleteFlight.php?id=$row[flight_id]'>Fshi</a>
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

