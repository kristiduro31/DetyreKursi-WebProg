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

function validate(){
    validateUsername();
}
function validateUsername(){
    var usrn = document.forms["sign-up"]["username"].value;
    // var usrn_field = document.getElementById("username")
    if(usrn===""){
        document.getElementById("username").placeholder="This Should not be empty";
    }
    else if(usrn.length<8){
        document.getElementById("username").placeholder="This Should Contain more than 8 characters";
    }
    else if(usrn.length>20){
        document.getElementById("username").placeholder="This Should Contain less than 20 characters";
    }
    else if(/\d/.test(usrn)){
        document.getElementById("username").placeholder="This Should NOT Contain Numbers";
    }
    else if(/^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/.test(usrn)){
        document.getElementById("username").placeholder="This Should NOT Contain Special Characters";
    }
}