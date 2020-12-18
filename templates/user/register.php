  <div id="register">
    <section class="name-slogan">
      <h1><a href="index.php">Pet Shelter</a></h1>
      <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
    </section>

    <div class="container-forms">
      <article class="register-forms">
        <form id="register-form" action="./action/action_register.php" method="post" enctype="multipart/form-data">

        <aside id="register-username-error"></aside>
        <input type="text" name="username" placeholder="Username">

        <section class="options">
          <label>Male <input class="hide" type="radio" name="gender" value="male"><i class="fa fa-fw fa-mars"></i>&nbsp;</label>
          <label>Female <input class="hide" type="radio" name="gender" value="female"><i class="fa fa-fw fa-venus"></i>&nbsp;</label>
        </section>
        
        Age <input type="range" name="age" id="register-age" value="20" min="0" max="99" oninput="this.nextElementSibling.value = this.value">
        <output>20</output>
  
        <aside id="register-location-error"></aside>
        <input type="text" name="location" placeholder="Location">

        <aside id="register-password-error"></aside>
        <input type="password" name="password" placeholder="Password">
        
        <aside id="register-image-error"></aside>
        <input type="file" name="image" accept="image/*" onchange="loadFile(event)">>
        <img id="output" src="#" style="max-height:15em; max-width:15em;" alt="Preview Image"/>
        <button id="register-button" type="submit" value="Register">Create an Account</button>
        </form>
      </article>
    </div>
  </div>