'use strict'

if(document.getElementById('favorite-form')) {
    document.getElementById('favorite-form-button').addEventListener("click", validateFavorite)
}

//This function validates the input, if it doesnt work a message is raised
function validateFavorite(event) {
    event.preventDefault()

    let button = document.getElementById('favorite-form-button')
    let star = button.className
    let id = document.getElementById('favorite-form-button').value


    if(star == 'fa fa-star'){
        changeFavorite(true);
    }
    else{
        changeFavorite(false);
    }

    let request = new XMLHttpRequest()
    request.open("post", "action/action_favorite.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({'idPet': id}))
}

function changeFavorite(current){
    let button = document.getElementById('favorite-form-button')
    
    if(current){
        button.setAttribute('class','fa fa-star-o')
    }
    else{
        button.setAttribute('class','fa fa-star')
    }
}



