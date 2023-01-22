<?php

global $conn;
include "../db-config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from airport where airport_id='$id';";
    mysqli_query($conn, $sql);
    echo "<script>alert('Aeroporti u fshi!')</script>";
}
header('location: ../admin/airports-manage.php');
exit;
