'use strict';

if(document.getElementById('login')) {
    document.getElementById('loginButton').addEventListener("click", validateLogin)
}

//This function validates the input, if it doesnt work a message is raised
function validateLogin(event) {
    event.preventDefault()

    let form = document.getElementById('loginForm')
    let username = form.querySelector('input[name="username"]').value
    let password = form.querySelector('input[name="password"]').value

    let regex = RegExp(/^[a-zA-Z0-9]+$/)
    let regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)

    if(!regex.test(username)) {
        alert("Invalid username. Use letters and numbers only.")
    }
    else if(!regexPassword.test(password)) {
        alert("Invalid password. Must contain at least a letter and a number.")
    }
    else {
        form.submit()
    }
}