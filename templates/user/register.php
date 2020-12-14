  <section id="register">
    <div class="container_forms">
      <form id="registerForm" action="../../action/action_register.php" method="post" enctype="multipart/form-data">
        <div class="username">
        <section id="registerUsernameError"></section>
          <input type="text" name="username" placeholder="Username">
        </div>

        <div class="gender">
          Male <input type="radio"  name="gender" value="male" checked="checked">
          Female <input type="radio"  name="gender" value="female">
        </div>

        <div class="age">
          Age <input type="range" name="age" id="registerAge" value="20" min="0" max="99" oninput="this.nextElementSibling.value = this.value">
          <output>20</output>
        </div>    
        
        <div class="location">
          <section id="registerLocationError"></section>
          <input type="text" name="location" placeholder="Location">
        </div>
        <div class="password">

          <section id="registerPasswordError">
          </section>
          <label>
            <input type="password" name="password" placeholder="Password">
          </label>
        </div>
        
        <section id="registerImageError">
        </section>
        <div class="image">
          <input type="file" name="image" accept="image/*" onchange="loadFile(event)">>
          <img id="output" style="max-height:15em; max-width:15em;" />
          <!--- Clean this --->
          <script>
            var loadFile = function(event) {
              var output = document.getElementById('output');
              output.src = URL.createObjectURL(event.target.files[0]);
              output.onload = function() {
                URL.revokeObjectURL(output.src) 
              }
            };
          </script>
          <!--- Clean this --->
        </div>
        <div class="submit">
          <button id="registerButton" type="submit" value="Register">Create an Account</button>
        </div>
      </form>
    </div>
    <div class="name_slogan">
      <h1><a href="index.php">Pet Shelter</a></h1>
      <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
    </div>
  </section>