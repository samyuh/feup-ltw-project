<div id="update-page">
  <article class="update-form">
        <h2>Update Username</h2> 
        <form id="update-username-form" class="change-username" action="../../action/action_update_username.php?token=<?=$_SESSION['csrf']?>" method="post">
          <section id="update-new-username-error">
          </section>
          <input type="text" name="new_username" placeholder="New Username">
            
          <section id="update-actual-password-error">
          </section>
          <input type="password" name="password" placeholder="Actual Password">
            
          <button id="update-username-button" type="submit" value="Update Username">Update Username</button>
        </form>
    </article>

    <article class="update-form">
        <h2>Update Password</h2>
        <form id="update-password-form" class="change-password" action="../../action/action_update_password.php?token=<?=$_SESSION['csrf']?>" method="post">
        
          <section id="update-new-password-error">
          </section>
          <input type="password" name="new_password" placeholder="New Password">

          <section id="update-confirm-password-error">
          </section>
          <input type="password" name="confirm_password" placeholder="Confirm New Password">

          <section id="update-current-password-error">
          </section>
          <input type="password" name="password" placeholder="Current Password">
          <button id="update-password-button" type="submit" value="Update Password">Update Password</button>
        </form>
    </article>

    <article class="update-form">
        <h2>Update Information</h2>
        <form id="update-information-form" class="change-information" action="../../action/action_update_information.php?token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">

          <section id="update-gender">
          </section>
          Male <input type="radio" name="gender" value="male">
          Female <input type="radio" name="gender" value="female">

          <section id="update-age">
          </section>
          Age <input type="range" name="age" id="registerAge" value="20" min="0" max="99" oninput="this.nextElementSibling.value = this.value">
          <output>20</output>


          <section id="update-location">
          </section>
          <input type="text" name="location" placeholder="Location">

          <section id="update-image">
          </section>
          <input type="file" name="image" accept="image/*" onchange="loadFile(event)">>
          <img id="output" src="#" style="max-height:15em; max-width:15em;" alt="Image Preview" />
          
          <section id="update-actual-password-information-error">
          </section>
          <input type="password" name="password" placeholder="Password">

          <button id="update-information-button" type="submit" value="Update Password">Update Information</button>
        </form>
    </article>

    <article class="update-form">
        <h2>Delete Profile</h2>
        <form id="delete-profile-form" class="delete-profile" action="../../action/action_delete_profile.php?token=<?=$_SESSION['csrf']?>" method="post">
          

          <input type="password" name="password" placeholder="Actual Password">

          <button id="delete-profile-button" type="submit" value="Update Password">Delete Profile Permanently</button>
        </form>
    </article>
</div>

<!--- Clean this -->
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
<!--- Clean this -->