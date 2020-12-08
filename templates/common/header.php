<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Pet Shelter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/layout.css" rel="stylesheet">
    <link href="../../css/profile.css" rel="stylesheet">
    <link href="../../css/header.css" rel="stylesheet">
    <link href="../../css/footer.css" rel="stylesheet">
    <link href="../../css/dog-profile.css" rel="stylesheet">
    <link href="../../css/dogInformation.css" rel="stylesheet">
    <link href="../../css/home-page.css" rel="stylesheet">
    <link href="../../css/updateUser.css" rel="stylesheet">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="../../update.js" defer> </script>
   
  </head>
  <body>
    <header>
      <div id="name_slogan">
        <h1><a href="index.php">Pet Shelter</a></h1>
        <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
      </div>
      <div id="rightside">
        <div id="search">
          <form action="/index.php">
            <input type="text" placeholder="Procurar" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <div id="settings">
          <?php 
          if (!array_key_exists('user', $_SESSION) || empty($_SESSION['user'])) {
            ?>
            <div id="signup">
              <a href="../../register.php">Register</a>
              <a href="../../login.php">Login</a>
            </div>
            <?php } else { ?>
            <div id="signedin">
              <div id="Profile">
                <a href="profile.php?user=<?=$_SESSION['user']['username']?>"><?= $_SESSION['user']['username']?></a>
              </div>
              <div id="dropdown">
                <div id="Update">
                  <a href="update.php">Update Profile</a>
                </div>
                <div id="Logout">
                  <a href="../../action/action_logout.php">Logout</a>
                </div>
              </div>
            </div>
            <?php } ?> 
        </div> 
      </div>
    </header>
