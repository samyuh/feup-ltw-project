  <section id="register">
    <div class="hero-image">
      <img src="../images/family-dog.jpeg" alt="">
    </div>
    <div class="name_slogan">
      <h1><a href="index.php">Pet Shelter</a></h1>
      <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
    </div>
    <div class="container_forms">
      <form id="registerForm" action="../../action/action_register.php" method="post" enctype="multipart/form-data">
        <div class="username">
          <label>
            <input type="text" name="username" placeholder="Username">
          </label>
          <label>
            Gender <input type="text" name="gender">
          </label>
          <label>
            Age <input type="text" name="age">
          </label>
          <label>
            Location <input type="text" name="location">
          </label>
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
          <button id="registerButton" type="submit" value="Register">
        </div>
      </form>
    </div>
  </section>