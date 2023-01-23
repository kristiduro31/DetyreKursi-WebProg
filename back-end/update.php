<?php

global $conn;
include "../db-config.php";

if(isset($_POST["updateAdmin"])){
    $id = mysqli_real_escape_string($conn, $_POST["user_id"]);
    $nm = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $surname  = mysqli_real_escape_string($conn, $_POST["surname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $tel = mysqli_real_escape_string($conn, $_POST["telephone"]);
    $birthday = mysqli_real_escape_string($conn, $_POST["birthday"]);
    $re = mysqli_real_escape_string($conn, $_POST["role"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password"]);
    $passw = password_hash($pass,PASSWORD_BCRYPT);

    $sqlUpdate = "UPDATE `Users` SET first_name='$nm', surname='$surname', email='$email', telephone='$tel', 
                  birthday='$birthday', `role`='$re', address='$address', `password`= '$passw' WHERE user_id='$id'";
    if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>alert('Account updated'); window.location = '../admin/admin-manage.php';</script>";
        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
}

if(isset($_POST["updateProfile"])){
    $id = mysqli_real_escape_string($conn, $_POST["user_id"]);
    $nm = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $surname  = mysqli_real_escape_string($conn, $_POST["surname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $tel = mysqli_real_escape_string($conn, $_POST["telephone"]);
    $birthday = mysqli_real_escape_string($conn, $_POST["birthday"]);
    $re = mysqli_real_escape_string($conn, $_POST["role"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password"]);
    $passw = password_hash($pass,PASSWORD_BCRYPT);

    $sqlUpdate = "UPDATE `Users` SET first_name='$nm', surname='$surname', email='$email', telephone='$tel', 
                  birthday='$birthday', `role`='$re', address='$address', `password`= '$passw' WHERE user_id='$id'";
    if(mysqli_query($conn, $sqlUpdate)){
        if($re==="admin"){
            echo "<script>alert('Account updated'); window.location = '../admin/admin-landing-page.php';</script>";
            exit();
        }else {
            echo "<script>alert('Account updated'); window.location = '../front-end/landing-page.php';</script>";
            exit();
        }
    } else{
        echo "Something went wrong. Please try again later.";
    }
}

if(isset($_POST["updateAirport"])){
    $sql = "select * from `city` ";
    $cities = mysqli_query($conn, $sql);

    $id = mysqli_real_escape_string($conn, $_POST["airport_id"]);
    $label = mysqli_real_escape_string($conn, $_POST["label"]);
    $web = mysqli_real_escape_string($conn, $_POST["website"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $city = mysqli_real_escape_string($conn, $_POST['city']);

    $cityId = 0;
    while ($row = mysqli_fetch_array($cities, MYSQLI_ASSOC)) {
        if ($row['city_name'] == $city) {
            $cityId = $row['city_id'];
            break;
        }
    }

    $insert = "UPDATE airport SET label='$label', website='$web',tel='$phone', city='$cityId'  WHERE airport_id='$id'";

    if (mysqli_query($conn, $insert)) {
        header("Location: ../admin/airports.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
}

if(isset($_POST["updateCompany"])){
    $flight_comp_id = mysqli_real_escape_string($conn, $_POST["flight_company_id"]);
    $label = mysqli_real_escape_string($conn, $_POST["label"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $addr = mysqli_real_escape_string($conn, $_POST['address']);
    $descr = mysqli_real_escape_string($conn, $_POST["description"]);
    $logo = $_FILES["logo"]["name"];

    $sql = "SELECT `logo` FROM `flight_company` WHERE flight_company_id='$flight_comp_id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    if($logo==""){
        $logo=$row['logo'];
    }

    $insert = "UPDATE `flight_company` SET `logo`='$logo', `label`='$label',`company_description`='$descr',`telephone`='$phone',`address`='$addr',`email_company`='$email' WHERE flight_company_id='$flight_comp_id'";

    if (mysqli_query($conn, $insert)) {
        move_uploaded_file($_FILES["logo"]["tmp_name"], "../images/companies/".$_FILES["logo"]["name"]);
        header("Location: ../admin/flight-company-manage.php");
        exit();
    } else {
        echo "Something went wrong. Please try again later.";
    }
}

if(isset($_POST["updateFlight"])){
    $flight = mysqli_real_escape_string($conn, $_POST["flight_id"]);
    $departure = mysqli_real_escape_string($conn, $_POST["departure"]);
    $airplane = mysqli_real_escape_string($conn, $_POST["airplane"]);
    $seats = mysqli_real_escape_string($conn, $_POST["seats"]);
    $airport = mysqli_real_escape_string($conn, $_POST["airport"]);
    $company = mysqli_real_escape_string($conn, $_POST["company"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $seatsLeft = mysqli_real_escape_string($conn, $_POST["seats_left"]);

    $previousSeats = mysqli_real_escape_string($conn, $_POST["previous_seats"]);
    $occupiedSeats = $previousSeats - $seatsLeft;
    $seatsLeft = $seats - $occupiedSeats;

    $update = "UPDATE flight SET departure='$departure', airplane='$airplane', seats_total='$seats', seats_left=$seatsLeft,
                  arrival_airport='$airport', company='$company', flight_description='$description'";

    if (mysqli_query($conn, $update)) {
        header("Location: ../admin/flight-manage.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
}
