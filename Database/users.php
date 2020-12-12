<?php
     function isLogged() {
        global $db;

        if (!array_key_exists('user', $_SESSION) || empty($_SESSION['user'])) {
            return FALSE;
        }
        else {
            return TRUE;
        }
     }

    function checkUserPassword($username, $password) {
        global $db;

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
        global $db;

        $stmtUserCheck = $db->prepare('SELECT * FROM User WHERE username = (?)');;
        
        $stmtUserCheck->execute(array($username));
        $userValid = $stmtUserCheck->fetch();
        
        if(empty($userValid)) {
            $stmt = $db->prepare('INSERT INTO User(username, gender, age, location, password) VALUES (?, ?, ?, ?, ?)');

            $options = ['cost' => 12];
            $stmt->execute(array($username, $gender, $age, $location, password_hash($password, PASSWORD_DEFAULT, $options)));

            $idUser = $db->lastInsertId();
            $originalFileName = "../images/user/user-$idUser.jpg";
            move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

            $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT, $options)));
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

    function updateUsername($user, $new_username, $password) {
        global $db;

        if (checkUserPassword($user['username'], $password) !== false) {
            $stmt = $db->prepare('UPDATE User SET username = ? WHERE idUser = ?');
            $stmt->execute(array($new_username, $user['idUser']));

            return TRUE;
        }
        else return FALSE;
      }

      function updatePassword($user, $new_password, $password) {
        global $db;

        if (checkUserPassword($user['username'], $password) !== false) {
            $stmt = $db->prepare('UPDATE User SET password = ? WHERE idUser = ?');

            $options = ['cost' => 12];
            $stmt->execute(array(password_hash($new_password, PASSWORD_DEFAULT, $options), $user['idUser']));
            
            return TRUE;
        }
        else return FALSE;
      }

    function getUser($user) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM User WHERE username = (?)');;
        
        $stmt->execute(array($user));
        $user_profile = $stmt->fetch();

        return $user_profile;
    }
?>