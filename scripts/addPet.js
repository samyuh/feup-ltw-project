'use strict'

if(document.getElementById('addPetForm')) {
    document.getElementById('addPetButton').addEventListener("click", validateAddPet)
}


function validateAddPet(event) {
    event.preventDefault()

    let form = document.getElementById("addPetForm")

    let username = form.querySelector('input[name="npetName"]').value
    let color = form.querySelector('input[name="ncolor"]').value
    
    let path = form.querySelector('input[name="image"]').value
    let file = path.replace(/^.*\\/, "");


    let regex = RegExp(/^[a-zA-Z0-9]+$/)
    let regexColor = RegExp(/^[a-zA-Z0-9""]+$/)


    if(!regex.test(username)) {
        alert("Invalid username. Use letters and numbers only.")
    }
    else if(!regexColor.test(color)) {
        alert("Invalid color. Must contain letters and whitespace only.")
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