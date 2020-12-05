<?php
     function userExists($username, $password) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ?');

        $hashed_password = sha1($password);
        $stmt->execute(array($username, $hashed_password));
        $user = $stmt->fetch();

        if ($user) {
            return $user;
        }
        else return FALSE;
    }

    function insert($username, $gender, $age, $location, $password) {
        global $db;

        $stmt = $db->prepare('INSERT INTO User(username, gender, age, location, password) VALUES (?, ?, ?, ?, ?)');
        
        $hashed_password = sha1($password);
        $stmt->execute(array($username, $gender, $age, $location, $hashed_password));

        if(($username != NULL) && ($gender != NULL) && ($age != NULL) && ($location != NULL) && ($password != NULL)) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    function getUser($user) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM User WHERE username = (?)');;
        
        $stmt->execute(array($user));
        $user_profile = $stmt->fetch();

        return $user_profile;
    }

    function updateUsername($user, $new_username, $password) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ?');

        $hashed_password = sha1($password);
        $stmt->execute(array($user['username'], $hashed_password));
        $userVerify = $stmt->fetch();

        if ($userVerify) {
            $stmt = $db->prepare('UPDATE User SET username = ? WHERE idUser = ?');
            $stmt->execute(array($new_username, $user['idUser']));
            
            return TRUE;
        }
        else return FALSE;
      }

      function updatePassword($user, $new_password, $password) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ?');

        $hashed_password = sha1($password);
        $stmt->execute(array($user['username'], $hashed_password));
        $userVerify = $stmt->fetch();

        if ($userVerify) {
            $stmt = $db->prepare('UPDATE User SET password = ? WHERE idUser = ?');

            $hashed_new_password = sha1($new_password);
            $stmt->execute(array($hashed_new_password, $user['idUser']));
            
            return TRUE;
        }
        else return FALSE;
      }

      function updateFavoriteList($user, $idPet) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM FavoritePet WHERE idUser = ? and idPet = ?');
        
        $stmt->execute(array($user['idUser'], $idPet));
        $petsID = $stmt->fetchAll();
        if(empty($petsID)) {
            $stmt = $db->prepare('INSERT INTO FavoritePet VALUES (?, ?)');
            $stmt->execute(array($user['idUser'], $idPet));
            print('add');
        }
        else {
            $stmt = $db->prepare('DELETE FROM FavoritePet WHERE idUser = ? and idPet = ?');
            $stmt->execute(array($user['idUser'], $idPet));
            print('del');
        }
      }
?>