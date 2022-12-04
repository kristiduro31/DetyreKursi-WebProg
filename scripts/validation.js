var usernameStat = document.getElementById('username-error');

function validateUsername(){
    var un = document.getElementById('username').value;
    var format = /[!@#$ %^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    if(un.length==0){
        usernameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not be empty' style='color: red'></i>";
        return false;
    }
    if(un.length<8){
        usernameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not contain less than 8 characters' style='color: red'></i>";
        return false;
    }
    if(un.length>20){
        usernameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not contain more than 20 characters' style='color: red'></i>";
        return false;
    }
    if(/\d/.test(un)){
        usernameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not contain Numbers' style='color: red'></i>";
        return false;
    }
    if(format.test(un)){
        usernameStat.innerHTML = "<i class='fas fa-exclamation-triangle' title='Username MUST not contain Special Characters' style='color: red'></i>";
        return false;
    }
    usernameStat.innerHTML = "<i class='fas fa-check-circle' title='CORRECT' style='color: green'</i>";
    return true;
}

