'use strict'

if(document.getElementById('posts-form')) {
    var postForm = document.getElementById("posts-form")
    var postPlace = document.getElementById("uniquepost")
    document.getElementById('posts-button').addEventListener("click", sendAjaxPosts)
    refreshPosts()
}


function refreshPosts() {
  let idPet = postForm.querySelector('input[name="idPet"]').value

  let request = new XMLHttpRequest();
  request.open('post', 'api/get_posts.php?',true)
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
  
  request.addEventListener('load', postsReceived)
  request.send(encodeForAjax({'idPet': idPet}))
}

// Send message
function sendAjaxPosts(event) {
    event.preventDefault()

    let post = postForm.querySelector('input[name=post]').value
    let idPet = postForm.querySelector('input[name=idPet]').value

    let request = new XMLHttpRequest()
    request.open("post", "action/action_add_post.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({'post': post, 'idPet': idPet}))

    refreshPosts()

  }

// Called when messages are received
function postsReceived() {
  postPlace.innerHTML = ''

  let lines = JSON.parse(this.responseText)

  lines.forEach(function(data) {
    let line = showPosts(data)
    postPlace.append(line)
    //place.scrollTop = place.scrollTopMax
  })
  
}
function showPosts(data) {

    let section = document.createElement('section')

    let p = document.createElement('p')
    p.innerText = data.post

    let spanAuthor = document.createElement('span')
    spanAuthor.innerHTML = data.author

    let spanDate = document.createElement('span')
    spanDate.innerHTML = " on " + data.datePost    

    section.appendChild(p)
    section.appendChild(spanAuthor)
    section.appendChild(spanDate)

    return section
  }
