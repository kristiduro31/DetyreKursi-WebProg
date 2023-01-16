<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "airportDBMS";

$conn = mysqli_connect($servername,$username,$password,$db);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "<h1>Successful connection</h1>>";
