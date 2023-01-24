<?php

global $conn;
require '../db-config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <title>Perditeso Kompanine</title>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main class="admin-panel">
    <h1>Perditeso Kompanine</h1>

    <div class="admin-container">
        <form method="post" class="field-left" action="../back-end/update.php" enctype="multipart/form-data">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM `flight_company` WHERE flight_company_id='$id'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                <div class="profile">
                    <img src="../images/companies/<?php echo $row['logo']?>" id="img-profile">
                </div>
                <label for="logo" id="label-logo" title="Logo duhet te jete te pakten 120x120"><i class="fa-solid fa-plus" style="margin-top: 0;margin-bottom: 10px "></i> Ndrysho logo</label>

                <input type="hidden" value="<?php echo $row["flight_company_id"]; ?>" name="flight_company_id">
                <input type="text" id="label" name="label" class="form-input" placeholder="Emertimi" value="<?php echo $row['label'] ?>">
                <input type="email" id="email" name="email" class="form-input" placeholder="Email" value="<?php echo $row['email_company'] ?>">
                <input type="tel" id="phone" name="phone" class="form-input" placeholder="Numer Telefoni" value="<?php echo $row['telephone'] ?>">
                <input type="text" id="address" name="address" class="form-input" placeholder="Adrese" value="<?php echo $row['address'] ?>">
                <input type="text" id="description" name="description" class="form-input" placeholder="Pershkrim" value="<?php echo $row['company_description'] ?>">

                <input type="file" id="logo" name="logo" style="display: none" onchange="loadFile()">

                <button type="submit" class="login-button" name="updateCompany" id="add-flight-company-button"
                        style="margin-top: 40px">
                    <span>Perditeso</span>
                </button>
                <?php
            }
            ?>
        </form>

        <div class="image-right">
            <img src="../images/airline.png" alt="">
        </div>
    </div>
</main>
<script src="../scripts/scripts.js"></script>
<?php include "../components/footer-bar.php" ?>
</body>
</html>