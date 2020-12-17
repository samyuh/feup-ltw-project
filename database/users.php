<?php
    /* 
     * Functions related to the user experience
    */

    /* 
     * Check if the user is loggedIn
    */
    function isLogged() {
        $db = Database::instance()->db();

        if (!array_key_exists('user', $_SESSION) || empty($_SESSION['user'])) {
            return FALSE;
        }
        else {
            return TRUE;
        }
     }

    /* 
     * Get User Information 
     */
    function getUser($user) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM User WHERE username = (?)');;
        
        $stmt->execute(array($user));
        $user_profile = $stmt->fetch();

        return $user_profile;
    }

    function getUserNotifications($idUser) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT User.idUser, User.username, Pet.idPet, Pet.petName 
                                from User, Pet, UserFoundPet, AdoptionProposal 
                                where UserFoundPet.idUser = ?
                                and AdoptionProposal.idPet = Pet.idPet
                                and UserFoundPet.idpet = Pet.idPet
                                and User.idUser = AdoptionProposal.iduser');
        
        $stmt->execute(array($idUser));
        $notifications = $stmt->fetchAll();

        return $notifications;
    }

     /* 
     * Login and Register related functions 
     */
     function userUnique($username) {
        $db = Database::instance()->db();

        $stmtUserCheck = $db->prepare('SELECT * FROM User WHERE username = ?');;
        
        $stmtUserCheck->execute(array($username));
        $userValid = $stmtUserCheck->fetch();

        if(empty($userValid)) return TRUE;
        else return FALSE;
    }

    function checkUserPassword($username, $password) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($username));

        $user = $stmt->fetch();

        if($user !== false && password_verify($password, $user['password'])) {
            return $user;
        }
        else {
            return false;
        }
    }

    function insertUser($username, $gender, $age, $location, $password) {
        $db = Database::instance()->db();
        
        if(userUnique($username)) {
            $stmt = $db->prepare('INSERT INTO User(username, gender, age, location, password) VALUES (?, ?, ?, ?, ?)');

            $options = ['cost' => 12];
            $stmt->execute(array($username, $gender, $age, $location, password_hash($password, PASSWORD_DEFAULT, $options)));

            $idUser = $db->lastInsertId();
            $originalFileName = "../images/user/user-$idUser.jpg";
            move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

            if(($username != NULL) && ($gender != NULL) && ($age != NULL) && ($location != NULL) && ($password != NULL)) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }

    /* 
     * Update user information 
     */
    function updateUsername($user, $new_username, $password) {
        $db = Database::instance()->db();

        if (checkUserPassword($user['username'], $password) !== false && userUnique($new_username)) {
            $stmt = $db->prepare('UPDATE User SET username = ? WHERE idUser = ?');
            $stmt->execute(array($new_username, $user['idUser']));

            return TRUE;
        }
        else return FALSE;
      }

    function updateUserInfo($user, $new_gender, $new_age, $new_location, $password) {
        $db = Database::instance()->db();

        if (checkUserPassword($user['username'], $password) !== false) {
            $stmt = $db->prepare('UPDATE User SET gender = ?, age = ?, location = ? WHERE idUser = ?');
            $stmt->execute(array($new_gender, $new_age, $new_location, $user['idUser']));
            
            $idUser = $user['idUser'];
            $originalFileName = "../images/user/user-$idUser.jpg";
            move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

            return TRUE;
        }
        else return FALSE;
      }

      function updateUserProfilePhoto($user, $password) {
        $db = Database::instance()->db();

        if (checkUserPassword($user['username'], $password) !== false) {
            $idUser = $user['idUser'];
            $originalFileName = "../images/user/user-$idUser.jpg";
            move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

            return TRUE;
        }
        else return FALSE;
      }

      function updatePassword($user, $new_password, $password) {
        $db = Database::instance()->db();

        if (checkUserPassword($user['username'], $password) !== false) {
            $stmt = $db->prepare('UPDATE User SET password = ? WHERE idUser = ?');

            $options = ['cost' => 12];
            $stmt->execute(array(password_hash($new_password, PASSWORD_DEFAULT, $options), $user['idUser']));
            
            return TRUE;
        }
        else return FALSE;
      }

    function deleteUser($user, $password) {
        $db = Database::instance()->db();

        if (checkUserPassword($user['username'], $password) !== false) {
            $stmt = $db->prepare('DELETE FROM User WHERE username = ?');
            $stmt->execute(array($user['username']));

            return TRUE;
        }
        else return FALSE;
      }
?>