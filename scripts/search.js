'use strict'

let form = document.getElementById('name-search')
let place = document.getElementById('search-pet-profile')

// Remove after including javascript in the correct place
if(document.getElementById('name-search') != undefined) {
    refresh()
    window.setInterval(refresh, 250)
    document.getElementById('name-search').addEventListener('change',sendMessage)
}

// Ask for new messages
function refresh() {
    let request = new XMLHttpRequest()
    request.open('post', 'api/get_data.php', true)
    request.addEventListener('load', sendMessage)
    request.send()
  } 

// Send message
function sendMessage(event) {
    event.preventDefault()

    let name = document.querySelector('input[name=nameSearch]').value
    let species = document.querySelector('input[name=speciesSearch]:checked').value
    let gender = document.querySelector('input[name=genderSearch]:checked').value
    let size = document.querySelector('input[name=sizeSearch]:checked').value
    let color = document.querySelector('input[name=colorSearch]').value

    let request = new XMLHttpRequest()
    request.open("post", "api/get_data.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({'nameSearch': name, 'speciesSearch': species, 'genderSearch': gender,'sizeSearch': size, 'colorSearch': color}))

    request.addEventListener('load', messagesReceived)  

  }

// Called when messages are received
function messagesReceived() {
  place.innerHTML = ''

  let lines = JSON.parse(this.responseText)

  lines.forEach(function(data) {
    let line = showArticle(data)
    place.append(line)
    //place.scrollTop = place.scrollTopMax
  })
  
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k) {
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&')
}


function showArticle(data) {

    let id = data.idPet
    let name = data.petName
    let gender = data.gender    
    let species = data.specie
    let size = data.size
    let color = data.color

    let section = document.createElement('section')
    section.setAttribute('class','profile')

    let image = document.createElement('div')
    image.setAttribute('class','image')

    let img = document.createElement('img')
    img.setAttribute('src',"images/pet-profile/pet-" + id + "/profile.jpg")
    img.setAttribute('width','200')
    img.setAttribute('height','200')
    img.setAttribute('alt','image missing')

    image.appendChild(img)

    let info = document.createElement('div')
    info.setAttribute('class','info')

    let p1 = document.createElement('p')
    p1.innerHTML = "Name: " + name

    let p2 = document.createElement('p')
    p2.innerHTML = "Species: " + species

    let p3 = document.createElement('p')
    p3.innerHTML = "Gender: " + gender

    let p4 = document.createElement('p')
    p4.innerHTML = "Size: " + size

    let p5 = document.createElement('p')
    p5.innerHTML = "Color: " + color

    info.appendChild(p1)
    info.appendChild(p2)
    info.appendChild(p3)
    info.appendChild(p4)
    info.appendChild(p5)

    section.appendChild(image)
    section.appendChild(info)

    section.onclick = function(){
      location.href = "/pet_profile.php?idPet=" + id
    }

    return section
  }

