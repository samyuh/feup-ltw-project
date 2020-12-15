<div id="update">
  <article class="update">
        <form id="updateUsernameForm" class="change-username" action="../../action/action_update_username.php?token=<?=$_SESSION['csrf']?>" method="post">
          <h2>Update Username</h2> 
          <section id="updateNewUsernameError">
          </section>
          <input type="text" name="new_username" placeholder="New Username">
            
          <section id="updateActualPasswordError">
          </section>
          <input type="password" name="password" placeholder="Actual Password">
            
          <button id="updateUsernameButton" type="submit" value="Update Username">Update Username</button>
        </form>
    </article>

    <article class="update">
        <form id="updatePasswordForm" class="change-password" action="../../action/action_update_password.php?token=<?=$_SESSION['csrf']?>" method="post">
        <h2>Update Password</h2>
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
    </article>

    <article class="update">
        <form id="updateInformationForm" class="change-information" action="../../action/action_update_information.php?token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">
          <h2>Update Information</h2>

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
          <img id="output" src="#" style="max-height:15em; max-width:15em;" alt="Image Preview" />
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
          <section id="updateActualPasswordInformationError">
          </section>
          <input type="password" name="password" placeholder="Password">

          <button id="updateInformationButton" type="submit" value="Update Password">Update Information</button>
        </form>
    </article>

    <article class="update">
        <form id="deleteProfileForm" class="delete-profile" action="../../action/action_delete_profile.php?token=<?=$_SESSION['csrf']?>" method="post">
          <h2>Delete Profile</h2>

          <input type="password" name="password" placeholder="Actual Password">

          <button id="deleteProfileButton" type="submit" value="Update Password">Delete Profile Permanently</button>
        </form>
    </article>
</div>