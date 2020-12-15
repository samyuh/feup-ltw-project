<?php
    function isLogged() {
        $db = Database::instance()->db();

        if (!array_key_exists('user', $_SESSION) || empty($_SESSION['user'])) {
            return FALSE;
        }
        else {
            return TRUE;
        }
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

    function userUnique($username) {
        $db = Database::instance()->db();

        $stmtUserCheck = $db->prepare('SELECT * FROM User WHERE username = ?');;
        
        $stmtUserCheck->execute(array($username));
        $userValid = $stmtUserCheck->fetch();

        if(empty($userValid)) {
            return TRUE;
        }
        else return FALSE;

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

    function updateUsername($user, $new_username, $password) {
        $db = Database::instance()->db();

        if (checkUserPassword($user['username'], $password) !== false && userUnique($new_username)) {
            $stmt = $db->prepare('UPDATE User SET username = ? WHERE idUser = ?');
            $stmt->execute(array($new_username, $user['idUser']));

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

    function getUser($user) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM User WHERE username = (?)');;
        
        $stmt->execute(array($user));
        $user_profile = $stmt->fetch();

        return $user_profile;
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

    /* REGEX VALIDATORS */
    function validUsername($element) {
        return preg_match ("/^[a-zA-Z0-9]+$/", $element);
    }

    function validGender($element) {
        return preg_match ("/^(fe)?male$/", $element);
    }

    function validAge($element) {
        return preg_match ("/^\d+$/", $element);
    }

    function validLocation($element) {
        return preg_match ("/^[a-zA-Z0-9]+$/", $element);
    }

    function validPassword($element) {
        return preg_match ("/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/", $element);
    }

    function validName($element) {
        return preg_match ("/^[a-zA-Z0-9]+$/", $element);
    }

    function validSpecie($element) {
        return preg_match ("/^dog|cat$/", $element);
    }

    function validSize($element) {
        return preg_match ("/^small|medium|large$/", $element);
    }

    function validColor($element) {
        return preg_match ("/^[a-zA-Z0-9]+$/", $element);
    }

    function validText($element) {
        return preg_match ("/^[a-zA-Z0-9\s]+$/", $element);
    }
?>