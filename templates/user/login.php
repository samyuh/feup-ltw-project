<div id="login">
  <section class="name-slogan">
      <h1><a href="index.php">Pet Shelter</a></h1>
      <h2><a href="index.php">Get your little animal right here, right now!</a></h2>~
  </section>

  <div class="container-forms">
    <article class="login-forms">
      <form id="loginForm" action="../../action/action_login.php" method="post">
        <aside id="login-username-error"></aside>
        <input type="text" name="username" placeholder="Username">
 
        <aside id="login-password-error"></aside>
        <input type="password" name="password" placeholder="Password">

        <button id="loginButton" type="submit" value="Log In">Log In</button>
      </form>

      <form action="../../register.php" method="post">
          <input type="submit" value="Create New Account">
      </form>
    </article>
  </div>
</div>