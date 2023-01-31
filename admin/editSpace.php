<?php
session_start();
global $conn;
include '../db-config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
    <title>Shto Hapsire</title>
    <script src="../scripts/components.js"></script>
    <script src="../scripts/scripts.js"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/1e579789f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="realtimeClock(),getRouting()">
<?php include "../components/navbar-admin.php" ?>
<main class="admin-panel">
    <h1>Perditeso Hapesiren</h1>
    <div class="admin-container">
        <form method="post" class="field-left" enctype="multipart/form-data" action="../back-end/update.php">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM Airport_Space WHERE airport_space_id='$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                ?>
                <div class="profile">
                    <img src="../images/airport-spaces/<?php echo $row['logo'] ?>" id="img-profile">
                </div>
                <label for="logo" id="label-logo" title="Logo duhet te jete te pakten 120x120"><i
                            class="fa-solid fa-plus"
                            style="margin-top: 0;margin-bottom: 10px "></i>
                    Vendosni logo-n tuaj</label>

                <input type="hidden" value="<?php echo $row["airport_space_id"]; ?>" name="airport_space_id">
                <input type="text" id="label" name="label" class="form-input" placeholder="Emri" value="<?php echo $row["label"]; ?>">
                <input type="tel" id="tel" name="tel" class="form-input" placeholder="Numer Telefoni" value="<?php echo $row["tel"]; ?>">
                <input type="text" id="web" name="web" class="form-input" placeholder="Faqe Webi" value="<?php echo $row["web"]; ?>">
                <input type="email" id="email" name="email" class="form-input" placeholder="Email" value="<?php echo $row["email"]; ?>">
                <input type="file" id="logo" name="logo" style="display: none" onchange="loadFile()">
                <select name="space-type" id="space-type" class="form-input">
                    <option value="" disabled <?php if ($row['space_type'] == "") echo 'selected'?>>Zgjidh Llojin e Hapsires</option>
                    <option value="Hotel" <?php if ($row['space_type'] == "Hotel") echo 'selected'?>>Hotel</option>
                    <option value="Makina me qera" <?php if ($row['space_type'] == "Makina me qera") echo 'selected'?>>Makina me qera</option>
                    <option value="Bare/Restorante" <?php if ($row['space_type'] == "Bare/Restorante") echo 'selected'?>>Bar/Restorant</option>
                    <option value="Transport" <?php if ($row['space_type'] == "Transport") echo 'selected'?>>Transport</option>
                    <option value="Dyqan" <?php if ($row['space_type'] == "Dyqan") echo 'selected'?>>Dyqan</option>
                </select>
                <input type="text" id="description" name="description" class="form-input" placeholder="Pershrkimi" value="<?php echo $row["space_description"]; ?>">

                <button type="submit" class="login-button" name="updateSpace" id="update-space-button"
                        style="margin-top: 40px">
                    <span>Perditeso</span>
                </button>
                <?php
            }
            ?>
        </form>

        <div class="image-right">

            <img src="../images/add-space.PNG" alt="">
        </div>
    </div>
</main>
<script src="../scripts/scripts.js"></script>
<?php include "../components/footer-bar.php" ?>
</body>
</html>