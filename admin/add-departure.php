<?php
session_start();
global $conn;
include '../db-config.php';

$sqlAirports = "select * from `airport` ";
$sqlCompanies = "select * from `flight_company`";
$airports = mysqli_query($conn, $sqlAirports);
$companies = mysqli_query($conn, $sqlCompanies);

if (isset($_POST["add-departure"])) {
    $departure = mysqli_real_escape_string($conn, $_POST["departure"]);
    $airplane = mysqli_real_escape_string($conn, $_POST["airplane"]);
    $seats = mysqli_real_escape_string($conn, $_POST["seats"]);
    $airport_arrival = mysqli_real_escape_string($conn, $_POST["arrival_airport"]);
    $airport_dep = mysqli_real_escape_string($conn, $_POST["dept_airport"]);
    $company = mysqli_real_escape_string($conn, $_POST["company"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $price = mysqli_real_escape_string($conn, $_POST["ticket_price"]);
    $type=mysqli_real_escape_string($conn, $_POST["type"]);

    $insert = "INSERT INTO `flight` (flight_description, departure, airplane, seats_total, seats_left, arrival_airport, company, departure_airport, type, ticket_price) 
                VALUES ('$description', '$departure', '$airplane', '$seats', '$seats', '$airport_arrival', '$company', '$airport_dep', '$type', '$price')";

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
    <h1>Nisje e Re</h1>

    <div class="admin-container">
        <form method="post" class="field-left">
            <input type="datetime-local" id="departure" name="departure" class="form-input" placeholder="Departure">
            <input type="text" id="airplane" name="airplane" class="form-input" placeholder="Avioni">
            <input type="number" id="seats" name="seats" class="form-input" placeholder="Vende Total">
            <input type="hidden" id="dept_airport" name="dept_airport" class="form-input" value="31">
            <input type="hidden" id="type" name="type" class="form-input" value="Departure">
            <select name="arrival_airport" id="arrival_airport" class="form-input" style="margin-left: 15px">
                <option value="" disabled selected>Zgjidh Aeroportin</option>
                <?php
                while ($row = mysqli_fetch_array($airports, MYSQLI_ASSOC)) {
                    if($row['airport_id']!=31) {
                        echo "<option value='$row[airport_id]'>$row[label]</option>";
                    }
                }
                ?>
            </select>
            <select name="company" id="company" class="form-input" style="margin-left: 15px">
                <option value="" disabled selected>Zgjidh Kompanine</option>
                <?php
                while ($row = mysqli_fetch_array($companies, MYSQLI_ASSOC)) {
                    echo "<option value='$row[flight_company_id]'>$row[label]</option>";
                }
                ?>
            </select>
            <input type="number" step="0.01" id="ticket_price" name="ticket_price" class="form-input" placeholder="Cmimi i biletes">
            <input type="text" id="description" name="description" class="form-input" placeholder="Pershkrimi">

            <button type="submit" class="login-button" name="add-departure" id="add-airport-button"
                    style="margin-top: 40px">
                <span>Krijo Fluturim Nisjeje</span>
            </button>
        </form>

        <div class="image-right">
            <img src="../images/add-flight.PNG" alt="">
        </div>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>