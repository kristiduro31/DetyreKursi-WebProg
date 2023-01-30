<?php
session_start();
global $conn;
include '../db-config.php';

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
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <title>Shto Fluturim</title>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main class="admin-panel">
    <h1>Hapesire e Re</h1>


    <div class="admin-container">
        <form method="post" class="field-left">
            <input type="date" id="departure" name="departure" class="form-input" placeholder="Departure">
            <input type="text" id="airplane" name="airplane" class="form-input" placeholder="Avioni">
            <input type="number" id="seats" name="seats" class="form-input" placeholder="Vende Total">
            <select name="airport" id="airport" class="form-input">
                <option value="" disabled selected>Zgjidh Aeroportin</option>
                <?php
                while ($row = mysqli_fetch_array($airports, MYSQLI_ASSOC)) {
                    echo "<option value='$row[airport_id]'>$row[label]</option>";
                }
                ?>
            </select>
            <select name="company" id="company" class="form-input">
                <option value="" disabled selected>Zgjidh Kompanine</option>
                <?php
                while ($row = mysqli_fetch_array($companies, MYSQLI_ASSOC)) {
                    echo "<option value='$row[flight_company_id]'>$row[label]</option>";
                }
                ?>
            </select>

            <input type="text" id="description" name="description" class="form-input" placeholder="Pershrkimi">


            <button type="submit" class="login-button" name="add-flight" id="add-airport-button"
                    style="margin-top: 40px">
                <span>Krijo Fluturim</span>
            </button>
        </form>

        <div class="image-right">

            <img src="../images/add-space.PNG" alt="">
        </div>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>