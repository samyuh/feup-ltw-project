'use strict'

if(document.getElementById('form-new-pet')) {
    document.getElementById('add-pet-button').addEventListener("click", validateAddPet)
}


function validateAddPet(event) {
    event.preventDefault()

    let form = document.getElementById("form-new-pet")

    let petName = form.querySelector('input[name="npetName"]').value
    let bio = document.querySelector('input[name="bio"]').value
    let color = form.querySelector('input[name="ncolor"]').value
    let path = form.querySelector('input[name="image"]').value
    let file = path.replace(/^.*\\/, "");

    clearAddPetHTML()

    let petNameError = false
    let bioError = false
    let colorError = false
    let fileError = false

    if(!regexText(petName)) {
        petNameError = updateError('addPet-petName-error',"Invalid pet name. Please don't use special characters")
    }
    if(!regexText(bio)) {
        bioError = updateError('addPet-bio-error',"Invalid pet bio. Please don't use special characters.")
    }
    if(!regexText(color)) {
        colorError = updateError('addPet-color-error',"Invalid pet color. Please don't use special characters.")
    }
    if(!isFileImage(file)){
        fileError = updateError('addPet-file-error',"Invalid file. Must be an image.")
    }
    if(!petNameError && !colorError && !bioError && !fileError){
        form.submit()
    } 
}

function clearAddPetHTML(){
    document.getElementById('addPet-petName-error').innerHTML = ''
    document.getElementById('addPet-bio-error').innerHTML = ''
    document.getElementById('addPet-color-error').innerHTML = ''
    document.getElementById('addPet-file-error').innerHTML = ''
}