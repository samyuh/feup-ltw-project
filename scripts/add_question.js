'use strict';

if(document.getElementById('questionForm')) {
    //document.getElementById('questionFormButton').addEventListener("click", validateAddQuestion)
}


function validateAddQuestion(event) {
    event.preventDefault()

    let form = document.getElementById('questionForm')

    let question = form.querySelector('input[name="question"]').value


    let idPet = form.querySelector('input[name="question"]').id

    console.log(form)
    console.log(question)
    console.log(idPet)


    
    let request = new XMLHttpRequest()
    request.open("post", "action/action_add_question.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({'question': question, 'idPet':idPet}))
    
    add_question(question)

}



function add_question(question){

    let quest = document.getElementById('userQuestions')

    let sec = document.createElement('section')

    let p = document.createElement('p')
    p.innerText = question

    console.log(quest)
    console.log(sec)
    console.log(p)
    console.log(question)

    sec.appendChild(p)
    quest.appendChild(sec)

}   