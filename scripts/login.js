'use strict'

if(document.getElementById('login')) {
    document.getElementById('login-button').addEventListener("click", validateLogin)
}

//This function validates the input, if it doesnt work a message is raised
function validateLogin(event) {
    event.preventDefault()

    let form = document.getElementById('login-form')
    let username = form.querySelector('input[name="username"]').value
    let password = form.querySelector('input[name="password"]').value

    let regex = RegExp(/^[a-zA-Z0-9]+$/)
    let regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)

    let errorUsername = false
    let errorPassword = false

    clearHTML()

    if(!regex.test(username)) {
        errorUsername = loginError('login-username-error',"Invalid username. Use letters and numbers only.")
    }
    if(!regexPassword.test(password)) {
        errorPassword = loginError('login-password-error',"Invalid password. Must contain at least a letter and a number.")
    }
    if(!errorUsername && !errorPassword){
        form.submit()
    }
            
}

function loginError(id,message){
    let section = document.getElementById(id)

    let p0 = document.createElement('p')
    p0.innerText = message

    section.appendChild(p0)

    return true
}



function clearHTML(){
    document.getElementById('login-username-error').innerHTML = ''
    document.getElementById('login-password-error').innerHTML = ''
}