<?php

global $conn;
include "../db-config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from `Users` where `user_id`='$id';";
    mysqli_query($conn, $sql);
    echo "<script>alert('Admin deleted successfully !')</script>";
}
header('location: ../admin/admin-manage.php');
exit;
