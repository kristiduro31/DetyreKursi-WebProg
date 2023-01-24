<?php

global $conn;
include "../db-config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from `flight` where `flight_id`='$id';";
    mysqli_query($conn, $sql);
    echo "<script>alert('Flight deleted successfully !')</script>";
}
header('location: ../admin/flight-manage.php');
exit;
