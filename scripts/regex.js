'use strict'

// This functions forces a text field to have no special characters
function regexText(string){
    return RegExp(/^(\w|\s|,|!|\?|')+$/).test(string)
}

// This functions forces the username to not have black spaces
function regexUsername(string){
    return RegExp(/^[a-zA-Z0-9]+$/).test(string)
}


function regexPassword(string){
    return RegExp(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/).test(string)
}


// This function forces a file to be an image
function isFileImage(file) {
    let f = file && file.split('.')[1]
    return (f === 'jpeg')  || (f ==='jpg')  || (f === 'png') 
}