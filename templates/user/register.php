  <div id="register">
    <section class="name_slogan">
      <h1><a href="index.php">Pet Shelter</a></h1>
      <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
    </section>

    <div class="container_forms">
      <article class="register_forms">
        <form id="registerForm" action="../../action/action_register.php" method="post" enctype="multipart/form-data">

        <section id="registerUsernameError"></section>
        <input type="text" name="username" placeholder="Username">

        Male <input type="radio"  name="gender" value="male" checked="checked">
        Female <input type="radio"  name="gender" value="female">

        Age <input type="range" name="age" id="registerAge" value="20" min="0" max="99" oninput="this.nextElementSibling.value = this.value">
        <output>20</output>
  
        <section id="registerLocationError"></section>
        <input type="text" name="location" placeholder="Location">

        <section id="registerPasswordError">
        </section>
        <input type="password" name="password" placeholder="Password">
        
        <section id="registerImageError">
        </section>
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