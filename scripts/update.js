'use strict'

if(document.getElementById('update-username-form') && document.getElementById('update-password-form')) {
    document.getElementById('update-username-button').addEventListener("click",validateUpdateUsername)
    document.getElementById('update-password-button').addEventListener("click",validateUpdatePassword)
    document.getElementById('update-information-button').addEventListener("click",validateUpdateInformation)
    document.getElementById('delete-profile-button').addEventListener("click",validateDeleteProfile)
}

//This function validates the username, if it doesnt work a message is raised
function validateUpdateUsername(e){
    e.preventDefault()
    let form = document.getElementById("update-username-form")

    let username = form.querySelector('input[name="new_username"]').value
    let password = form.querySelector('input[name="password"]').value

    clearUpdateHTML()

    let usernameError = false
    let passwordError = false

    if(!regexUsername(username)) {
        usernameError = updateError('update-new-username-error',"Invalid username. Use letters and numbers only.")
    }
    if(!regexPassword(password)) {
        passwordError = updateError('update-actual-password-error',"Invalid password. Must contain at least a letter and a number.")
    }
    if(!usernameError && !passwordError){
        form.submit()
    } 
}

//This function validates the username, if it doesnt work a message is raised
function validateUpdatePassword(e){
    e.preventDefault()
    let form = document.getElementById("update-password-form")

    let new_password = form.querySelector('input[name="new_password"]').value
    let confirm_password = form.querySelector('input[name="confirm_password"]').value
    let password = form.querySelector('input[name="password"]').value

    clearUpdateHTML()

    let newPassError = false
    let confPassError = false
    let passError = false

    if(!regexPassword(new_password)){
        newPassError = updateError("update-new-password-error","Invalid new password. Must contain at least a letter and a number.")
    }if(!regexPassword(confirm_password)){
        confPassError = updateError("update-confirm-password-error","Invalid password confirmation. Must contain at least a letter and a number.")
    }if(!regexPassword(password)){
        passError = updateError("update-current-password-error","Invalid password. Must contain at least a letter and a number.")
    }if(!newPassError && !confPassError && !passError){
        form.submit()
    } 
}

function validateUpdateInformation(e){
    e.preventDefault()
    let form = document.getElementById("update-information-form")

    let location = form.querySelector('input[name="location"]').value
    let password = form.querySelector('input[name="password"]').value
    let path = form.querySelector('input[name="image"]').value
    let file = path.replace(/^.*\\/, "");

    clearUpdateHTML()

    let locationError = false
    let passwordError = false
    let fileError = false

    if(!regexText(location)){
        locationError = updateError("update-location","Invalid location. Must not contain special characters.")
    }if(!regexPassword(password)){
        passwordError = updateError("update-actual-password-information-error","Invalid password. Must contain at least a letter and a number.")
    }if(!isFileImage(file)){
        fileError = updateError("update-image","Invalid file. Must be an image.")
    }if(!locationError && !passwordError && !fileError){
        form.submit()
    } 
}

function validateDeleteProfile(e){
    e.preventDefault()
    let form = document.getElementById("delete-profile-form")

    let password = form.querySelector('input[name="password"]').value

    clearUpdateHTML()

    let passwordError = false

    if(!regexPassword(password)){
        passwordError = updateError("update-delete-password-error","Invalid password. Must contain at least a letter and a number.")
    }if(!passwordError){
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
    document.getElementById('update-location').innerHTML = ''
    document.getElementById('update-actual-password-information-error').innerHTML = ''
    document.getElementById('update-image').innerHTML = ''
    document.getElementById('update-delete-password-error').innerHTML = ''
}
