<?php
session_start();
if(!empty($_SESSION["user_id"])) {
    // ketu supozohet qe mqs useri eshte ruajtur ne session atehere
    // permbajtja e butonit (login) duhet te kthehet ne logout
    echo "logged in";
} else echo"logged out";
?>
<nav>
    <ul>
        <li><a class="active" href="../front-end/landing-page.php">Flights <i class="fa fa-plane" style="font-size:120%;"></i></a></li>
        <li>
            <a href="#">Services <i class="fa fa-cogs" style="font-size:100%"></i></a>
            <ul>
                <li><a href="../front-end/transport.php">Transport <i class="fa fa-taxi" style="margin-left: 0"></i></a></li>
                <li><a href="../front-end/restaurant.php">Restaurant <i class="fa-solid fa-utensils" style="margin-left: 0; font-size:100%"></i></a></li>
                <li><a href="../front-end/customs.php">Customs <i class="fa-solid fa-person-military-to-person" style="margin-left: 0"></i></a></li>
                <li><a href="../front-end/shops.php">Shops <i class="fa-solid fa-cart-shopping" style="margin-left: 0"></i></a></li>
                <li><a href="../front-end/health.php">Health <i class="fa fa-medkit" style="margin-left: 0"></i></a></li>
                <li><a href="../front-end/luggage.php">Luggage <i class="fa-solid fa-suitcase-rolling" style="margin-left: 0"></i></a></li>
            </ul>
        </li>
        <li><a href="../front-end/car-renting.php">Car Rentals <i class="fa fa-automobile" style="font-size:100%;"></i></a></li>
        <li><a href="../front-end/hotels.php">Stays <i class="fa-solid fa-bed" style="font-size:100%;"></i></a></li>
        <!-- afishimi ores --> <li id="clk" style="float: right; color: white; text-align: center; margin-right: 20px; margin-top:23px; font-size: 20px;"><a href="#"></a></li>
        <li style="float: right;margin-right: 55px;"><a href="#"><i class="fa fa-user-circle" style="font-size:150%; margin-top: 10px; margin-left: 40px"></i></a>
            <ul>
                <li><a id="loggedUser" href="../front-end/sign-up.php" target="_self">Login</a></li>
            </ul>
        </li>
    </ul>
</nav>