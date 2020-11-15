<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Pet Shelter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/style.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <h1><a href="index.php">Pet Shelter</a></h1>
      <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
      <?php 
      if (!array_key_exists('username', $_SESSION) || empty($_SESSION['username'])) {
        ?>
        <div id="signup">
          <a href="../../register.php">Register</a>
          <a href="../../login.php">Login</a>
        </div>
        <?php } else { ?>
        <div id="Profile">
          <a href=""><?= $_SESSION['username']?></a>
        </div>
        <div id="Update">
          <a href="">Update Profile</a>
        </div>
        <div id="Logout">
          <a href="action_logout.php">Logout</a>
        </div>
        <?php } ?>
      
      <div id="search">
        <a href="">Search</a>
      </div>
    </header>
