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
    <title>Rezervimet e fluturimit</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        a {
            color: white;
        }
        .table-title button{
            width: 150px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#my-search").on("keyup", function (){
                var value = $(this).val().toLowerCase();
                $("#admin tr").filter(function (){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
                });
            });
        });
    </script>
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main>
    <div class="reg-container-main">
        <div class="table-title">
            <h1>Rezervimet e fluturimit Nr.<?php echo $_GET["flight_id"] ?></h1>
            <div id="search-box">
                <input style="width: 55%" type="text" id="my-search" placeholder="Search..." class="searchQueryInput">
                <span style="margin-top: 4%; margin-left: 15%;font-size:130%"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
        </div>
        <table class="styled-table">
            <thead>
            <tr>
                <th>Emër</th>
                <th>Email</th>
                <th>Data e rezervimit</th>
                <th>Paguar</th>
                <th>Menyra Pageses</th>
                <th>Numri i biletave</th>
            </tr>
            </thead>
            <tbody id="admin">
            <?php
            $flightId=$_GET["flight_id"];
            $sql = "SELECT b.booking_id, b.booking_date, u.user_id, u.first_name, 
                    u.surname, u.email, b.paid, b.payment_form, b.tickets 
                    FROM `Booking` as b INNER JOIN `Users` u ON b.buyer=u.user_id  
                    WHERE `flight`='$flightId';";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                die("Invalid query!");
            }
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                if($row['paid']==1){
                    $paguar='PO';
                }else $paguar='JO';
                echo "
                      <tr>
                        <td>$row[first_name] $row[surname]</td> 
                        <td>$row[email]</td>
                        <td>$row[booking_date]</td>    
                        <td>$paguar</td>       
                        <td>$row[payment_form]</td>                                              
                        <td>$row[tickets]</td>                                              
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
