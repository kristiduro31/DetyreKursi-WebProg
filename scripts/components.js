
class Navbar extends HTMLElement{
    connectedCallback(){
        this.innerHTML=
            `<nav>
                 <ul>          
                    <li><a class="active" href="../templates/landing-page.php">Flights <i class="fa fa-plane" style="font-size:120%;"></i></a></li>
                    <li>
                       <a href="#">Services <i class="fa fa-cogs" style="font-size:100%"></i></a>
                       <ul>
                          <li><a href="../templates/transport.php">Transport <i class="fa fa-taxi" style="margin-left: 0"></i></a></li>
                          <li><a href="../templates/restaurant.php">Restaurant <i class="fa-solid fa-utensils" style="margin-left: 0; font-size:100%"></i></a></li>
                          <li><a href="../templates/customs.php">Customs <i class="fa-solid fa-person-military-to-person" style="margin-left: 0"></i></a></li>
                          <li><a href="../templates/shops.php">Shops <i class="fa-solid fa-cart-shopping" style="margin-left: 0"></i></a></li>
                          <li><a href="../templates/health.php">Health <i class="fa fa-medkit" style="margin-left: 0"></i></a></li>
                          <li><a href="../templates/luggage.php">Luggage <i class="fa-solid fa-suitcase-rolling" style="margin-left: 0"></i></a></li>
                       </ul>
                    </li>
                    <li><a href="../templates/car-renting.php">Car Rentals <i class="fa fa-automobile" style="font-size:100%;"></i></a></li>
                    <li><a href="../templates/hotels.php">Stays <i class="fa-solid fa-bed" style="font-size:100%;"></i></a></li>  
<!-- afishimi ores --> <li id="clk" style="float: right; color: white; text-align: center; margin-right: 20px; margin-top:23px; font-size: 20px;"><a href="#"></a></li> 
                    <li style="float: right;margin-right: 55px;"><a href="#"><i class="fa fa-user-circle" style="font-size:150%; margin-top: 10px; margin-left: 40px"></i></a>
                        <ul>
                            <li><a href="../templates/sign-up.php" target="_self">Login</a></li>
                        </ul>
                    </li>           
                 </ul>
             </nav>`
    }
}

class Footer extends HTMLElement{
    connectedCallback(){
        this.innerHTML=
        ` <footer class="footer">
            <div class = "container">
            <div class = "row" >
            <div class = "footer-col" >
                <h4>        Flights</h4>
                    <ul>
                        <li><a href="#">Boarding</a></li>
                        <li><a href="#">Departures</a></li>
                        <li><a href="#">Arrivals</a></li>
                    </ul>
            </div>
        <div class="footer-col">
            <h4> Services </h4>
            <ul>
                <li><a href="../templates/transport.php">Transport</a></li>
                <li><a href="../templates/restaurant.php">Restaurants and Cafes</a></li>
                <li><a href="../templates/shops.php">Shops</a></li>
                <li><a href="../templates/health.php">Health</a></li>
                <li><a href="../templates/car-renting.php">Car Rentals</a></li>
                <li><a href="../templates/hotels.php">Hotels and accommodation</a></li>
            </ul>
        </div>
        <div class="footer-col">
           <br><br><br>
            <ul>
                <li><a href="../templates/faqs.php">FAQs</a></li>
                <li><a href="../templates/customs.php">Customs</a></li>
                <li><a href="../templates/luggage.php">Luggages</a></li>
                <li><a href="../templates/privacy-policy.php">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-col" style="padding-left: 5px">
            <h4>Follow us</h4>
            <div class="social-links">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <br>
            <h4>Address</h4>
            <ul>
                <li><a href="https://www.google.com/maps/dir/41.320448,19.808256/tia+address/@41.3703798,19.6917256,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x13502d0712c5607f:0x5254c1f62d5286db!2m2!1d19.714428!2d41.4191706">
                <i class="fas fa-map-marker-alt"></i> Rr. Nene Tereza, Rinas 1504, Albania</span></a></li>
            </ul>
        </div>
    </div>
    </div>
    </footer>`
    }
}

customElements.define('app-navbar', Navbar);
customElements.define('app-footer', Footer);