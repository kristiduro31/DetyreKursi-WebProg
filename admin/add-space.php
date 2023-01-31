<?php
session_start();
global $conn;
include '../db-config.php';

if (isset($_POST["add-space"])) {
    $label = mysqli_real_escape_string($conn, $_POST["label"]);
    $tel = mysqli_real_escape_string($conn, $_POST["tel"]);
    $web = mysqli_real_escape_string($conn, $_POST["web"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $logo = $_FILES["logo"]["name"];
    $space_type = mysqli_real_escape_string($conn, $_POST["space-type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $insert = "INSERT INTO Airport_Space (label, space_type, logo, space_description, tel, email, web) 
                        VALUES ('$label', '$space_type', '$logo', '$description', '$tel', '$email', '$web')";
    if (mysqli_query($conn, $insert)) {
        move_uploaded_file($_FILES["logo"]["tmp_name"], "../images/airport-spaces/" . $_FILES["logo"]["name"]);
        header("Location: space-manage.php");
        exit();
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
    <title>Shto Hapesire</title>
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
        <form method="post" class="field-left" enctype="multipart/form-data">
            <div class="profile">
                <img src="../images/airline-logo-default.png" id="img-profile">
            </div>
            <label for="logo" id="label-logo" title="Logo duhet te jete te pakten 120x120"><i class="fa-solid fa-plus"
                                                                                              style="margin-top: 0;margin-bottom: 10px "></i>
                Vendosni logo-n tuaj</label>

            <input type="text" id="label" name="label" class="form-input" placeholder="Emri">
            <input type="tel" id="tel" name="tel" class="form-input" placeholder="Numer Telefoni">
            <input type="text" id="web" name="web" class="form-input" placeholder="Faqe Webi">
            <input type="email" id="email" name="email" class="form-input" placeholder="Email   ">
            <input type="file" id="logo" name="logo" style="display: none" onchange="loadFile()">
            <select name="space-type" id="space-type" class="form-input">
                <option value="" disabled selected>Zgjidh Llojin e Hapsires</option>
                <option value="Hotel">Hotel</option>
                <option value="Makina me qera">Makina me qera</option>
                <option value="Bare/Restorante">Bar/Restorant</option>
                <option value="Transport">Transport</option>
                <option value="Dyqan">Dyqan</option>
            </select>
            <input type="text" id="description" name="description" class="form-input" placeholder="Pershkrimi">

            <button type="submit" class="login-button" name="add-space" id="add-space-button"
                    style="margin-top: 40px">
                <span>Krijo Hapsire</span>
            </button>
        </form>

        <div class="image-right">
            <img src="../images/add-space.PNG" alt="">
        </div>
    </div>
</main>
<script src="../scripts/scripts.js"></script>
<?php include "../components/footer-bar.php" ?>
</body>
</html>