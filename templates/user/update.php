<section id="update">
    <form id="updateUsernameForm" class="changeUsername" action="../../action/action_update_username.php" method="post">
      <h1>Update Username</h1>  
      <div id="usernameinputs">
        <label>
        New Username <input type="text" name="new_username" placeholder="New Username">
        </label>
        <label>
        Actual Password <input type="password" name="password" placeholder="Current Password">
        </label>
      </div>
      <button id="updateUsernameButton" type="submit" value="Update Username">
    </form>
</section>

<section id="updatePassword">
   <form id="updatePasswordForm" class="changePassword" act ion="../../action/action_update_password.php" method="post"> 
    <h1>Update Password</h1> 
      <label>
        <input type="password" name="new_password" placeholder="New Password">
      </label>
      <label>
        <input type="password" name="confirm_password" placeholder="Confirm New Password">
      </label>
      <label>
        <input type="password" name="password"  placeholder="Current Password">
      </label>
      <button id="updatePasswordButton" type="submit" value="Update Password">
    </form>
</section>