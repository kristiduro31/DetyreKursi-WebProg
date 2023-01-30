<?php

global $conn;
include "../db-config.php";

if(!isset($_GET['bookingID'])){
    echo "<script>
            alert('Gabim ne percaktimin e biletes qe doni te fshini!')
            window.history.back();
          </script>";
}else {
    $bookingID=$_GET['bookingID'];
    $sqlGetFlightID="SELECT b.tickets, f.flight_id, f.seats_left
                     FROM Booking as b INNER JOIN Flight as f ON b.flight=f.flight_id
                     WHERE booking_id='$bookingID'";
    $result = mysqli_query($conn, $sqlGetFlightID);
    $bookingData = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $sqlDeleteBooking="DELETE FROM `Booking` WHERE `booking_id`='$bookingID';";
    mysqli_query($conn, $sqlDeleteBooking);

    $updateSeatsLeftSql = "UPDATE Flight SET seats_left='$bookingData[seats_left]'+'$bookingData[tickets]' 
                           WHERE flight_id='$bookingData[flight_id]' AND seats_total>='$bookingData[seats_left]'+'$bookingData[tickets]';";
    mysqli_query($conn, $updateSeatsLeftSql);
    echo "<script>
            alert('Rezervimi Juaj u FSHI me sukses!');
            window.location.href = '../front-end/user-bookings.php';
         </script>";
    die();
}
