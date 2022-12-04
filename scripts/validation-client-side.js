var usernameStat = document.getElementById('username-error');
var firstnameStat = document.getElementById('first_name-error');
var surnameStat = document.getElementById('surname-error');
var emailStat = document.getElementById('email-error');
var birthdayStat = document.getElementById('birthday-error');
var roleStat = document.getElementById('role-error');
var passwordStat = document.getElementById('password-error');
var cfrPassStat = document.getElementById('confirm-password-error');

var formatSpecial = /[!@#$ %^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
var formatNumbers = /(.*\d.*)/;
var formatCapitals = /(.*[A-Z].*)/;
var formatLower = /(.*[a-z].*)/;

function validateUsername(){
    var un = document.getElementById('username').value;

    if(un.length==0){
        usernameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not be empty' style='color: red'></i>";
        document.getElementById('username').placeholder = "USERNAME MUST NOT BE BLANK";
        return false;
    }
    if(un.length<10){
        usernameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not contain less than 10 characters' style='color: red'></i>";
        return false;
    }
    if(un.length>25){
        usernameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not contain more than 25 characters' style='color: red'></i>";
        return false;
    }
    if(/\d/.test(un)){
        usernameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not contain Numbers' style='color: red'></i>";
        return false;
    }
    if(formatSpecial.test(un)){
        usernameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not contain Special Characters' style='color: red'></i>";
        return false;
    }
    usernameStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validateFirstname(){
    var name = document.getElementById('first_name').value;
    var nameFiltered = name.charAt(0).toUpperCase()+name.slice(1);   // dynamically converting the first char to Upper case
    document.getElementById('first_name').value=nameFiltered;

    if(nameFiltered.length==0){
        firstnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='First name MUST not be empty' style='color: red'></i>";
        document.getElementById('first_name').placeholder = "FIRST NAME MUST NOT BE BLANK";
        return false;
    }
    if(nameFiltered.length>10){
        firstnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='First name MUST not contain more than 20 characters' style='color: red'></i>";
        return false;
    }
    if(/\d/.test(nameFiltered)){
        firstnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not contain Numbers' style='color: red'></i>";
        return false;
    }
    if(formatSpecial.test(nameFiltered)){
        firstnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not contain Special Characters' style='color: red'></i>";
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
        surnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Surname MUST not be empty' style='color: red'></i>";
        document.getElementById('surname').placeholder = "SURNAME MUST NOT BE BLANK";
        return false;
    }
    if(surnameFiltered.length>10){
        surnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Surname MUST not contain more than 20 characters' style='color: red'></i>";
        return false;
    }
    if(/\d/.test(surnameFiltered)){
        surnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Surname MUST not contain Numbers' style='color: red'></i>";
        return false;
    }
    if(formatSpecial.test(surnameFiltered)){
        surnameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Surname MUST not contain Special Characters' style='color: red'></i>";
        return false;
    }
    surnameStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validateEmail(){
    var email = document.getElementById('email').value;

    if(email.length==0){
        emailStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Email MUST not be empty' style='color: red'></i>";
        document.getElementById('email').placeholder = "EMAIL MUST NOT BE BLANK";
        return false;
    }
    if(email.length<15){
        emailStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Email MUST not contain less than 15 characters' style='color: red'></i>";
        return false;
    }
    if(email.length>40){
        emailStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Email MUST not contain more than 40 characters' style='color: red'></i>";
        return false;
    }
    if(formatSpecial.test(email.charAt(0))){
        emailStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Email MUST not start with Special Characters' style='color: red'></i>";
        return false;
    }
    emailStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validateBirthday(){
    var birthday = document.getElementById('birthday').value;
    if(birthday==""){
        birthdayStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Birthday MUST not be empty' style='color: red'></i>";
        return false;
    }
    birthdayStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

function validateRole(){
    var role = document.getElementById('role').valueOf().value;
    if(role==""){
        roleStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Role MUST not be empty' style='color: red'></i>";
        return false;
    }else{
        roleStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
        return true;
    }
}

function validatePassword(){
    var password = document.getElementById('password').value;
    if(password.length==0){
        passwordStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password MUST not be empty' style='color: red'></i>";
        document.getElementById('password').placeholder = "PASSWORD MUST NOT BE BLANK";
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

function validateConfirmPassword(){
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('cfr-password').value;

    if(confirmPassword.length==0){
        cfrPassStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Password MUST not be empty' style='color: red'></i>";
        document.getElementById('cfr-password').placeholder = "CONFIRM PASSWORD";
        return false;
    }

    if(password!=confirmPassword){
        cfrPassStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='PASSWORD DO NOT MATCH' style='color: red'></i>";
        return false;
    }
    cfrPassStat.innerHTML = "<i class='fas fa-check-circle' title='PASSWORDS MATCH' style='color: green'</i>";
    return true;
}
function validate(){
     var x1 = validateUsername();
     var x2 = validateFirstname();
     var x3 = validateSurname();
     var x4 = validateEmail();
     var x5 = validateBirthday();
     var x6 = validateRole();
     var x7 = validatePassword();
     var x8 = validateConfirmPassword();

     return ((x1 && x2 && x3 && x4 && x5 && x6 && x7 && x8));
}

