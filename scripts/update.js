'use strict';

if(document.getElementById('update-username-form') && document.getElementById('update-password')) {
    document.getElementById('update-username-button').addEventListener("click",validateUpdateUsername)
    document.getElementById('update-password-button').addEventListener("click",validateUpdatePassword)
}

//This function validates the username, if it doesnt work a message is raised
function validateUpdateUsername(e){
    e.preventDefault()
    let form = document.getElementById("update-username-form")

    let username = form.querySelector('input[name="new_username"]').value
    let password = form.querySelector('input[name="password"]').value

    let regex = RegExp(/^[a-zA-Z0-9]+$/);  // All letters and numbers without blanck space
    let regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)

    clearUpdateHTML()

    let usernameError = false
    let passwordError = false

    if(!regex.test(username)) {
        usernameError = updateError('update-new-username-error',"Invalid username. Use letters and numbers only.")
    }
    if(!regexPassword.test(password)) {
        passwordError = updateError('update-actual-password-error',"Invalid password. Must contain at least a letter and a number.")
    }
    if(!usernameError && !passwordError){
        form.submit()
    } 
}

function updateError(id,message){
    let section = document.getElementById(id)

    let p0 = document.createElement('p')
    p0.innerText = message

    section.appendChild(p0)

    return true
}


function clearUpdateHTML(){
    document.getElementById('update-new-username-error').innerHTML = ''
    document.getElementById('update-actual-password-error').innerHTML = ''
    document.getElementById('update-new-password-error').innerHTML = ''
    document.getElementById('update-confirm-password-error').innerHTML = ''
    document.getElementById('update-current-password-error').innerHTML = ''
}

//This function validates the username, if it doesnt work a message is raised
function validateUpdatePassword(e){
    e.preventDefault()
    let form = document.getElementById("update-password-form")

    let new_password = form.querySelector('input[name="new_password"]').value
    let confirm_password = form.querySelector('input[name="confirm_password"]').value
    let password = form.querySelector('input[name="password"]').value

    //regex = RegExp(/^[a-zA-Z0-9]+$/);  // All letters and numbers without blanck space
    let regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)

    clearUpdateHTML()

    let newPassError = false
    let confPassError = false
    let passError = false

    if(!regexPassword.test(new_password)){
        newPassError = updateError("update-new-password-error","Invalid new password. Must contain at least a letter and a number.")
    }if(!regexPassword.test(confirm_password)){
        confPassError = updateError("update-confirm-password-error","Invalid password confirmation. Must contain at least a letter and a number.")
    }if(!regexPassword.test(password)){
        passError = updateError("update-current-password-error","Invalid password. Must contain at least a letter and a number.")
    }if(!newPassError && !confPassError && !passError){
        form.submit()
    } 
}