<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Krijoni llogarine tuaj</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
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
<?php include "../components/navbar.php" ?>
<main>
    <div class="reg-container">
        <div>
            <h1>Krijoni llogarine tuaj</h1>
        </div>
        <form class="sign-up-form" method="post" action="../back-end/insert_user.php" onsubmit="return validate()">
            <div class="form-field column">
                <label for="first_name"><i class="fas fa-id-card"></i><span
                            style="display: none">Emri</span></label>
                <input id="first_name" type="text" name="first_name" class="form-input" placeholder="Emri" onkeyup="validateFirstname()">
                <span id="first_name-error">
                     <i title="First name MUST not contain more than 20 characters&#10;First name MUST not contain Numbers&#10;First name MUST not contain Special Characters"
                        style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="surname"><i class="fas fa-signature"></i><span style="display: none">Mbiemri</span></label>
                <input id="surname" type="text" name="surname" class="form-input" placeholder="Mbiemri" onkeyup="validateSurname()">
                <span id="surname-error">
                    <i title="Surname MUST not contain more than 20 characters&#10;Surname MUST not contain Numbers&#10;Surname MUST not contain Special Characters"
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="email"><i class="fas fa-paper-plane"></i><span style="display: none">Email</span></label>
                <input id="email" type="email" name="email" class="form-input" placeholder="Email" onkeyup="validateEmail()">
                <span id="email-error">
                    <i title="Email MUST not contain less than 10 characters&#10;Email MUST not contain Numbers&#10;Surname MUST not contain Special Characters"
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="telephone"><i class="fa-solid fa-phone-volume"></i><span style="display: none">Numri i telefonit</span></label>
                <input id="telephone" name="telephone" type="text" class="form-input" placeholder="Numri i telefonit" onkeyup="validatePhone()">
                <span id="phone-error">
                    <i title="Phone Number MUST not be empty"
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="birthday"><i class="fas fa-calendar"></i><span style="display: none">Ditelindja</span></label>
                <input id="birthday" type="date" name="birthday" class="form-input" placeholder="Ditelindja" onchange="validateBirthday()">
                <span id="birthday-error">
                     <i title="Date of Birth"
                        style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="address"><i class="fa-regular fa-location-dot"></i><span style="display: none">Adresa</span></label>
                <input id="address" name="address" type="text" class="form-input" placeholder="Adresa juaj" onkeyup="validateAddress()">
                <span id="address-error">
                    <i title="Address MUST not be empty"
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="password"><i class="fas fa-lock"></i><span style="display: none">Password</span></label>
                <input id="password" type="password" name="password" class="form-input" placeholder="Password" onkeyup="validatePassword()">
                <span id="password-error">
                    <i title="Password MUST not contain less than 8 characters&#10;Password MUST not contain more than 20 characters&#10;Password MUST contain at least 1 Number&#10;Password MUST contain at least 1 Special Character&#10;Password MUST contain at least 1 UPPER CASE letter&#10;Password MUST contain at least 1 LOWER CASE letter"
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
                <span>Regjistrohu</span>
            </button>
        </form>
        <div class="login-link">
            <p>Keni nje llogari? <a href="login.php">Login</a></p>
        </div>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
<script src="../scripts/validation-client-side.js"></script>
</body>
</html>
