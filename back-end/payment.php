<?php
session_start();
global $conn;
include '../db-config.php';

if (!isset($_SESSION["user_id"])) {
    header("location: ../front-end/login.php");
}

if (isset($_POST['makeBooking'])) {
    if (isset($_GET['id'])) {
        $user_id = $_SESSION["user_id"];
        $flightId = $_GET['id'];
        $ticket_number = mysqli_real_escape_string($conn, $_POST["ticket_number"]);
        $holder = mysqli_real_escape_string($conn, $_POST["holder"]);
        $card_no = mysqli_real_escape_string($conn, $_POST["number"]);
        $exp = mysqli_real_escape_string($conn, $_POST["exp-date"]);
        $cvc = mysqli_real_escape_string($conn, $_POST["cvc"]);
        $ticket_price = mysqli_real_escape_string($conn, $_POST["price"]);

        $card_sql = "SELECT * FROM bank WHERE card_number='$card_no'";
        $result = mysqli_query($conn, $card_sql);

        if (mysqli_num_rows($result) == 0) {
            echo "<script>alert('Numri i kartes eshte i pasakte'); window.history.go(-1);</script>";
            exit();
        }

        $card = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($card["holder"] != $holder) {
            echo "<script>alert('Ju nuk jeni mbajtesi i kesaj karte!'); window.history.go(-1);</script>";
            exit();
        }
        if ($card["expiration_date"] != $exp) {
            echo "<script>alert('Afati vlefshmerise i pasakte!'); window.history.go(-1);</script>";
            exit();
        }

        if ($card["cvc"] != $cvc) {
            echo "<script>alert('Numer sigurie i pasakte!'); window.history.go(-1);</script>";
            exit();
        }

        $date_exp = explode("/", $exp);

        $today = date('y-m-d H:i:s');
        $currentMonth = date('m', strtotime($today));
        $currentYear = date('y', strtotime($today));

        $valid_until_booking = date('y-m-d', strtotime('+1 week'));

        if ($date_exp[1] < $currentYear || $date_exp[1] == $currentYear && $date_exp[0] < $currentMonth) {
            echo "<script>alert('Karta juaj ka kaluar afatin e vlefshmerise!'); window.history.go(-1);</script>";
            exit();
        }

        $total = $ticket_price*$ticket_number;
        $makePaymentSql = "INSERT INTO booking 
                            (booking_date, total_price, discount, tickets, paid, payment_form, valid_until, buyer, flight) 
                            VALUES ('$today', '$total', '0', '$ticket_number', true, 'Credit Card', '$valid_until_booking' ,'$user_id', '$flightId')";

        if (mysqli_query($conn, $makePaymentSql)) {
            $updateSeatsLeftSql = "UPDATE Flight SET flight.seats_left=seats_left-'$ticket_number' WHERE flight_id='$flightId' AND seats_left>0";
            if (mysqli_query($conn, $updateSeatsLeftSql)){
                echo "<script>alert('Rezervimi u krye me sukses!'); window.location = '../front-end/landing-page.php';</script>";
            }
        } else {
            echo "<script>alert('Pati nje problem, ju lutem provoni perseri me vone!'); window.location = '../front-end/landing-page.php';</script>";

        }
    }
}



