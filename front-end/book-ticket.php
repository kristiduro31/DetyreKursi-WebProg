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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../scripts/payment.js"></script>
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
<?php include "../components/navbar.php" ?>
<main>
    <div class="admin-container" style="flex-direction: column">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sqlFlight = "SELECT * FROM `flight`
                    INNER JOIN flight_company fc on flight.company = fc.flight_company_id         
                    WHERE flight_id='$id'";
            $result = mysqli_query($conn, $sqlFlight);
            $flight = mysqli_fetch_array($result);

            $sqlDeparture = "SELECT * FROM 
                     airport as a INNER JOIN city as c on a.city = c.city_id 
                     INNER JOIN country c2 on c.country = c2.country_id
                     WHERE airport_id='$flight[arrival_airport]'";
            $result = mysqli_query($conn, $sqlDeparture);
            $departure = mysqli_fetch_array($result);

            $sqlArrival = "SELECT * FROM 
                     airport as a INNER JOIN city as c on a.city = c.city_id 
                     INNER JOIN country c2 on c.country = c2.country_id
                     WHERE airport_id='$flight[departure_airport]'";
            $result = mysqli_query($conn, $sqlArrival);
            $arrival = mysqli_fetch_array($result);

            ?>
            <h2><?php echo 'Fluturim '.$departure['city_name'].' - '.$arrival['city_name']; ?></h2>

           <div style="display: flex; flex-direction: row">
               <div class="payment-container">
                   <form action="../back-end/payment.php">
                       <input type="number" id="ticket_number" class="form-input" placeholder="Numri Biletave" min="1" />
                       <input type="text" id="person" name="person" class="form-input" placeholder="Mbajtesi i Kartes">
                       <input type="text" id="number" maxlength="19" name="number" class="form-input" placeholder="Numri i Kartes">
                       <div style="display: flex; flex-direction: row">
                           <input type="text" id="exp-date" maxlength="5" name="exp-date" class="form-input" placeholder="Skadenca">
                           <input type="text" id="cvc" maxlength="3" name="cvc" class="form-input" placeholder="CVC">
                       </div>
                       <button onclick="" class="login-button" name="makeBooking" >Rezervo!</button>
                   </form>
               </div>

               <div class="price-container">
                   <p>Totali</p>
                   <h1><?php echo $flight['ticket_price']?>&euro;</h1>
               </div>
           </div>


            <?php
        }
        ?>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>

