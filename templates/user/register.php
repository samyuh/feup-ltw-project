  <div id="register">
    <section class="name-slogan">
      <h1><a href="index.php">Pet Shelter</a></h1>
      <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
    </section>

    <div class="container-forms">
      <article class="register-forms">
        <form id="registerForm" action="../../action/action_register.php" method="post" enctype="multipart/form-data">

        <aside id="register-username-error"></aside>
        <input type="text" name="username" placeholder="Username">

        Male <input type="radio"  name="gender" value="male" checked="checked">
        Female <input type="radio"  name="gender" value="female">

        Age <input type="range" name="age" id="registerAge" value="20" min="0" max="99" oninput="this.nextElementSibling.value = this.value">
        <output>20</output>
  
        <aside id="register-location-error"></aside>
        <input type="text" name="location" placeholder="Location">

        <aside id="register-password-error"></aside>
        <input type="password" name="password" placeholder="Password">
        
        <aside id="register-image-error"></aside>
        <input type="file" name="image" accept="image/*" onchange="loadFile(event)">>
        <img id="output" src="#" style="max-height:15em; max-width:15em;" alt="Preview Image"/>
        <!--- Clean this -->
        <script>
          var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
              URL.revokeObjectURL(output.src) 
            }
          };
        </script>
        <!--- Clean this -->
        <button id="registerButton" type="submit" value="Register">Create an Account</button>
        </form>
      </article>
    </div>
  </div>