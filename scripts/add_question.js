'use strict';

if(document.getElementById('questionForm')) {
    var questionForm =  document.getElementById('questionForm')
    var questionPlace =  document.getElementById('qs')
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
    section.setAttribute('id','uniquequestion')

    let p1 = document.createElement('p')
    p1.innerText = data.question
    let p2 = document.createElement('p')
    p2.innerText = data.authorQuestion
    let p3 = document.createElement('p')
    p3.innerText = data.dateQuestion

    section.appendChild(p1)
    section.appendChild(p2)
    section.appendChild(p3)

    return section
}   