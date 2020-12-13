'use strict'

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

    clearUpdateHTML()

    let usernameError = false
    let passwordError = false

    if(!regex.test(username)) {
        usernameError = updateError('updateNewUsernameError',"Invalid username. Use letters and numbers only.")
    }
    if(!regexPassword.test(password)) {
        passwordError = updateError('updateActualPasswordError',"Invalid password. Must contain at least a letter and a number.")
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
    document.getElementById('updateNewUsernameError').innerHTML = ''
    document.getElementById('updateActualPasswordError').innerHTML = ''
    document.getElementById('updateNewPasswordError').innerHTML = ''
    document.getElementById('updateConfirmPasswordError').innerHTML = ''
    document.getElementById('updateCurrentPasswordError').innerHTML = ''
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

    clearUpdateHTML()

    let newPassError = false
    let confPassError = false
    let passError = false

    if(!regexPassword.test(new_password)){
        newPassError = updateError("updateNewPasswordError","Invalid new password. Must contain at least a letter and a number.")
    }if(!regexPassword.test(confirm_password)){
        confPassError = updateError("updateConfirmPasswordError","Invalid password confirmation. Must contain at least a letter and a number.")
    }if(!regexPassword.test(password)){
        passError = updateError("updateCurrentPasswordError","Invalid password. Must contain at least a letter and a number.")
    }if(!newPassError && !confPassError && !passError){
        form.submit()
    } 
}