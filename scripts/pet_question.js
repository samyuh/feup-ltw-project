'use strict'

if(document.getElementById('question-form')) {
    var questionForm =  document.getElementById('question-form')
    var questionPlace =  document.getElementById('question-submit')
    document.getElementById('question-form-button').addEventListener('click', addQuestion)
    refreshProfile()
}


function refreshProfile() {
    let idPet = questionForm.querySelector('input[name="idPet"]').value
    let request = new XMLHttpRequest();
    request.open('post', 'api/get_questions.php?',true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    
    request.addEventListener('load', questionsReceived)
    request.send(encodeForAjax({'idPet': idPet}))
}

function questionsReceived() {
    questionPlace.innerHTML = ''
    let lines = JSON.parse(this.responseText)
    lines.forEach(function(data){
        let line = displayQuestions(data)
        questionPlace.append(line);
    });
}

function addQuestion(event) {
    event.preventDefault()

    let question = questionForm.querySelector('input[name="question"]').value
    let idPet = questionForm.querySelector('input[name="idPet"]').value

    let request = new XMLHttpRequest()
    request.open("post", "action/action_add_question.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({'question': question, 'idPet':idPet}))

    refreshProfile()
}

function addReply(idQuestion) {
    let form = document.getElementById('reply-' + idQuestion)
    let question = form.querySelector('input[name="reply-text"]').value

    let request = new XMLHttpRequest();
    request.open('post', 'action/action_add_reply.php?',true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({'question': question,'idQuestion': idQuestion}))

    refreshProfile()
}

function deleteQuestion(idQuestion) {
    let request = new XMLHttpRequest();
    request.open('post', 'action/action_delete_question.php?',true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({'idQuestion': idQuestion}))

    refreshProfile()
}

function displayQuestions(data) {
    let idUser = questionForm.querySelector('input[name="idUser"]').value
    let owner = questionForm.querySelector('input[name="owner"]').value

    let section = document.createElement('section')
    section.setAttribute('id',data.idQuestion)

    let question = document.createElement('p')
    question.innerText = data.question

    let spanAuthor = document.createElement('span')
    spanAuthor.innerText = "Question by " + data.authorQuestion

    let spanDate = document.createElement('span')
    spanDate.innerText = " on " + data.dateQuestion

    let reply = document.createElement('form')
    reply.setAttribute('id','reply-' + data.idQuestion)

    let deleteReply = document.createElement('form')

    let deleteButton = document.createElement('button')
    deleteButton.setAttribute('name', 'delete-button')
    deleteButton.innerHTML = "Delete"
    deleteButton.addEventListener('click', function() { deleteQuestion(data.idQuestion) })
    deleteButton.addEventListener('click', prevent)

    if(data.answer == null) {
        let input = document.createElement('input')
        input.setAttribute('type','text')
        input.setAttribute('placeholder','answer to this question')
        input.setAttribute('name','reply-text')

        let submit = document.createElement('button')
        submit.setAttribute('name','submit-button')
        submit.innerHTML = "Reply"
        submit.addEventListener('click', function(){addReply(data.idQuestion)})
        submit.addEventListener('click', prevent)

        section.appendChild(question)
        section.appendChild(spanAuthor)
        section.appendChild(spanDate)

        // If user is the owner, he can reply to answers
        if(owner == idUser) {
            section.appendChild(reply)
            reply.appendChild(input)
            reply.appendChild(submit)
            section.appendChild(deleteReply)
            deleteReply.appendChild(deleteButton)
        }
    }
    else {
        let spanAnswer = document.createElement('p')
        spanAnswer.innerText = data.answer
    
        let spanAuthorAnswer = document.createElement('span')
        spanAuthorAnswer.innerText = "Answer by " + data.authorAnswer

        let spanDateAnswer = document.createElement('span')
        spanDateAnswer.innerText = " on " + data.dateAnswer

        section.appendChild(question)
        section.appendChild(spanAuthor)
        section.appendChild(spanDate)

        section.appendChild(spanAnswer)
        section.appendChild(spanAuthorAnswer)
        section.appendChild(spanDateAnswer)

        if(owner == idUser) {
            section.appendChild(deleteReply)
            deleteReply.appendChild(deleteButton)
        }
    }

    return section
}

function showReplies(data,section){
    event.preventDefault()
}


function prevent(event){
    event.preventDefault()
}

