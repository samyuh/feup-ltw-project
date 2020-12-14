<section id="update">
  <section id="updatecontainers">
    <section id="updateUsername">
        <form id="updateUsernameForm" class="changeUsername" action="../../action/action_update_username.php?token=<?=$_SESSION['csrf']?>" method="post">
        <h1>Update Username</h1>  
          <div id="usernameinputs">

            <section id="updateNewUsernameError">
            </section>
            <input type="text" name="new_username" placeholder="New Username">
            
            <section id="updateActualPasswordError">
            </section>
            <input type="password" name="password" placeholder="Actual Password">
            
          </div>
          <button id="updateUsernameButton" type="submit" value="Update Username">Update Username</button>
        </form>
    </section>

    <section id="updatePassword">
        <form id="updatePasswordForm" class="changePassword" action="../../action/action_update_password.php?token=<?=$_SESSION['csrf']?>" method="post">
          <h1>Update Password</h1> 

          <section id="updateNewPasswordError">
          </section>
          <input type="password" name="new_password" placeholder="New Password">

          <section id="updateConfirmPasswordError">
          </section>
          <input type="password" name="confirm_password" placeholder="Confirm New Password">

          <section id="updateCurrentPasswordError">
          </section>
          <input type="password" name="password" placeholder="Current Password">
          <button id="updatePasswordButton" type="submit" value="Update Password">Update Password</button>
        </form>
    </section>

    <section id="updateInformation">
        <form id="updateInformationForm" class="changeInformation" action="../../action/action_update_information.php?token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">
          <h1>Update Information</h1> 
          <section id="updateGender">
          </section>
          Male <input type="radio" name="gender" value="male">
          Female <input type="radio" name="gender" value="female">

          <section id="updateAge">
          </section>
          Age <input type="range" name="age" id="registerAge" value="20" min="0" max="99" oninput="this.nextElementSibling.value = this.value">
          <output>20</output>

          <section id="updateLocation">
          </section>
          <input type="text" name="location" placeholder="Location">

          <section id="updateImage">
          </section>
          <input type="file" name="image" accept="image/*" onchange="loadFile(event)">>
          <img id="output" style="max-height:15em; max-width:15em; alignment: center;" />
          <script>
            var loadFile = function(event) {
              var output = document.getElementById('output');
              output.src = URL.createObjectURL(event.target.files[0]);
              output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
              }
            };
          </script>

          <section id="updateActualPasswordError">
          </section>
          <input type="password" name="password" placeholder="Password">

          <button id="updatePasswordButton" type="submit" value="Update Password">Update Information</button>
        </form>
    </section>

    <section id="deleteProfile">
        <form id="deleteProfileForm" class="deleteProfile" action="../../action/action_delete_profile.php?token=<?=$_SESSION['csrf']?>" method="post">
          <h1>Delete Profile</h1>  
          <label>
            Actual Password<input type="password" name="password">
          </label>
          <button id="deleteProfileButton" type="submit" value="Update Password">Delete Profile Permanently</button>
        </form>
    </section>
  </section>
</section>