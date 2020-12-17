// Select the button
const btnDark = document.querySelector(".teste");

// Listen for a click on the button 
btnDark.addEventListener("click", function() {
    // Toggle the .dark-theme class on each click
    document.body.classList.toggle("dark-theme");

    // Let's say the theme is equal to light
    let theme = "light";
    // If the body contains the .dark-theme class...
    if (document.body.classList.contains("dark-theme")) {
    // ...then let's make the theme dark
    theme = "dark";
    }

    let request = new XMLHttpRequest()
    request.open("post", "action/action_theme.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send()
});