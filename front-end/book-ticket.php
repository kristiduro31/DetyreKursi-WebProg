<?php
if(!isset($_SESSION["user_id"])){
    header("location: ../front-end/login.php");
}