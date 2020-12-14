<div class="login">
  <section class="name_slogan">
      <h1><a href="index.php">Pet Shelter</a></h1>
      <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
  </section>

  <div class="container_forms">
    <article class="login_forms">
      <form id="loginForm" action="../../action/action_login.php" method="post">
        <section id="loginUsernameError">
        </section>
        <input type="text" name="username" placeholder="Username">
 
        <section id="loginPasswordError">
        </section>
        <input type="password" name="password" placeholder="Password">

        <button id="loginButton" type="submit" value="Log In">Log In</button>
      </form>

      <form action="../../register.php" method="post">
          <input type="submit" value="Create New Account">
      </form>
    </article>
  </div>
</div>