<?php

global $conn;
require '../db-config.php';

$sql = "select * from `city` ";
$cities = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <title>Perditeso Aeroport</title>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main class="admin-panel">
    <h1>Perditeso Aeroportin</h1>


    <div class="admin-container">
        <form method="post" class="field-left" action="../back-end/update.php">
            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM airport as a INNER JOIN city as c on a.city = c.city_id WHERE airport_id='$id'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
            ?>

            <input type="hidden" value="<?php echo $row["airport_id"]; ?>" name="airport_id">
            <input type="text" id="label" name="label" class="form-input" placeholder="Emri" value="<?php echo $row["label"]?>">
            <input type="url" id="website" name="website" class="form-input" placeholder="Link-u Web" value="<?php echo $row["website"]?>">
            <input type="tel" id="phone" name="phone" class="form-input" placeholder="Numer Telefoni" value="<?php echo $row["tel"]?>">
            <input type="text" id="city" list="cities" name="city" class="form-input" placeholder="Qyteti" value="<?php echo $row["city_name"]?>">
            <datalist id="cities">
                <?php
                while ($row = mysqli_fetch_array($cities, MYSQLI_ASSOC)) {
                    echo "<option value='$row[city_name]'/>";
                }
                ?>
            </datalist>

            <button type="submit" class="login-button" name="updateAirport" id="add-airport-button"
                    style="margin-top: 40px">
                <span>Perditeso</span>
            </button>
                    <?php
                }
            ?>
        </form>

        <div class="image-right">

            <img src="../images/add-airport.PNG" alt="">
        </div>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>