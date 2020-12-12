<section id="update">
  <section id="updateUsername">
      <form id="updateUsernameForm" class="changeUsername" action="../../action/action_update_username.php?token=<?=$_SESSION['csrf']?>" method="post">
        <h1>Update Username</h1> 
          <label>
          New Username<input type="text" name="new_username">
          </label>
          <label>
          Actual Password<input type="password" name="password">
          </label>
        <button id="updateUsernameButton" type="submit" value="Update Username">Update Username</button>
      </form>
  </section>

  <section id="updatePassword">
      <form id="updatePasswordForm" class="changePassword" action="../../action/action_update_password.php?token=<?=$_SESSION['csrf']?>" method="post">
        <h1>Update Username</h1>  
          <label>
          New Password<input type="password" name="new_password">
          </label>
          <label>
          Confirm New Password<input type="password" name="confirm_password">
          </label>
          <label>
          Actual Password<input type="password" name="password">
          </label>
        <button id="updatePasswordButton" type="submit" value="Update Password">Update Password</button>
      </form>
  </section>
</section>