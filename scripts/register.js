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

    let regex = RegExp(/^[a-zA-Z0-9]+$/)  // All letters and numbers without blanck space
    let regexGender = RegExp(/^(fe)?male$/)
    let regexAge = RegExp(/^\d+$/)
    let regexLocation = RegExp(/^[a-zA-Z0-9""]+$/)
    let regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)
    let path = form.querySelector('input[name="image"]').value
    var file = path.replace(/^.*\\/, "")

    if(!regex.test(username)) {
        alert("Invalid username. Use letters and numbers only.")
    }
    else if(!regexLocation.test(location)) {
        alert("Invalid location. Use letters, numbers and blank space only.")
    }
    else if(!regexPassword.test(password)) {
        alert("Invalid password. Must contain at least a letter and a number.")
    }
    else if(!isFileImage(file)){
        alert("Invalid file. Must be an image.")
    }
    else {
        form.submit()
    } 

    
}

function isFileImage(file) {
    let f = file && file.split('.')[1]
    return (f === 'jpeg')  || (f ==='jpg')  || (f === 'png') 
}