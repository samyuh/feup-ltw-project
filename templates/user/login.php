<section id="login">
  <div class="hero-image">
    <img src="../images/family-dog.jpeg" alt="">
  </div>
  <div class="name_slogan">
    <h1><a href="index.php">Pet Shelter</a></h1>
    <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
  </div>
  <div class="container_forms">
    <div class="login_forms">
      <form id="loginForm" action="../../action/action_login.php" method="post">
         <section id="loginUsernameError">
        </section>
        <div class="username">
          <label>
            <input type="text" name="username" placeholder="Username">
          </label>
        </div>
        
        <section id="loginPasswordError">
        </section>
        <div class="password">
          <label>
            <input type="password" name="password" placeholder="Password">
          </label>
        </div>
        <div class="submit">
          <button id="loginButton" type="submit" value="Log In">
        </div>

      </form>
    </div>
    <div class="register_form">
      <form action="../../register.php" method="post">
        <div class="submit_register">
          <input type="submit" value="Create New Account">
        </div>
      </form>
    </div>
  </div>
</section>