'use strict';

if(document.getElementById('register')) {
    document.getElementById('registerButton').addEventListener("click", validateRegistration)
}

//This function validates the username, if it doesnt work a message is raised
function validateRegistration(event) {
    event.preventDefault()

    let form = document.getElementById("registerForm")

    let username = form.querySelector('input[name="username"]').value
    let age = form.querySelector('input[name="age"]').value
    let location = form.querySelector('input[name="location"]').value
    let password = form.querySelector('input[name="password"]').value

    let regex = RegExp(/^[a-zA-Z0-9]+$/)
    let regexAge = RegExp(/^\d$/)
    let regexLocation = RegExp(/^[a-zA-Z0-9""]+$/)
    let regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)

    if(!regex.test(username)) {
        alert("Invalid username. Use letters and numbers only.")
    }
    else if(!regexAge.test(age)) {
        alert("Invalid Age. Must be a number.")
    }
    else if(!regexLocation.test(location)) {
        alert("Invalid location. Use letters, numbers and blank space only.")
    }
    else if(!regexPassword.test(password)) {
        alert("Invalid password. Must contain at least a letter and a number.")
    }
    else {
        form.submit()
    } 

    function updateTextInput(val) {
        document.getElementById("textInput").value=val; 
    }
}