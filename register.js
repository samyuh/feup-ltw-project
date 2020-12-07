
if(document.getElementById('register') != undefined){
    document.getElementById('registerButton').addEventListener("click",validateRegistration);
}

//This function validates the username, if it doesnt work a message is raised
function validateRegistration(e){
    //e.preventDefault();
    let form = document.getElementById("registerForm");

    username = form.querySelector('input[name="username"]').value;
    gender = form.querySelector('input[name="gender"]').value;
    age = form.querySelector('input[name="age"]').value;
    location = form.querySelector('input[name="location"]').value;
    password = form.querySelector('input[name="password"]').value;

    regex = RegExp(/^[a-zA-Z0-9]+$/);  // All letters and numbers without blanck space
    regexGender = RegExp(/^(fe)?male$/);
    regexAge = RegExp(/^\d$/);
    regexLocation = RegExp(/^[a-zA-Z0-9""]+$/);
    regexPassword = RegExp(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/);

    if(!regex.test(username)){
        alert("Invalid Username!!");
    }else if(!regexGender.test(gender)){
        alert("Invalid Gender!!");
    }else if(!regexAge.test(age)){
        alert("Invalid Age!!");
    }else if(!regexLocation.test(location)){
        alert("Invalid location!!");
    }else if(!regexPassword.test(password)){
        alert("Invalid password!!");
    }else{
        form.submit();
    } 
}