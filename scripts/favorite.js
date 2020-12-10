'use strict';


if(document.getElementById('favoriteForm')) {
    document.getElementById('favoriteFormButton').addEventListener("click", validateFavorite)
}

//This function validates the input, if it doesnt work a message is raised
function validateFavorite(event) {
    event.preventDefault()

    let button = document.getElementById('favoriteFormButton')
    let star = button.className
    let id = document.getElementById('favoriteFormButton').value

    console.log(button)
    console.log(star)


    if(star == 'fa fa-star'){
        changeFavorite(true);
    }
    else{
        changeFavorite(false);
    }

    

    console.log(id)
    
    
    let request = new XMLHttpRequest()
    request.open("post", "api/set_favorite.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({'idPet': id}))
    
    
}


function changeFavorite(current){
    let button = document.getElementById('favoriteFormButton')
    
    if(current){
        button.setAttribute('class','fa fa-star-o')
    }
    else{
        button.setAttribute('class','fa fa-star')
    }

}



