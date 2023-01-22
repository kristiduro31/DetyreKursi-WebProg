<?php

global $conn;
require '../db-config.php';

$sql = "select * from `flight_company` ";

if (isset($_POST["add-flight-company"])) {

    $label = mysqli_real_escape_string($conn, $_POST["label"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $addr = mysqli_real_escape_string($conn, $_POST['address']);
    $descr = mysqli_real_escape_string($conn, $_POST["description"]);
    $logo = $_FILES["logo"]["name"];

    $insert = "INSERT INTO `flight_company` (`label`,`logo`, `company_description`,`telephone`, `address`,`email_company`) 
                VALUES ( '$label', '$logo', '$descr', '$phone','$addr','$email')";

    if (mysqli_query($conn, $insert)) {
        move_uploaded_file($_FILES["logo"]["tmp_name"], "../images/companies/".$_FILES["logo"]["name"]);
        header("Location: flight-company-manage.php");
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
    <title>Shto Kompani Fluturimesh</title>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main class="admin-panel">
    <h1>Kompani fluturimesh</h1>

    <div class="admin-container">
        <form method="post" class="field-left" style="margin-top: 1rem" onsubmit="return checkEmail()" enctype="multipart/form-data">
            <div class="profile">
                <label for="logo"><i class="fa-solid fa-plus" style="color: white"></i> Shto logo</label>
            </div>

            <input type="text" id="label" name="label" class="form-input" placeholder="Emertimi">
            <input type="email" id="email" name="email" class="form-input" placeholder="Email">
            <input type="tel" id="phone" name="phone" class="form-input" placeholder="Numer Telefoni">
            <input type="text" id="address" name="address" class="form-input" placeholder="Adrese">
            <input type="text" id="description" name="description" class="form-input" placeholder="Pershkrim">

            <input type="file" id="logo" name="logo" style="display: none">

            <button type="submit" class="login-button" name="add-flight-company" id="add-flight-company-button"
                    style="margin-top: 40px">
                <span>Shto Kompani</span>
            </button>
        </form>

        <div class="image-right">
            <img src="../images/airline.png" alt="">
        </div>
    </div>
</main>
<script>function checkEmail(){
            var em = document.getElementById("email");
            if(em.value.length===0){
                alert("Email NUK duhet te jete bosh");
                return false;
            }else return true;
        }
</script>
<?php include "../components/footer-bar.php" ?>
</body>
</html>