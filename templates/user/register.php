  <section id="register">
    <div class="name_slogan">
      <h1><a href="index.php">Pet Shelter</a></h1>
      <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
    </div>
    <div class="container_forms">
      <form id="registerForm" action="../../action/action_register.php" method="post" enctype="multipart/form-data">
        <div class="username">
           <input type="text" name="username" placeholder="Username">
        </div>
        <div class="gender">
            <h3>Gender</h3>
            <div class="genderoptions">
              Male <input type="radio" id="registerGender" name="gender" value="male" checked="checked">
              Female <input type="radio" id="registerGender" name="gender" value="female">
            </div>
        </div>
        <div class="age">
            <h3>Age</h3> <input type="range" name="age" id="registerAge" value="20" min="0" max="99" oninput="this.nextElementSibling.value = this.value">
            <output>20</output>
        </div>    
        <div class="location">
          	<input type="text" name="location" placeholder="Location">
        </div>
        <div class="password">
          <label>
            <input type="password" name="password" placeholder="Password">
          </label>
        </div>
        <div class="image">
          <input type="file" name="image">
        </div>
        <div class="submit">
          <button id="registerButton" type="submit" value="Register">Create an Account</button>
        </div>
      </form>
    </div>
  </section>