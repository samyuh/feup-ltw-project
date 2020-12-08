'use strict';

if(document.getElementById('updateUsername') && document.getElementById('updatePassword')) {
    document.getElementById('updateUsernameButton').addEventListener("click",validateUpdateUsername)
    document.getElementById('updatePasswordButton').addEventListener("click",validateUpdatePassword)
}

//This function validates the username, if it doesnt work a message is raised
function validateUpdateUsername(e){
    e.preventDefault()
    let form = document.getElementById("updateUsernameForm")

    username = form.querySelector('input[name="new_username"]').value
    password = form.querySelector('input[name="password"]').value

    regex = RegExp(/^[a-zA-Z0-9]+$/);  // All letters and numbers without blanck space
    regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)

    if(!regex.test(username)) {
        alert("Invalid Username!!")
    }
    else if(!regexPassword.test(password)) {
        alert("Invalid password!!")
    }
    else{
        form.submit()
    } 
}


//This function validates the username, if it doesnt work a message is raised
function validateUpdatePassword(e){
    e.preventDefault()
    let form = document.getElementById("updatePasswordForm")

    new_password = form.querySelector('input[name="new_password"]').value
    confirm_password = form.querySelector('input[name="confirm_password"]').value
    password = form.querySelector('input[name="password"]').value

    //regex = RegExp(/^[a-zA-Z0-9]+$/);  // All letters and numbers without blanck space
    regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)

    if(!regexPassword.test(new_password)){
        alert("Invalid new password!!")
    }else if(!regexPassword.test(confirm_password)){
        alert("Invalid password confirmation!!")
    }else if(!regexPassword.test(password)){
        alert("Invalid password!!")
    }else{
        form.submit()
    } 
}