<?php
session_start();
global $conn;
include '../db-config.php';

global $userID;
global $searchedUser;
global $loggedUser;

if(!isset($_SESSION["user_id"])){
    header("location: login.php");
    die();
}else {
    $useroo = $_SESSION["user_id"];
    $sql1 = "SELECT * FROM `Users` WHERE `user_id` = '$useroo';";
    $result = mysqli_query($conn, $sql1);
    $loggedUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if(isset($_GET["userID"])){
        $userID=$_GET["userID"];
        $sql2 = "SELECT * FROM `Users` WHERE `user_id` = '$userID';";
        $result = mysqli_query($conn, $sql2);
        $searchedUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        $searchedUser=$loggedUser;
        $userID=$searchedUser['user_id'];
    }
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
<?php
if($loggedUser["role"]==="admin"){
    include "../components/navbar-admin.php";
}else include "../components/navbar.php";
?>
<main>
    <div class="reg-container-main">
        <div class="table-title">
            <h1>Rezervimet e fluturimit te <?php echo $searchedUser['first_name']." ".$searchedUser['surname'] ?></h1>
            <div id="search-box">
                <input style="width: 55%" type="text" id="my-search" placeholder="Search..." class="searchQueryInput">
                <span style="margin-top: 4%; margin-left: 15%;font-size:130%"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
        </div>
        <table class="styled-table">
            <thead>
            <tr>
                <th>Kompania</th>
                <th>Fluturimi</th>
                <th>Data e fluturimit</th>
                <th>Data e rezervimit</th>
                <th>Paguar</th>
                <th>Menyra Pageses</th>
                <th>Numri i biletave</th>
            </tr>
            </thead>
            <tbody id="admin">
            <?php
            $sql = "SELECT deptC.city_name as DeptCity, arrC.city_name as ArrivalCity, fc.logo, b.booking_date, b.paid, b.payment_form, b.tickets, f.departure
                     FROM Booking as b INNER JOIN Flight as f ON b.flight=f.flight_id
                     INNER JOIN Flight_Company as fc ON f.company=fc.flight_company_id
                     INNER JOIN Airport as deptAir ON f.departure_airport=deptAir.airport_id
                     INNER JOIN Airport as arrAir ON f.arrival_airport=arrAir.airport_id
                     INNER JOIN City as deptC ON deptAir.city = deptC.city_id
                     INNER JOIN City as arrC ON arrAir.city = arrC.city_id
                     WHERE b.buyer='$userID';";

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
                        <td><img src='../images/companies/$row[logo]' style='height: 40px; border-radius: 50%'></td>
                        <td>$row[DeptCity]-$row[ArrivalCity]</td>
                        <td>$row[departure]</td>    
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
