<?php

global $conn;
include "../db-config.php";

global $pass_error;
global $email_error;

session_start();
if (isset($_SESSION["user"])) {
    header("Location: landing-page.php");
}
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM TestU WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user_id"] = $user["id"];
            if($user['role']==='admin'){
                header("Location: admin-landing-page.php");
            }else{
                header("Location: landing-page.php");
                die();
            }
        } else {
            $pass_error = "Invalid password";
        }
    } else {
        $email_error = "Invalid email";
    }
}
?>
<!DOCTYPE html>
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
<?php include "../components/navbar.php" ?>
<main>
    <div class="reg-container-login">
        <div>
            <h1 style="margin-top: 30px">Login</h1>
        </div>
        <form class="sign-up-form" method="post" style="margin-top: 50px">
            <div class="form-field column" >
                <label for="email"><i class="fas fa-user"></i><span style="display: none">Email</span></label>
                <input id="email" name="email" type="text" class="form-input" placeholder="Email">
            </div>
            <div><?php echo "<p style='color: red'>$email_error</p>" ?></div>
            <div class="form-field column" style="margin-top: 40px" >
                <label for="password"><i class="fas fa-lock"></i><span style="display: none">Password</span></label>
                <input id="password" type="password" name="password" class="form-input" placeholder="Password">
            </div>
           <div><?php echo "<p style='color: red'>$pass_error</p>" ?></div>
            <button type="submit" class="login-button" name="login" id="login" style="margin-top: 40px">
                <span>Login</span>
            </button>
        </form>
        <div class="login-link" style="margin-top: 45px">
            <p>Not registered yet? <a href="sign-up.php">Sign up</a></p>
        </div>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>
