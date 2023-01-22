<?php

global $conn;
include "../db-config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from `flight_company` where flight_company_id='$id';";
    mysqli_query($conn, $sql);
    echo "<script>alert('Kompania e fluturimeve u fshi!')</script>";
}
header('location: ../admin/flight-company-manage.php');
exit;