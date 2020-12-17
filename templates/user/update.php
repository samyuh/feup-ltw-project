<div id="update-page">
  <article class="update-form">
        <h2>Update Photo</h2>
        <form id="update-photo-form" class="change-information" action="../../action/action_update_profile_photo.php?token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">

          <aside id="update-image">
          </aside>
          <input type="file" name="image" accept="image/*" onchange="loadFile(event)">>
          <img id="output" src="#" style="max-height:15em; max-width:15em;" alt="Image Preview" />
          
          <aside id="update-actual-password-image-error">
          </aside>
          <input type="password" name="password" placeholder="Password">

          <button id="update-photo-button" type="submit" value="Update Password">Update Information</button>
        </form>
  </article>

  <article class="update-form">
        <h2>Update Username</h2> 
        <form id="update-username-form" class="change-username" action="../../action/action_update_username.php?token=<?=$_SESSION['csrf']?>" method="post">
          <aside id="update-new-username-error">
          </aside>
          <input type="text" name="new_username" placeholder="New Username">
            
          <aside id="update-actual-password-error">
          </aside>
          <input type="password" name="password" placeholder="Actual Password">
            
          <button id="update-username-button" type="submit" value="Update Username">Update Username</button>
        </form>
    </article>

    <article class="update-form">
        <h2>Update Password</h2>
        <form id="update-password-form" class="change-password" action="../../action/action_update_password.php?token=<?=$_SESSION['csrf']?>" method="post">
        
          <aside id="update-new-password-error">
          </aside>
          <input type="password" name="new_password" placeholder="New Password">

          <aside id="update-confirm-password-error">
          </aside>
          <input type="password" name="confirm_password" placeholder="Confirm New Password">

          <aside id="update-current-password-error">
          </aside>
          <input type="password" name="password" placeholder="Current Password">
          <button id="update-password-button" type="submit" value="Update Password">Update Password</button>
        </form>
    </article>

    <article class="update-form">
        <h2>Update Information</h2>
        <form id="update-information-form" class="change-information" action="../../action/action_update_information.php?token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">

          <aside id="update-gender">
          </aside>
          <?php if($_SESSION['user']['age'] == "male") { ?>
            <section class="options">
              <label>Male <input class="hide" type="radio" name="gender" value="male" checked="checked"><i class="fa fa-fw fa-mars"></i>&nbsp;</label>
              <label>Female <input class="hide" type="radio" name="gender" value="female"><i class="fa fa-fw fa-venus"></i>&nbsp;</label>
            </section>
          <?php } else { ?>
            <section class="options">
              <label>Male <input class="hide" type="radio" name="gender" value="male"><i class="fa fa-fw fa-mars"></i>&nbsp;</label>
              <label>Female <input class="hide" type="radio" name="gender" value="female" checked="checked"><i class="fa fa-fw fa-venus"></i>&nbsp;</label>
            </section>
          <?php } ?>
          <aside id="update-age">
          </aside>
          Age <input type="range" name="age" id="registerAge" value="<?= htmlentities($_SESSION['user']['age']) ?>" min="0" max="99" oninput="this.nextElementSibling.value = this.value">
          <output><?= htmlentities($_SESSION['user']['age']) ?></output>

          <aside id="update-location">
          </aside>
          <input type="text" name="location" placeholder="location" value="<?= htmlentities($_SESSION['user']['location']) ?>">
          
          <aside id="update-actual-password-information-error">
          </aside>
          <input type="password" name="password" placeholder="Password">

          <button id="update-information-button" type="submit" value="Update Password">Update Information</button>
        </form>
    </article>

    <article class="update-form">
        <h2>Delete Profile</h2>
        <form id="delete-profile-form" class="delete-profile" action="../../action/action_delete_profile.php?token=<?=$_SESSION['csrf']?>" method="post">
          
          <aside id="update-delete-password-error">
          </aside>
          <input type="password" name="password" placeholder="Actual Password">

          <button id="delete-profile-button" type="submit" value="Update Password">Delete Profile Permanently</button>
        </form>
    </article>
</div>