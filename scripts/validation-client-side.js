var firstnameStat = document.getElementById('first_name-error');
var surnameStat = document.getElementById('surname-error');
var emailStat = document.getElementById('email-error');
var birthdayStat = document.getElementById('birthday-error');
var passwordStat = document.getElementById('password-error');
var cfrPassStat = document.getElementById('confirm-password-error');
var phoneStat = document.getElementById('phone-error');
var addStat = document.getElementById('address-error');

var formatSpecial = /[!@#$ %^&*()+\-=\[\]{};':"\\|,<>\/?]+/;  // pervec '_' dhe '.'
var formatNumbers = /(.*\d.*)/;
var formatCapitals = /(.*[A-Z].*)/;
var formatLower = /(.*[a-z].*)/;


function validateFirstname(){
    var name = document.getElementById('first_name').value;
    var nameFiltered = name.charAt(0).toUpperCase()+name.slice(1);   // dynamically converting the first char to Upper case
    document.getElementById('first_name').value=nameFiltered;

    if(nameFiltered.length==0){
        firstnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='First name MUST not be empty' style='color: red'></i>";
        document.getElementById('first_name').placeholder = "Emri NUK duhet te jete bosh!";
        return false;
    }
    if(nameFiltered.length>15){
        firstnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Emri NUK duhet te permbaje me shume se 15 karaktere' style='color: red'></i>";
        return false;
    }
    if(/\d/.test(nameFiltered)){
        firstnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Emri NUK duhet te permbaje Numra' style='color: red'></i>";
        return false;
    }
    if(formatSpecial.test(nameFiltered)){
        firstnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Emri NUK duhet te permbaje karaktere speciale' style='color: red'></i>";
        return false;
    }
    firstnameStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validateSurname(){
    var surname = document.getElementById('surname').value;
    var surnameFiltered = surname.charAt(0).toUpperCase()+surname.slice(1);   // dynamically converting the first char to Upper case
    document.getElementById('surname').value=surnameFiltered;

    if (surname.length==0){
        surnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Mbiemri NUK duhet te jete bosh' style='color: red'></i>";
        document.getElementById('surname').placeholder = "Mbiemri NUK duhet te jete bosh";
        return false;
    }
    if(surnameFiltered.length>10){
        surnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Mbiemri NUK duhet te permbaje me shume se 20 karaktere' style='color: red'></i>";
        return false;
    }
    if(/\d/.test(surnameFiltered)){
        surnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Mbiemri NUK duhet te permbaje Numra' style='color: red'></i>";
        return false;
    }
    if(formatSpecial.test(surnameFiltered)){
        surnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Mbiemri NUK duhet te permbaje karaktere speciale' style='color: red'></i>";
        return false;
    }
    surnameStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validateEmail(){
    var email = document.getElementById('email').value;

    if(email.length==0){
        emailStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Email NUK duhet te jete bosh' style='color: red'></i>";
        document.getElementById('email').placeholder = "Email NUK duhet te jete bosh";
        return false;
    }
    if(email.length<15){
        emailStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Email NUK duhet te permbaje me pak se 15 karaktere' style='color: red'></i>";
        return false;
    }
    if(email.length>40){
        emailStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Email NUK duhet te permbaje me shume se 40 karaktere' style='color: red'></i>";
        return false;
    }
    if(formatSpecial.test(email.charAt(0))){
        emailStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Email NUK duhet te nise me karakter Special' style='color: red'></i>";
        return false;
    }
    emailStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validateBirthday(){
    var birthday = document.getElementById('birthday').value;
    if(birthday==""){
        birthdayStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Ditelindja juaj nuk duhet te jete bosh' style='color: red'></i>";
        return false;
    }
    birthdayStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validatePassword(){
    var password = document.getElementById('password').value;
    if(password.length==0){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password NUK duhet te jete bosh' style='color: red'></i>";
        document.getElementById('password').placeholder = "Password NUK duhet te jete bosh";
        return false;
    }
    if(password.length<8){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password NUK duhet te permbaje me pak se 8 karaktere' style='color: red'></i>";
        return false;
    }
    if(password.length>20){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password NUK duhet te permbaje me shume se 20 karaktere' style='color: red'></i>";
        return false;
    }
    if(!formatSpecial.test(password)){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password DUHET te permbaje te pakten 1 Karakter Special' style='color: red'></i>";
        return false;
    }
    if(!formatNumbers.test(password)){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password DUHET te permbaje te pakten 1 Numer' style='color: red'></i>";
        return false;
    }
    if(!formatCapitals.test(password)){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password DUHET te permbaje te pakten 1 shkronje te madhe' style='color: red'></i>";
        return false;
    }
    if(!formatLower.test(password)){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password DUHET te permbaje te pakten 1 shkronje te vogel' style='color: red'></i>";
        return false;
    }
    passwordStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validateConfirmPassword(){
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('cfr-password').value;

    if(confirmPassword.length==0){
        cfrPassStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password NUK duhet te jete bosh' style='color: red'></i>";
        document.getElementById('cfr-password').placeholder = "Konfirmoni password-in serish";
        return false;
    }

    if(password!=confirmPassword){
        cfrPassStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Passwordet JANE te njejte' style='color: red'></i>";
        return false;
    }
    cfrPassStat.innerHTML = "<i class='fas fa-check-circle' title='Passwordet NUK jane te njejte' style='color: green'</i>";
    return true;
}

function validatePhone(){
    var tel = document.getElementById('telephone').value;

    if(tel.length==0){
        phoneStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Numri i telefonit nuk duhet te jete bosh' style='color: red'></i>";
        document.getElementById('telephone').placeholder = "Numri i telefonit nuk duhet te jete bosh";
        return false;
    }
    phoneStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validateAddress(){
    var addr = document.getElementById('address').value;

    if(addr.length==0){
        addStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Adresa nuk duhet te jete bosh!' style='color: red'></i>";
        document.getElementById('address').placeholder = "Adresa nuk duhet te jete bosh!";
        return false;
    }
    addStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validate(){
     var x1 = validateAddress();
     var x2 = validateFirstname();
     var x3 = validateSurname();
     var x4 = validateEmail();
     var x5 = validateBirthday();
     var x6 = validatePhone();
     var x7 = validatePassword();
     var x8 = validateConfirmPassword();

     return ((x1 && x2 && x3 && x4 && x5 && x6 && x7 && x8));
}

function checkPasswordUpdate(){
    var password = document.getElementById('password').value;
    if(password.length==0){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password MUST not be empty' style='color: red'></i>";
        document.getElementById('password').placeholder = "Jepni password-in per te konfirmuar ndryshimet";
        return false;
    }
    if(password.length<8){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password MUST not contain less than 8 Characters' style='color: red'></i>";
        return false;
    }
    if(password.length>20){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password MUST not contain more than 20 Characters' style='color: red'></i>";
        return false;
    }
    if(!formatSpecial.test(password)){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password MUST contain at least 1 Special Character' style='color: red'></i>";
        return false;
    }
    if(!formatNumbers.test(password)){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password MUST contain at least 1 Number' style='color: red'></i>";
        return false;
    }
    if(!formatCapitals.test(password)){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password MUST contain at least 1 UPPER Case Character' style='color: red'></i>";
        return false;
    }
    if(!formatLower.test(password)){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password MUST contain at least 1 LOWER Case Character' style='color: red'></i>";
        return false;
    }
    passwordStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

