'use strict';

if(document.getElementById('login') != undefined) {
    document.getElementById('loginButton').addEventListener("click", validateLogin)
}

//This function validates the input, if it doesnt work a message is raised
function validateLogin(event) {
    event.preventDefault()

    let form = document.getElementById('loginForm')

    let username = form.querySelector('input[name="username"]').value
    let password = form.querySelector('input[name="password"]').value

    let regex = RegExp(/^[a-zA-Z0-9]+$/)
    let regexPassword = regex

    if(!regex.test(username)) {
        alert("Invalid username. Use only letters and numbers.")
    }
    else if(!regexPassword.test(password)) {
        alert("Invalid password. Use only letters and numbers.")
    }
    else {
        form.submit()
    }
}