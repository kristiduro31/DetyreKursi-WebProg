
class Navbar extends HTMLElement{
    connectedCallback(){
        this.innerHTML=
            `<nav>
                 <ul>          
                    <li><a class="active" href="#">Flights <i class="fa fa-plane" style="font-size:120%;"></i></a></li>
                    <li>
                       <a href="#">Services <i class="fa fa-cogs" style="font-size:100%"></i></a>
                       <ul>
                          <li><a href="../templates/transport.html">Transport <i class="fa fa-taxi" style="margin-left: 0"></i></a></li>
                          <li><a href="../templates/restaurant.html">Restaurant <i class="fa-solid fa-utensils" style="margin-left: 0; font-size:100%"></i></a></li>
                          <li><a href="../templates/customs.html">Customs <i class="fa-solid fa-person-military-to-person" style="margin-left: 0"></i></a></li>
                          <li><a href="../templates/shops.html">Shops <i class="fa-solid fa-cart-shopping" style="margin-left: 0"></i></a></li>
                          <li><a href="../templates/health.html">Health <i class="fa fa-medkit" style="margin-left: 0"></i></a></li>
                          <li><a href="../templates/luggage.html">Luggage <i class="fa-solid fa-suitcase-rolling" style="margin-left: 0"></i></a></li>
                       </ul>
                    </li>
                    <li><a href="#">Car Rentals <i class="fa fa-automobile" style="font-size:100%;"></i></a></li>
                    <li><a href="#">Stays <i class="fa-solid fa-bed" style="font-size:100%;"></i></a></li>  
<!-- afishimi ores --> <li id="clk" style="float: right; color: white; text-align: center; margin-right: 20px; margin-top:23px; font-size: 20px;"><a href="#"></a></li> 
                    <li style="float: right;margin-right: 55px;"><a href="#"><i class="fa fa-user-circle" style="font-size:150%; margin-top: 10px; margin-left: 40px"></i></a>
                        <ul>
                            <li><a href="login.php" target="_self">Login</a></li>
                        </ul>
                    </li>           
                 </ul>
             </nav>`
    }
}

class Footer extends HTMLElement{
    connectedCallback(){
        this.innerHTML=
        `<footer>
            Copyright @2022
        </footer>
        `
    }
}

customElements.define('app-navbar', Navbar);
customElements.define('app-footer', Footer);