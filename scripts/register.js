'use strict'

if(document.getElementById('register')) {
    document.getElementById('register-button').addEventListener("click", validateRegistration)
}

//This function validates the username, if it doesnt work a message is raised
function validateRegistration(event) {
    event.preventDefault()

    let form = document.getElementById("register-form")

    let username = form.querySelector('input[name="username"]').value
    let location = form.querySelector('input[name="location"]').value
    let password = form.querySelector('input[name="password"]').value

    let regex = RegExp(/^[a-zA-Z0-9]+$/)  // All letters and numbers without blanck space
    let regexGender = RegExp(/^(fe)?male$/)
    let regexAge = RegExp(/^\d+$/)
    let regexLocation = RegExp(/^[a-zA-Z0-9""]+$/)
    let regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)
    let path = form.querySelector('input[name="image"]').value
    var file = path.replace(/^.*\\/, "")

    let errorUsername = false
    let errorLocation = false
    let errorPassword = false
    let errorImage = false

    clearRegisterHTML()



    if(!regex.test(username)) {
        errorUsername = registerError('register-username-error',"Invalid username. Use letters and numbers only.")
    }
    if(!regexLocation.test(location)) {
        errorLocation = registerError('register-location-error',"Invalid location. Use letters, numbers and blank space only.")
    }
    if(!regexPassword.test(password)) {
        errorPassword = registerError('register-password-error',"Invalid password. Must contain at least a letter and a number.")
    }
    if(!isFileImage(file)){
        errorImage = registerError('register-image-error',"Invalid file. Must be an image.")
    }
    if(!errorUsername && !errorLocation && !errorPassword && !errorImage){
        form.submit()
    } 

    
}

function isFileImage(file) {
    let f = file && file.split('.')[1]
    return (f === 'jpeg')  || (f ==='jpg')  || (f === 'png') 
}

function registerError(id,message){
    let section = document.getElementById(id)

    let p0 = document.createElement('p')
    p0.innerText = message

    section.appendChild(p0)

    return true
}



function clearRegisterHTML(){
    document.getElementById('register-username-error').innerHTML = ''
    document.getElementById('register-location-error').innerHTML = ''
    document.getElementById('register-password-error').innerHTML = ''
    document.getElementById('register-image-error').innerHTML = ''
    
}
