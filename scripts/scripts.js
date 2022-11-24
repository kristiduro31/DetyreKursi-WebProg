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