<?php
session_start();
global $conn;
include '../db-config.php';

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
    <title>Sign Up</title>
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
            <h1>Perditeso Admin</h1>
        </div>
        <form class="sign-up-form" method="post" action="../back-end/update.php" onsubmit="return (checkPasswordUpdate() && validateConfirmPassword())">
            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM `Users` WHERE user_id='$id'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
            ?>
                    <input type="hidden" value="<?php echo $row["user_id"]; ?>" name="user_id">
                    <input type="hidden" value="<?php echo $row["role"]; ?>" name="role">
            <div class="form-field column">
                <label for="first_name"><i class="fas fa-id-card"></i><span
                            style="display: none">First Name</span></label>
                <input id="first_name" type="text" name="first_name" class="form-input" value="<?php echo $row["first_name"]?>">
            </div>
            <div class="form-field column">
                <label for="surname"><i class="fas fa-signature"></i><span style="display: none">Surname</span></label>
                <input id="surname" type="text" name="surname" class="form-input" value="<?php echo $row["surname"]?>">
            </div>
            <div class="form-field column">
                <label for="email"><i class="fas fa-paper-plane"></i><span style="display: none">Email</span></label>
                <input id="email" type="email" name="email" class="form-input" value="<?php echo $row["email"]?>">
            </div>
            <div class="form-field column">
                <label for="telephone"><i class="fa-solid fa-phone-volume"></i><span style="display: none">Phone Number</span></label>
                <input id="telephone" name="telephone" type="text" class="form-input" value="<?php echo $row["telephone"]?>">
            </div>
            <div class="form-field column">
                <label for="birthday"><i class="fas fa-calendar"></i><span style="display: none">Birthday</span></label>
                <input id="birthday" type="date" name="birthday" class="form-input" value="<?php echo $row["birthday"]?>">
            </div>
            <div class="form-field column">
                <label for="address"><i class="fa-regular fa-location-dot"></i><span style="display: none">Address</span></label>
                <input id="address" name="address" type="text" class="form-input" value="<?php echo $row["address"]?>">
            </div>
                    <div class="form-field column">
                        <label for="password"><i class="fas fa-lock"></i><span style="display: none">Password</span></label>
                        <input id="password" type="password" name="password" class="form-input" placeholder="Password" onkeyup="checkPasswordUpdate()">
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
            <button type="submit" class="login-button" name="updateAdmin">
                <span>Perditeso</span>
            </button>
            <?php
                }
            ?>
        </form>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
<script src="../scripts/validation-client-side.js"></script>
</body>
</html>
