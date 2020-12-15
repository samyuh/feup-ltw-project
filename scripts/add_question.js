'use strict';

if(document.getElementById('question-form')) {
    var questionForm =  document.getElementById('question-form')
    var questionPlace =  document.getElementById('question-submit')
    document.getElementById('questionFormButton').addEventListener('click', addQuestion)
    refreshProfile()
}


function refreshProfile(){

    let idPet = questionForm.querySelector('input[name="idPet').value
    let request = new XMLHttpRequest();
    request.open('post', 'api/get_questions.php?',true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    
    request.addEventListener('load', questionsReceived);
    request.send(encodeForAjax({'idPet': idPet}))
}

function questionsReceived(){
    questionPlace.innerHTML = ''
    console.log(this.responseText)
    let lines = JSON.parse(this.responseText);
    lines.forEach(function(data){
        let line = displayQuestions(data)
        questionPlace.append(line);
    });
}

function addQuestion(event) {
    event.preventDefault()

    let question = questionForm.querySelector('input[name="question"]').value
    let idPet = questionForm.querySelector('input[name="idPet').value

    let request = new XMLHttpRequest()
    request.open("post", "api/add_question.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({'question': question, 'idPet':idPet}))

    refreshProfile()
}

function displayQuestions(data){
    let section = document.createElement('section')
    section.setAttribute('id',data.idQuestion)

    let question = document.createElement('p')
    question.innerText = data.question

    

    let reply = document.createElement('form')
    reply.setAttribute('id','reply-' + data.idQuestion)

    section.appendChild(question)
    
    if(data.answer == null){
        let input = document.createElement('input')
        input.setAttribute('type','text')
        input.setAttribute('placeholder','answer to this question')
        input.setAttribute('name','idReply')

        let submit = document.createElement('button')
        submit.setAttribute('name','submitButton')
        submit.innerHTML = "Submit"
        submit.addEventListener('click', function(){addReply(data.idQuestion)})
        submit.addEventListener('click', prevent)

        reply.appendChild(input)
        reply.appendChild(submit)
        section.appendChild(reply)
    }
    else{
        let spanAuthor = document.createElement('p')
        spanAuthor.innerText = "Author: " + data.authorQuestion
    
        let spanDate = document.createElement('p')
        spanDate.innerText = "Date: " + data.dateQuestion

        let spanDateAnswer = document.createElement('p')
        spanDateAnswer.innerText = "Date: " + data.dateAnswer
    
        let spanAuthorAnswer = document.createElement('p')
        spanAuthorAnswer.innerText = "Author: " + data.authorAnswer

        let spanAnswer = document.createElement('p')
        spanAnswer.innerText = "Answer: " + data.answer


        section.appendChild(spanAuthor)
        section.appendChild(spanDate)
        section.appendChild(spanDateAnswer)
        section.appendChild(spanAuthorAnswer)
        section.appendChild(spanAnswer)
    }

    return section
}

function addReply(idQuestion){

    let form = document.getElementById('reply-' + idQuestion)
    let question = form.querySelector('input[name="idReply').value

    let request = new XMLHttpRequest();
    request.open('post', 'api/add_reply.php?',true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({'question': question,'idQuestion': idQuestion}))

    refreshProfile()
}


function showReplies(data,section){
    event.preventDefault()
}


function prevent(event){
    event.preventDefault()
}

