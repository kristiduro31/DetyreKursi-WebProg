<?php
session_start();
global $conn;
include '../db-config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotele dhe Akomodimi</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="user-services-body" onload="realtimeClock(),getRouting()">
<?php include "../components/navbar.php" ?>
<main>

    <div class="space">
        <h1>Hotele dhe Akomodimi</h1>
        <div class="reg-container-main">
            <?php
            $sql = "SELECT * FROM airport_space WHERE space_type='Hotel'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "
                      <div class='row'>
                        <div class='img-column'>
                            <img class='rest-img' src='../images/airport-spaces/$row[logo]'
                                 alt='Image could not be displayed'>
                        </div>
        
                        <div class='column'>
                            <h3 style='font-weight: bolder'>$row[label]</h3>
                            <p>$row[space_description]</p>
                        </div>
                        <div class='contact-column'>
                            <h3>Kontakt</h3>
                            <div class='detail'>
                                <label>Numri i telefonit</label>
                                <h4><a href='tel:$row[tel]'>$row[tel]</a></h4>
                            </div>
                            <div class='detail'>
                                <label>Email</label>
                                <h4>
                                    <a href='mailto:$row[email]'>$row[email]</a>
                                </h4>
                            </div>
                            <div class='detail'>
                                <label>Website</label>
                                <h4><a target=_'blank'
                                       href='$row[web]'>$row[web]</a>
                            </div>
                        </div>
                      </div>
                    ";
            }
            ?>

        </div>
    </div>

</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>