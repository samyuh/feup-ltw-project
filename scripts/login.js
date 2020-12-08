if(document.getElementById('login') != undefined){
    document.getElementById('loginButton').addEventListener("click",validateLogin);
}

//This function validates the input, if it doesnt work a message is raised
function validateLogin(e){
    e.preventDefault();
    let form = document.getElementById('loginForm');

    username = form.querySelector('input[name="username"]').value;
    password = form.querySelector('input[name="password"]').value;

    regex = RegExp(/^[a-zA-Z0-9]+$/);  // All letters and numbers without blanck space
    //regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/); 
    regexPassword = regex;
    //Isto faz com que as passwords atuais não funcionem pq o samu disse que queria obrigar um digito e um numero 
    //Se quiserem que o codigo corra precsiamos de meter regexPassword igual a regex

    if(!regex.test(username)){
        alert("Invalid Username!!");
    }else if(!regexPassword.test(password)){
        alert("Invalid password!!");
    }else{
        console.log(form);
        form.submit();
    }
}