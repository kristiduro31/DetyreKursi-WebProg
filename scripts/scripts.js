function realtimeClock(){
    var rtDate = new Date();
    var hours = rtDate.getHours();
    var mins = rtDate.getMinutes();
    var sec = rtDate.getSeconds();

    var amPm = (hours<12)?"AM":"PM";

    hours = (hours>12)?hours-12:hours;

    hours = ("0"+hours).slice(-2)
    mins = ("0"+mins).slice(-2)
    sec = ("0"+sec).slice(-2)

    // display clock
    document.getElementById('clk').innerHTML = hours+":"+mins+":"+sec+" "+amPm;
    var t = setTimeout(realtimeClock,500);
}

function register(){

}

async function getRouting(){
    const ip_info = "http://ip-api.com/json";
    const response = await fetch(ip_info);
    const data = await response.json();
    const {lat,lon} = data;
    console.log(lat); //for testing purposes only !!!
    console.log(lon); //also for testing
    const link = document.getElementById("pathToTIA").href="https://www.google.com/maps/dir/"+lat+","+lon+"/tia+address/@41.3703798,19.6917256,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x13502d0712c5607f:0x5254c1f62d5286db!2m2!1d19.714428!2d41.4191706"
}
