<?php
session_start();
global $conn;
include '../db-config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bare & Restorante</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="space-main" onload="realtimeClock(),getRouting()">
<?php include "../components/navbar.php" ?>
<main>
    <div class="space">
        <h1>Bar & Restorante</h1>
        <div class="reg-container-main">
            <?php
            $sql = "SELECT * FROM airport_space WHERE space_type='Bare/Restorante'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "
                <div class='row'>
                <div class='img-column'>
                    <img class='rest-img' src='../images/airport-spaces/$row[logo]' alt='Image could not be loaded'>
                </div>
                <div class='column'>
                    <h3>$row[label]</h3>
                    <p>$row[space_description]</p>
                </div>

                <div class='contact-column'>
                    <h3>Kontakt</h3>
                    <p>Faqja e internetit:
                        <a href='$row[web]'>$row[web]</a>
                        <h4><a href='tel:$row[tel]'>$row[tel]</a></h4>
                        <i>Email: </i>
                        <a href='mailto:$row[email]'>$row[email]</a></p>
                </div>
            </div>
            ";
            }
            ?>

            <!--            <div class="row">-->
            <!--                <div class="img-column">-->
            <!--                    <img class="rest-img" src="../images/restaurant/3.png" alt="Image could not be loaded">-->
            <!--                </div>-->
            <!--                <div class="column">-->
            <!--                    <h3>Pershkrimi</h3>-->
            <!--                    <p>Aeroporti Nënë Tereza, është vendodhja më e re e KFC në Shqipëri. Restoranti ofron shërbim 24 orë-->
            <!--                        me një menu të pasuruar për ti ardhur në shërbim gjithë udhëtarëve dhe banorëve të zonës.-->
            <!--                        Me një hapsirë të dedikuar për gjithë grupmoshat, KFC Rinas ofron një eksperiencë të shkëlqyer-->
            <!--                        për gjithë adhuruesit e produkteve të saj me cilësi dhe cmim konkurues.</p>-->
            <!--                </div>-->
            <!---->
            <!--                <div class="contact-column">-->
            <!--                    <h3>Kontakt</h3>-->
            <!--                    <p>Faqja e internetit:-->
            <!--                        <a href="marketing@kfc.com.al">marketing@kfc.com.al</a><br>-->
            <!--                        <i>Telefoni: </i><a href="+355 69 50 55 555">+355 69 50 55 555</a><br-->
            <!--                        <i>Email: </i>-->
            <!--                        <a href="hr@kfc.com.al">ihr@kfc.com.al</a></p>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="row">-->
            <!--                <div class="img-column">-->
            <!--                    <img class="rest-img" src="../images/restaurant/2.png" alt="Image could not be loaded">-->
            <!--                </div>-->
            <!--                <div class="column">-->
            <!--                    <h3>Pershkrimi</h3>-->
            <!--                    <p>Mbi re, me kafe dhe çdo produkt tjetër të zgjedhur në pikën Mulliri në aeroportin e Rinasit. Ju-->
            <!--                        mirëpresim! ✈️</p>-->
            <!--                </div>-->
            <!---->
            <!--                <div class="contact-column">-->
            <!--                    <h3>Kontakt</h3>-->
            <!--                    <p>Faqja e internetit:-->
            <!--                        <a href="https://mullirivjeter.al/">mullirivjeter.al/</a><br>-->
            <!--                        <i>Telefoni: </i><a href="+355 42 407 923">+355 42 407 923</a><br-->
            <!--                        <i>Email: </i>-->
            <!--                        <a href="info@mullirivjeter.com">info@mullirivjeter.com</a></p>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </div>
</main>
<?php include "../components/footer-bar.php" ?>
</body>
</html>