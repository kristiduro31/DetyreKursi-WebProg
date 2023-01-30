<?php

global $conn;
include "../db-config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from `airport_space` where airport_space_id='$id';";
    mysqli_query($conn, $sql);
    echo "<script>alert('Hapsira u fshi!')</script>";
}
header('location: ../admin/space-manage.php');
exit;