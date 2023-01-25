<?php
session_start();
global $conn;
include '../db-config.php';

if(!isset($_SESSION["user_id"])){
    header("location: ../front-end/landing-page.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <title>Kompanitë e fluturimeve</title>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        a {
            color: white;
        }
    </style>
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main>
    <div class="reg-container-main">
        <div class="table-title">
            <h1>Kompanitë e fluturimeve</h1>
            <button onclick="location.href = 'add-flight-company.php'" id="add-flight-company-button"><i class="fa-solid fa-plus" style="color: white;"></i> Shto Kompani Fluturimi</button>
        </div>

        <table class="styled-table">
            <thead>
            <tr>
                <th>Logo</th>
                <th>Emertim</th>
                <th>Email</th>
                <th>Numer Telefoni</th>
                <th>Adresa</th>
                <th colspan="2">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "select * from `flight_company` ORDER BY logo ASC;";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                die("Invalid query!");
            }
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo "
                      <tr style='height: 40px'>
                        <td><img src='../images/companies/$row[logo]' style='height: 40px'></td>
                        <td>$row[label]</td>
                        <td>$row[email_company]</td>
                        <td>$row[telephone]</td>
                        <td>$row[address]</td>
                        <td>
                           <a style='margin: 0 5px; color: darkgreen' href='update-flight-company.php?id=$row[flight_company_id]'>Përditëso</a>
                        </td>
                        <td>
                            <a style='color: red' href='../back-end/deleteCompany.php?id=$row[flight_company_id]'>Fshi</a>
                        </td>
                      </tr>
                     ";
            }
            ?>
            </tbody>
        </table>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>
