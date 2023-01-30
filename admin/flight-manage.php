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
    <title>Fluturime</title>
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
                $("#fluturime tr").filter(function (){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
                });
            });
        });
    </script>
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main>
    <h1 style="margin-left: 12.5%">Fluturime</h1>
    <br>
    <div class="reg-container-main">
        <div class="table-title">
            <div id="search-box">
                <input style="width: 55%" type="text" id="my-search" placeholder="Search..." class="searchQueryInput">
                <span style="margin-top: 4%; margin-left: 15%;font-size:130%"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
            <div class="button-flights">
                <button onclick="location.href = 'add-departure.php'"style="width: 120px; margin-right: 0px"><i class="fa-solid fa-plus" style="color: white"></i> Fluturim Nisje</button>
                <button onclick="location.href = 'add-arrival.php'" style="width: 120px"><i class="fa-solid fa-plus" style="color: white"></i> Fluturim Mbërritje</button>
            </div>
        </div>
        <table class="styled-table">
            <thead>
            <tr>
                <th>Kompania</th>
                <th>Lloji</th>
                <th>Orari</th>
                <th>Avioni</th>
                <th>Nisja</th>
                <th>Destinacioni</th>
                <th>Vende te mbetura</th>
                <th>Cmimi i biletes</th>
                <th colspan="3">ACTIONS</th>
            </tr>
            </thead>
            <tbody id="fluturime">
            <?php
            $sql = "SELECT fc.logo, f.type, f.flight_id, f.departure, f.airplane, f.seats_left, f.ticket_price, a.label as Departure, a2.label as Arrival, c1.city_name as City_Arrival, c2.city_name as City_Depart
                    FROM flight f INNER JOIN flight_company fc on f.company = fc.flight_company_id
                    INNER JOIN airport a on f.arrival_airport = a.airport_id           
                    INNER JOIN airport a2 on f.departure_airport = a2.airport_id
                    INNER JOIN city c1 on a.city = c1.city_id
                    INNER JOIN city c2 on a2.city = c2.city_id
                    ORDER BY f.departure DESC";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                die("Invalid query!");
            }
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo "
                      <tr>
                        <td><img src='../images/companies/$row[logo]' style='height: 40px; border-radius: 50%'></td>
                        <td>$row[type]</td>
                        <td>$row[departure]</td>
                        <td>$row[airplane]</td>
                        <td>$row[Arrival]</td>
                        <td>$row[Departure]</td>
                        <td>$row[seats_left]</td>
                        <td>$row[ticket_price]€</td>
                        <td style='display: none'>$row[City_Arrival]</td>
                        <td style='display: none'>$row[City_Depart]</td>
                        <td>
                            <a style='color: coral' href='flight-bookings.php?flight_id=$row[flight_id]'><i class='fa-solid fa-ticket' title='Shiko Rezervimet'></i></a>
                        </td>
                        <td>
                           <a style='color: darkgreen' href='editFlight.php?id=$row[flight_id]'><i class='fa-solid fa-pen-to-square' title='Perditeso fluturim'></i></a>
                        </td>
                        <td>
                            <a style='color: red' href='../back-end/deleteFlight.php?id=$row[flight_id]'><i class='fa-solid fa-trash' title='Fshi fluturim'></i></a>
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

