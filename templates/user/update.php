<section id="update">
    <form class="changeUsername" action="../../action/action_update_username.php" method="post">
      <h1>Update Username</h1>  
      <div id="usernameinputs">
        <label>
          <input type="text" name="new_username" placeholder="New Username">
        </label>
        <label>
          <input type="password" name="password" placeholder="Current Password">
        </label>
      </div>
      <input type="submit" value="Update Username">
    </form>
    <form class="changePassword" action="../../action/action_update_password.php" method="post">  
      <h1>Update Password</h1>
      <label>
        <input type="text" name="new_password" placeholder="New Password">
      </label>
      <label>
        <input type="password" name="confirm_password" placeholder="Confirm New Password">
      </label>
      <label>
        <input type="password" name="password"  placeholder="Current Password">
      </label>
      <input type="submit" value="Update Password">
    </form>
  </section>