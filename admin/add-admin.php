<?php
session_start();
global $conn;
include '../db-config.php';

if (isset($_SESSION["user_id"])) {
    $useroo = $_SESSION["user_id"];
    $sql = "SELECT * FROM `Users` WHERE `user_id` = '$useroo';";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
}
if(!isset($_SESSION["user_id"])){
    header("location: ../front-end/landing-page.php");
    die();
}
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <title>Shto Admin</title>
    <script src="../scripts/components.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../scripts/scripts.js"></script>

    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        span {
            opacity: 75%;
        }
        select {
            background-color: white;
        }
    </style>
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main>
    <div class="reg-container">
        <div>
            <h1>Administrator i ri</h1>
        </div>
        <form class="sign-up-form" method="post" action="../back-end/insert_admin.php" onsubmit="return validate()">
            <div class="form-field column">
                <label for="first_name"><i class="fas fa-id-card"></i><span
                            style="display: none">Emri</span></label>
                <input id="first_name" type="text" name="first_name" class="form-input" placeholder="Emri" onkeyup="validateFirstname()">
                <span id="first_name-error">
                     <i title="Emri NUK duhet te permbaje me shume se 15 karaktere&#10;Emri NUK duhet te permbaje Numra&#10;Emri NUK duhet te permbaje karaktere speciale"
                        style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="surname"><i class="fas fa-signature"></i><span style="display: none">Mbiemri</span></label>
                <input id="surname" type="text" name="surname" class="form-input" placeholder="Mbiemri" onkeyup="validateSurname()">
                <span id="surname-error">
                    <i title="Mbiemri NUK duhet te permbaje me shume se 20 karaktere&#10;Mbiemri NUK duhet te permbaje Numra&#10;Mbiemri NUK duhet te permbaje karaktere speciale"
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="email"><i class="fas fa-paper-plane"></i><span style="display: none">Email</span></label>
                <input id="email" type="email" name="email" class="form-input" placeholder="Email" onkeyup="validateEmail()">
                <span id="email-error">
                    <i title="Email NUK duhet te permbaje me pak se 15 karaktere&#10;Email NUK duhet te permbaje me shume se 40 karaktere&#10;Email NUK duhet te nise me karakter Special"
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="telephone"><i class="fa-solid fa-phone-volume"></i><span style="display: none">Numri i telefonit</span></label>
                <input id="telephone" name="telephone" type="text" class="form-input" placeholder="Numri i telefonit" onkeyup="validatePhone()">
                <span id="phone-error">
                    <i title="Numri i telefonit nuk duhet te jete bosh"
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="birthday"><i class="fas fa-calendar"></i><span style="display: none">Ditelindja</span></label>
                <input id="birthday" type="date" name="birthday" class="form-input" placeholder="Ditelindja" onchange="validateBirthday()">
                <span id="birthday-error">
                     <i title="Ditelindja"
                        style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="address"><i class="fa-regular fa-location-dot"></i><span style="display: none">Adresa</span></label>
                <input id="address" name="address" type="text" class="form-input" placeholder="Adresa juaj" onkeyup="validateAddress()">
                <span id="address-error">
                    <i title=""
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="password"><i class="fas fa-lock"></i><span style="display: none">Password</span></label>
                <input id="password" type="password" name="password" class="form-input" placeholder="Password" onkeyup="validatePassword()">
                <span id="password-error">
                    <i title="Password NUK duhet te jete bosh&#10;Password NUK duhet te permbaje me pak se 8 karaktere&#10;Password NUK duhet te permbaje me shume se 20 karaktere&#10;Password DUHET te permbaje te pakten 1 Karakter Special&#10;Password DUHET te permbaje te pakten 1 Numer&#10;Password DUHET te permbaje te pakten 1 shkronje te madhe&#10;Password DUHET te permbaje te pakten 1 shkronje te vogel"
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="password"><i class="fas fa-lock"></i><span style="display: none">Password</span></label>
                <input id="cfr-password" type="password" name="cfr-password" class="form-input" placeholder="Konfirmo Password-in" onkeyup="validateConfirmPassword()">
                <span id="confirm-password-error">
                    <i title="Konfirmo password-in e dhene me lart"
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <button type="submit" class="login-button" name="submit">
                <span>Regjistro</span>
            </button>
        </form>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
<script src="../scripts/validation-client-side.js"></script>
</body>
</html>
