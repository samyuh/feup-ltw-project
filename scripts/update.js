'use strict';

if(document.getElementById('updateUsername') && document.getElementById('updatePassword')) {
    document.getElementById('updateUsernameButton').addEventListener("click",validateUpdateUsername)
    document.getElementById('updatePasswordButton').addEventListener("click",validateUpdatePassword)
}

//This function validates the username, if it doesnt work a message is raised
function validateUpdateUsername(e){
    e.preventDefault()
    let form = document.getElementById("updateUsernameForm")

    let username = form.querySelector('input[name="new_username"]').value
    let password = form.querySelector('input[name="password"]').value

    let regex = RegExp(/^[a-zA-Z0-9]+$/);  // All letters and numbers without blanck space
    let regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)

    if(!regex.test(username)) {
        alert("Invalid username. Use letters and numbers only.")
    }
    else if(!regexPassword.test(password)) {
        alert("Invalid password. Must contain at least a letter and a number.")
    }
    else{
        form.submit()
    } 
}


//This function validates the username, if it doesnt work a message is raised
function validateUpdatePassword(e){
    e.preventDefault()
    let form = document.getElementById("updatePasswordForm")

    let new_password = form.querySelector('input[name="new_password"]').value
    let confirm_password = form.querySelector('input[name="confirm_password"]').value
    let password = form.querySelector('input[name="password"]').value

    //regex = RegExp(/^[a-zA-Z0-9]+$/);  // All letters and numbers without blanck space
    let regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)

    if(!regexPassword.test(new_password)){
        alert("Invalid new password. Must contain at least a letter and a number.")
    }else if(!regexPassword.test(confirm_password)){
        alert("Invalid password confirmation. Must contain at least a letter and a number.")
    }else if(!regexPassword.test(password)){
        alert("Invalid password. Must contain at least a letter and a number.")
    }else{
        form.submit()
    } 
}