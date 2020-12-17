'use strict'

// This functions forces a text field to have no special characters
function regexText(string){
    return RegExp(/^[a-zA-Z0-9\s]+$/).test(string)
}

// This functions forces the username to not have black spaces
function regexUsername(string){
    return RegExp(/^[a-zA-Z0-9]+$/).test(string)
}

// This functions forces a password to have At least a letter and a number
function regexPassword(string){
    return RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/).test(string)
}

// This function forces a file to be an image
function isFileImage(file) {
    let f = file && file.split('.')[1]
    return (f === 'jpeg')  || (f ==='jpg')  || (f === 'png') 
}