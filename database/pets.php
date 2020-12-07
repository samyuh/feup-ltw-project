<?php
    function getAllDogs() {
        global $db;

        $stmt = $db->prepare('SELECT * FROM Pet ');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getPet($id){
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM Pet WHERE idPet = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        $stmt->execute();
        $user = $stmt->fetch();

        return $user;
      }

      function addPet($user, $name, $race, $gender, $size, $color) {
        global $db;
        
        $stmt = $db->prepare('INSERT INTO Pet(petName, specie, gender, size, color) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute(array($name, $race, $gender, $size, $color));

        $idPet = $db->lastInsertId();
        print($idPet);
        $stmt2 = $db->prepare('INSERT INTO UserFoundPet VALUES (?, ?)');
        $stmt2->execute(array($user['idUser'], $idPet));

        return TRUE;
      }

      function getFavoritePets($user) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM Pet, FavoritePet WHERE idUser = ? and Pet.idPet = FavoritePet.idPet');
        
        $stmt->execute(array($user['idUser']));
        $petsID = $stmt->fetchAll();


        return $petsID;
    }

    function isFavorited($user, $idPet) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM FavoritePet WHERE idUser = ? and idPet = ?');
        
        $stmt->execute(array($user['idUser'], $idPet));
        $petsID = $stmt->fetchAll();

        if(empty($petsID)) {
            return TRUE;
        } 
        else {
            return FALSE;
        }
    }

    function getPosts($idPet) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM PostsPet WHERE idPet = ?');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetchAll();

        return $petsID;
    }

    function isOwner($user, $idPet) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM UserFoundPet WHERE idUser = ? and idPet = ?');
        
        $stmt->execute(array($user['idUser'], $idPet));
        $petsID = $stmt->fetchAll();
        if(empty($petsID)) {
            return FALSE;
        } 
        else {
            return TRUE;
        }
    }

    function addPost($idPet, $question) {
        global $db;
        
        $stmt = $db->prepare('INSERT INTO PostsPet(idPet, POST) VALUES (?, ?)');
        $stmt->execute(array($idPet, $question));
    }

    function deletePost($idPost) {
        global $db;
        
        $stmt = $db->prepare('DELETE FROM PostsPet WHERE id = ?');
        $stmt->execute(array($idPost));
    }

    function updatePost($idPost, $info) {
        global $db;
        
        $stmt = $db->prepare('UPDATE PostsPet SET POST = ? WHERE id = ?');
        $stmt->execute(array($info, $idPost));  
    }

    function getAllOwner($user) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM Pet, UserFoundPet WHERE idUser = ? and Pet.idPet = UserFoundPet.idPet');
        
        $stmt->execute(array($user['idUser']));
        $petsID = $stmt->fetchAll();
        
        return $petsID;
    }

    function getPetOwner($idPet) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM User, UserFoundPet WHERE UserFoundPet.idPet = ? and User.idUser = UserFoundPet.idUser');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetch();

        return $petsID;
    }

    function getPetAdopted($idPet) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM User, UserAdoptedPet WHERE UserAdoptedPet.idPet = ? and User.idUser = UserAdoptedPet.idUser');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetch();

        return $petsID;
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
      
    function updatePet($idPet, $npetName, $nspecie, $ngender, $nsize, $ncolor) {
        global $db;
        
        $stmt = $db->prepare('UPDATE Pet SET petName = ?, specie = ?, gender = ?, size = ?, color = ? WHERE idPet = ?');

        $hashed_new_password = sha1($new_password);
        $stmt->execute(array( $npetName, $nspecie, $ngender, $nsize, $ncolor, $idPet));  
    }
?>