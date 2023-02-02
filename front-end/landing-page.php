<?php
session_start();
global $conn;
include '../db-config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tirana International Airport-Welcome</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        a {color: white;}
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
<?php include "../components/navbar.php" ?>
<main>
    <div class="reg-container-main">
        <section id="fluturime-nisje">
        <div class="table-title" style="margin-top: 20px">
            <h1 style="font-size: 35px">Fluturime</h1>
            <div id="search-box">
                <input style="width: 55%" type="text" id="my-search" placeholder="Search..." class="searchQueryInput">
                <span style="margin-top: 4%; margin-left: 15%;font-size:130%"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
        </div>
        <table class="styled-table" style="margin-bottom: 50px; margin-top: 50px">
            <thead>
            <tr>
                <th>Kompania</th>
                <th>Lloji</th>
                <th>Orari</th>
                <th>Avioni</th>
                <th>Nisja</th>
                <th>Destinacioni</th>
                <th>Vende te mbetura</th>
                <?php
                    if(isset($_SESSION["user_id"])){
                        echo "<th>Cmimi i biletës</th>";
                    }
                ?>
                <th>ACTIONS</th>
            </tr>
            </thead>
            <tbody id="fluturime">
            <?php
            $sql1 = "SELECT fc.logo, f.type, f.flight_id, f.departure, f.airplane, f.seats_left, f.ticket_price, a.label as Departure, a2.label as Arrival, c1.city_name as City_Arrival, c2.city_name as City_Depart
                    FROM flight f INNER JOIN flight_company fc on f.company = fc.flight_company_id
                    INNER JOIN airport a on f.arrival_airport = a.airport_id           
                    INNER JOIN airport a2 on f.departure_airport = a2.airport_id
                    INNER JOIN city c1 on a.city = c1.city_id
                    INNER JOIN city c2 on a2.city = c2.city_id
                    ORDER BY f.departure ASC";
            $result1 = mysqli_query($conn, $sql1);
            if(!$result1){
                die("Invalid query!");
            }
            while($row1=mysqli_fetch_array($result1, MYSQLI_ASSOC)){
                echo "
                      <tr>
                        <td><img src='../images/companies/$row1[logo]' style='height: 40px; border-radius: 50%'></td>
                        <td>$row1[type]</td>
                        <td>$row1[departure]</td>
                        <td>$row1[airplane]</td>
                        <td>$row1[Arrival]</td>
                        <td>$row1[Departure]</td>
                        <td>$row1[seats_left]</td>
                        <td style='display: none'>$row1[City_Arrival]</td>
                        <td style='display: none'>$row1[City_Depart]</td>";
                if(isset($_SESSION["user_id"])){
                       echo "<td>$row1[ticket_price]€</td>";
                }
                echo "<td style='margin: 0 5px;'>
                        <a style='color: darkgreen' href='book-ticket.php?id=$row1[flight_id]'>Rezervo biletë</a>
                      </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        </section>
        <hr style="width:1100px; margin: auto;">
        <section id="check-in" style="margin-bottom: 50px">
        <div class="table-title" style="margin-top: 0px">
            <h1>Checking-in</h1>
        </div>
        <div class="main-paragraph">
            <p>Përshpejtoni check-in duke pasur në dorë pasaportën/kartën e identitetit, dokumentet e udhëtimit dhe detajet e konfirmimit të fluturimit.</p>
        </div>
        <div class="table-title" style="margin-top: 0px">
            <h4>Online check-in</h4>
        </div>
        <div class="main-paragraph">
            <p>Shumica e linjave ajrore ju lejojnë të regjistroheni në internet, të zgjidhni vendin dhe të printoni kartën tuaj të imbarkimit rreth 24 orë para fluturimit. Vizitoni faqen tuaj të internetit të linjës ajrore për më shumë informacion.
            Nëse e keni printuar kartën tuaj të imbarkimit dhe nuk po kontrolloni në një çantë, mund të shkoni direkt te siguria kur të arrini në aeroport.</p>
        </div>
        <div class="table-title" style="margin-top: 0">
            <h4>Check-in me vetë-shërbim</h4>
        </div>
        <div class="main-paragraph">
            <p>Kurseni kohë duke përdorur një nga makineritë e kontrollit të vetë-shërbimit. Zgjidhni vendin tuaj, printoni kartën tuaj të imbarkimit dhe më pas hidhni çantat.
                Nëse keni nevojë për ndihmë, stafi i linjës ajrore do të jetë i lumtur t'ju ndihmojë.</p>
        </div>
        <div class="table-title">
            <h4>Pikat e Check-in</h4>
        </div>
        <div class="main-paragraph">
            <p>Zonat e dedikuara për regjistrimin dhe lëshimin e bagazheve të linjës suaj ajrore do të vendosen në ekranet e sipërme te "Nisjet".
                Pasi të keni kontrolluar dhe lëshuar çdo bagazh, është koha t'i drejtoheni sigurisë.</p>
        </div>
        </section>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>

