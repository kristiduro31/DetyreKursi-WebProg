<?php
session_start();
global $conn;
include '../db-config.php';

global $loggedUser;

if (isset($_SESSION["user_id"])) {
    $useroo = $_SESSION["user_id"];
    $sql = "SELECT * FROM `Users` WHERE `user_id` = '$useroo';";
    $result = mysqli_query($conn, $sql);
    $loggedUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
} else {
    header("location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tirana Internation Airport</title>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        h1, h4 {
            text-align: center;
        }
    </style>
</head>
<body onload="realtimeClock(),getRouting()">
<?php
    if($loggedUser["role"]==="admin"){
        include "../admin/navbar-admin.php";
    }else include "../components/navbar.php";
?>
<main>
    <div class="reg-container">
        <div>
            <h1>View and Edit your account</h1>
        </div>
        <form class="sign-up-form" method="post" action="../back-end/update.php" onsubmit="validate()">
            <input type="hidden" value="<?php echo $loggedUser["user_id"]; ?>" name="user_id">
            <input type="hidden" value="<?php echo $loggedUser["role"]; ?>" name="role">
            <div class="form-field column">
                <label for="first_name"><i class="fas fa-id-card"></i><span
                            style="display: none">First Name</span></label>
                <input id="first_name" type="text" name="first_name" class="form-input" value="<?php echo $loggedUser["first_name"]?>" onkeyup="validateFirstname()">
            </div>
            <div class="form-field column">
                <label for="surname"><i class="fas fa-signature"></i><span style="display: none">Surname</span></label>
                <input id="surname" type="text" name="surname" class="form-input" value="<?php echo $loggedUser["surname"]?>" onkeyup="validateSurname()">
            </div>
            <div class="form-field column">
                <label for="email"><i class="fas fa-paper-plane"></i><span style="display: none">Email</span></label>
                <input id="email" type="email" name="email" class="form-input" value="<?php echo $loggedUser["email"]?>" onkeyup="validateEmail()">
            </div>
            <div class="form-field column">
                <label for="telephone"><i class="fa-solid fa-phone-volume"></i><span style="display: none">Phone Number</span></label>
                <input id="telephone" name="telephone" type="text" class="form-input" value="<?php echo $loggedUser["telephone"]?>" onkeyup="validatePhone()">
            </div>
            <div class="form-field column">
                <label for="birthday"><i class="fas fa-calendar"></i><span style="display: none">Birthday</span></label>
                <input id="birthday" type="date" name="birthday" class="form-input" value="<?php echo $loggedUser["birthday"]?>" onchange="validateBirthday()">
            </div>
            <div class="form-field column">
                <label for="address"><i class="fa-regular fa-location-dot"></i><span style="display: none">Address</span></label>
                <input id="address" name="address" type="text" class="form-input" value="<?php echo $loggedUser["address"]?>" onkeyup="validateAddress()">
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
                <input id="cfr-password" type="password" name="cfr-password" class="form-input" placeholder="Confirm Password" onkeyup="validateConfirmPassword()">
                <span id="confirm-password-error">
                    <i title="Confirm inputted password"
                       style='color: gray;font-size:90%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <button type="submit" class="login-button" name="updateProfile">
                <span>Update</span>
            </button>
        </form>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>