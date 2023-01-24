<nav>
    <ul>
        <li><a class="active" href="../front-end/landing-page.php">Faqja Kryesore <i class="fa fa-plane" style="font-size:120%;"></i></a></li>
        <li>
            <a href="#">Shërbime <i class="fa fa-cogs" style="font-size:100%"></i></a>
            <ul>
                <li><a href="../front-end/transport.php">Transporti <i class="fa fa-taxi" style="margin-left: 0"></i></a></li>
                <li><a href="../front-end/restaurant.php">Restorante <i class="fa-solid fa-utensils" style="margin-left: 0; font-size:100%"></i></a></li>
<!--                <li><a href="../front-end/customs.php">Dogana <i class="fa-solid fa-person-military-to-person" style="margin-left: 0"></i></a></li>-->
                <li><a href="../front-end/shops.php">Dyqane <i class="fa-solid fa-cart-shopping" style="margin-left: 0"></i></a></li>
                <li><a href="../front-end/luggage.php">Bagazhe <i class="fa-solid fa-suitcase-rolling" style="margin-left: 0"></i></a></li>
            </ul>
        </li>
        <li><a href="../front-end/car-renting.php">Makina me qera <i class="fa fa-automobile" style="font-size:100%;"></i></a></li>
        <li><a href="../front-end/hotels.php">Qëndrimi <i class="fa-solid fa-bed" style="font-size:100%;"></i></a></li>
        <!-- afishimi ores --> <li id="clk" style="float: right; color: white; text-align: center; margin-right: 20px; margin-top:23px; font-size: 20px;"><a href="#"></a></li>
        <li style="float: right;margin-right: 55px;"><a href="#"><i class="fa fa-user-circle" style="font-size:150%; margin-top: 10px; margin-left: 40px"></i></a>
            <ul>
                <li><a id="profile" href="../front-end/myProfile.php" target="_self">Profili im</a></li>
                <li><a id="loggedUser" href="../front-end/login.php" target="_self">Login</a></li>
<!--                <li><a id="signup" href="../front-end/sign-up.php" target="_self">Krijo llogari</a></li> -->
            </ul>
        </li>
    </ul>
</nav>
<?php
if(!isset($_SESSION)) {
    session_start();
}
if(empty($_SESSION["user_id"])){
    echo "<script>
                const profile = document.getElementById('profile').style.display='none';
         </script>";
}
if(!empty($_SESSION["user_id"])) {
    echo "<script>
                const link = document.getElementById('loggedUser').href='../back-end/logout.php';
                const label = document.getElementById('loggedUser').innerHTML = 'Logout';
          </script>";
//    echo "<script>const profile = document.getElementById('signup').style.display='none';</script>";
}
?>
