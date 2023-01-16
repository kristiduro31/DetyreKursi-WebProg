<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

global $conn;
include "../db-config.php";

if(isset($_POST['submit'])){

    $username = $_POST["username"];
    $nm = $_POST["first_name"];
    $surname  = $_POST["surname"];
    $email = $_POST["email"];
    $birthday = $_POST["birthday"];
    $re = $_POST["role"];
    $pas = $_POST["password"];
    $passw = password_hash($pas,PASSWORD_BCRYPT);

    $sql = "INSERT INTO TestU (username, first_name, surname, email, birthday, role, password)
             VALUES ('$username', '$nm','$surname', '$email', '$birthday', '$re','$passw')";

    if(mysqli_query($conn, $sql)){
//        //header("location: ../front-end/sign-up.html");
//        echo "<script>alert('New user added');</script>";
//        //header("location: ../front-end/landing-page.html");
        echo "<script>alert('New User created'); window.location = '../front-end/sign-up.html';</script>";
//        ?>
<!--        <script type="text/javascript">-->
<!--            //alert("review your answer");-->
<!--            window.location.href = "../front-end/sign-up.html";-->
<!--        </script>-->
<!--        --><?php

        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
}
