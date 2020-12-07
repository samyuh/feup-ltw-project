<section id="update">
    <h1>Update Username</h1>
    <form id="updateUsernameForm" action="action_update_username.php" method="post">
      <label>
        New Username <input type="text" name="new_username">
      </label>
      <label>
        Actual Password <input type="password" name="password">
      </label>
      <input id="updateUsernameButton" type="submit" value="update">
    </form>
    <h1>Update Password</h1>
    <form id="updatePasswordForm" action="action_update_password.php" method="post">
      <label>
        New Password <input type="text" name="new_password">
      </label>
      <label>
        Confirm New Password <input type="password" name="confirm_password">
      </label>
      <label>
        Actual Password <input type="password" name="password">
      </label>
      <input id="updatePasswordButton" type="submit" value="update">
    </form>
  </section>