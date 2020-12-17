// Select the button
const btnDark = document.getElementById("dark-mode-toggle");

// Listen for a click on the button 
btnDark.addEventListener("click", function() {
    document.body.classList.toggle("dark-theme")

    let request = new XMLHttpRequest()
    request.open("post", "action/action_theme.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send()
});