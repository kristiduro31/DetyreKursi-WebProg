<?php

global $conn;
include "db-config.php";

if(isset($_POST['submit'])){

    $username = $_POST["username"];
    $name = $_POST["first_name"];
    $surname  = $_POST["surname"];
    $email = $_POST["email"];
    $birthday = $_POST["birthday"];
    $role = $_POST["role"];
    $password = $_POST['password'];

    $sql = "INSERT INTO Users (username, first_name, surname, email, birthday, role, password)
             VALUES ('$username', '$name','$surname', '$email', '$birthday', '$role','$password')";

    if(mysqli_query($conn, $sql)){
        header("location: login.php"); // te ben redirect per tek login.php
        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
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
<body onload="realtimeClock()">
<app-navbar></app-navbar>
<main>
    <div class="reg-container">
        <div>
            <h1>Sign Up</h1>
        </div>
        <form class="sign-up-form" method="post" action="sign-up.php" onsubmit="return validate()">
            <div class="form-field column">
                <label for="username"><i class="fas fa-user"></i><span style="display: none">Username</span></label>
                <input id="username" type="text" class="form-input" placeholder="Username" onkeyup="validateUsername()">
                <span id="username-error">
                    <i title="Username MUST not contain less than 10 characters&#10;Username MUST not contain more than 25 characters&#10;Username MUST not contain Numbers&#10;Username MUST not contain Special Characters"
                       style='color: gray;font-size:100%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="first_name"><i class="fas fa-id-card"></i><span
                            style="display: none">First Name</span></label>
                <input id="first_name" type="text" name="first_name" class="form-input" placeholder="First Name" onkeyup="validateFirstname()">
                <span id="first_name-error">
                     <i title="First name MUST not contain more than 20 characters&#10;First name MUST not contain Numbers&#10;First name MUST not contain Special Characters"
                        style='color: gray;font-size:100%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="surname"><i class="fas fa-signature"></i><span style="display: none">Surname</span></label>
                <input id="surname" type="text" name="surname" class="form-input" placeholder="Surname" onkeyup="validateSurname()">
                <span id="surname-error">
                    <i title="Surname MUST not contain more than 20 characters&#10;Surname MUST not contain Numbers&#10;Surname MUST not contain Special Characters"
                       style='color: gray;font-size:100%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="email"><i class="fas fa-paper-plane"></i><span style="display: none">Email</span></label>
                <input id="email" type="email" name="email" class="form-input" placeholder="Email" onkeyup="validateEmail()">
                <span id="email-error">
                    <i title="Email MUST not contain less than 10 characters&#10;Email MUST not contain Numbers&#10;Surname MUST not contain Special Characters"
                       style='color: gray;font-size:100%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="birthday"><i class="fas fa-calendar"></i><span style="display: none">Birthday</span></label>
                <input id="birthday" type="date" name="birthday" class="form-input" placeholder="Birthday" onkeyup="validateBirthday()">
                <span id="birthday-error">
                     <i title="Date of Birth"
                        style='color: gray;font-size:100%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="role"><i class="fas fa-users"></i><span style="display: none">Role</span></label>
                <select id="role" name="role" class="form-input" onchange="validateRole()">
                    <option disabled selected hidden value="">Select your role</option>
                    <option value="admin">Administrator</option>
                    <option value="agency-admin">Agency Administrator</option>
                    <option value="business-owner">Business Owner</option>
                    <option value="client">Client</option>
                </select>
                <span id="role-error">
                    <i title="Role for the new User"
                       style='color: gray;font-size:100%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="password"><i class="fas fa-lock"></i><span style="display: none">Password</span></label>
                <input id="password" type="password" name="password" class="form-input" placeholder="Password" onkeyup="validatePassword()">
                <span id="password-error">
                    <i title="Password MUST not contain less than 8 characters&#10;Password MUST not contain more than 20 characters&#10;Password MUST contain at least 1 Number&#10;Password MUST contain at least 1 Special Character&#10;Password MUST contain at least 1 UPPER CASE letter&#10;Password MUST contain at least 1 LOWER CASE letter"
                       style='color: gray;font-size:100%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <div class="form-field column">
                <label for="password"><i class="fas fa-lock"></i><span style="display: none">Password</span></label>
                <input id="cfr-password" type="password" name="cfr-password" class="form-input" placeholder="Confirm Password" onkeyup="validateConfirmPassword()">
                <span id="confirm-password-error">
                    <i title="Confirm inputed password"
                       style='color: gray;font-size:100%;' class="fas fa-circle-info"></i>
                </span>
            </div>
            <button type="submit" class="login-button">
                <span>Register</span>
            </button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</main>
<app-footer></app-footer>
<script src="../scripts/validation-client-side.js"></script>
</body>
</html>
