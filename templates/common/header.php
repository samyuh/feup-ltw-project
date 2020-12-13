<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Pet Shelter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../../css/containers.css" rel="stylesheet">
    <link href="../../css/layout.css" rel="stylesheet">
    <link href="../../css/header.css" rel="stylesheet">
    <link href="../../css/footer.css" rel="stylesheet">
    <link href="../../css/components.css" rel="stylesheet">
    <link href="../../css/petInformation.css" rel="stylesheet">
    <link href="../../css/homepage.css" rel="stylesheet">
    <link href="../../css/update.css" rel="stylesheet">
    <link href="../../css/search_advanced.css" rel="stylesheet">
    <link href="../../css/newPet.css" rel="stylesheet">
    <link href="../../css/error404.css" rel="stylesheet">
    <link href="../../css/profile.css" rel="stylesheet">
    <link href="../../css/modal.css" rel="stylesheet">
    <!-- Add icon library -->
    
    <script src="../../scripts/search.js" defer> </script>
    <script src="../../scripts/update.js" defer> </script>
    <script src="../../scripts/addPet.js" defer> </script>
    <script src="../../scripts/favorite.js" defer> </script>
    <script src="../../scripts/add_question.js" defer> </script>
    <script src="../../scripts/notifications.js" defer> </script>
    <script src="../../scripts/dog_information.js" defer> </script>
   
  </head>
  <body>
    <header>
      <div id="name_slogan">
        <h1><a href="index.php">Pet Shelter</a></h1>
        <h2><a href="index.php">Get your little animal right here, right now!</a></h2>
        <form class="mobile_header" action="index.php">
          <button type="submit"><i class="fa fa-home"></i></button>
        </form>
      </div>
      <div id="search">
        <form class="searchbar" action="index.php" method="post">
          <input type="text" placeholder="Search" name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div id="advanced-search">
            <a class="btn btn-default btn-sm" href="../../search.php">
              <i class="fa fa-search"></i> Advanced Search</a>
        </div>
        <form class="mobile_search" action=../../search.php">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
      
      <div id="rightside">
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
                <div id="Notifications">
                  <a id="myBtn">Notifications</a>
                </div>
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

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>Some text in the Notifications Menu..</p>
    </div>

    </div>
    </header>
