<?php

global $conn;
require '../db-config.php';

$sql = "select * from city ";
$cities = mysqli_query($conn, $sql);

if (isset($_POST["add-airport"])) {

    $label = mysqli_real_escape_string($conn, $_POST["label"]);
    $web = mysqli_real_escape_string($conn, $_POST["website"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $city = mysqli_real_escape_string($conn, $_POST['city']);

    $cityId = 0;
    while ($row = mysqli_fetch_array($cities, MYSQLI_ASSOC)) {
        if ($row['city_name'] == $city) {
            $cityId = $row['city_id'];
            break;
        }
    }

    $insert = "INSERT INTO airport (label, website, tel, city) 
                VALUES ( '$label', '$web', '$phone', '$cityId')";

    if (mysqli_query($conn, $insert)) {
        header("Location: admin-landing-page.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shto Aeroport</title>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main class="admin-panel">
    <h1>Aeroport I Ri</h1>


    <div class="admin-container">
        <form method="post" class="field-left">
            <input type="text" id="label" name="label" class="form-input" placeholder="Emri">

            <input type="url" id="website" name="website" class="form-input" placeholder="Link-u Web">
            <input type="tel" id="phone" name="phone" class="form-input" placeholder="Numer Telefoni">
            <input type="text" id="city" list="cities" name="city" class="form-input" placeholder="Qyteti">
            <datalist id="cities">
                <?php
                while ($row = mysqli_fetch_array($cities, MYSQLI_ASSOC)) {
                    echo "<option value='$row[city_name]'/>";
                }
                ?>
            </datalist>

            <button type="submit" class="login-button" name="add-airport" id="add-airport-button"
                    style="margin-top: 40px">
                <span>Shto Aeroportin</span>
            </button>
        </form>

        <div class="image-right">

            <img src="../images/add-airport.PNG" alt="">
        </div>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>