<?php

global $conn;
require '../db-config.php';

$sqlAirports = "select * from `airport` ";
$sqlCompanies = "select * from `flight_company`";
$airports = mysqli_query($conn, $sqlAirports);
$companies = mysqli_query($conn, $sqlCompanies);

if (isset($_POST["add-flight"])) {
    $departure = mysqli_real_escape_string($conn, $_POST["departure"]);
    $airplane = mysqli_real_escape_string($conn, $_POST["airplane"]);
    $seats = mysqli_real_escape_string($conn, $_POST["seats"]);
    $airport = mysqli_real_escape_string($conn, $_POST["airport"]);
    $company = mysqli_real_escape_string($conn, $_POST["company"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $insert = "INSERT INTO `flight` (flight_description, departure, airplane, seats_total, seats_left, arrival_airport, company) 
                VALUES ('$description', '$departure', '$airplane', '$seats', '$seats', '$airport', '$company')";

    if (mysqli_query($conn, $insert)) {
        header("Location: flight-manage.php");
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
    <h1>Perditeso Fluturimin</h1>


    <div class="admin-container">
        <form method="post" class="field-left" action="../back-end/update.php">
            <?php
            if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM flight WHERE flight_id='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $seats = $row["seats_total"];
            ?>
            <input type="hidden" value="<?php echo $row["flight_id"]; ?>" name="flight_id">
            <input type="date" id="departure" name="departure" class="form-input" placeholder="Departure"
                   value="<?php echo $row["departure"]; ?>">
            <input type="text" id="airplane" name="airplane" class="form-input" placeholder="Avioni"
                   value="<?php echo $row["airplane"]; ?>">
            <input type="number" id="seats" name="seats" class="form-input" placeholder="Vende Total"
                   value="<?php echo $row["seats_total"]; ?>">
            <input type="hidden" value="<?php echo $row["seats_left"]; ?>" name="seats_left">
            <input type="hidden" value="<?php echo $row["seats_total"]; ?>" name="previous_seats">
            <select name="airport" id="airport" class="form-input">
                <option value="" disabled>Zgjidh Aeroportin</option>
                <?php
                while ($rowAirport = mysqli_fetch_array($airports, MYSQLI_ASSOC)) {
                    if ($rowAirport['airport_id'] == $row['arrival_airport']) {
                        echo "<option value='$rowAirport[airport_id]' selected>$rowAirport[label]</option>";
                    } else {
                        echo "<option value='$rowAirport[airport_id]'>$rowAirport[label]</option>";
                    }
                }
                ?>
            </select>
            <select name="company" id="company" class="form-input">
                <option value="" disabled selected>Zgjidh Kompanine</option>
                <?php
                while ($rowCompany = mysqli_fetch_array($companies, MYSQLI_ASSOC)) {
                    if ($rowCompany['flight_company_id'] == $row['company']) {
                        echo "<option value='$rowCompany[flight_company_id]' selected>$rowCompany[label]</option>";
                    } else {
                        echo "<option value='$rowCompany[flight_company_id]'>$rowCompany[label]</option>";
                    }
                }
                ?>
            </select>

            <input type="text" id="description" name="description" class="form-input" placeholder="Pershrkimi" value="<?php echo $row["flight_description"]; ?>">


            <button type="submit" class="login-button" name="updateFlight" id="add-airport-button"
                    style="margin-top: 40px">
                <span>Perditeso</span>
            </button>
                <?php
                 }
            ?>
        </form>

        <div class="image-right">

            <img src="../images/add-flight.PNG" alt="">
        </div>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>