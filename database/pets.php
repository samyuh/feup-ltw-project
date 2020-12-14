<?php
    function getAllDogs() {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM Pet ');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getPet($id){
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM Pet WHERE idPet = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        $stmt->execute();
        $user = $stmt->fetch();

        return $user;
      }

      function getPetsByName($name) {
        $db = Database::instance()->db();

        $name2 = "%$name%";
        $stmt = $db->prepare('SELECT * FROM Pet WHERE
                              petName LIKE :petN');
        $stmt->bindParam(':petN', $name2, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

      function getPetsByAll($name,$specie,$gender,$size,$color){
        $db = Database::instance()->db();

        $name2 = "%$name%";
        $specie2 = "%$specie%";
        $gender2 = "%$gender%";
        $size2 = "%$size%";
        $color2 = "%$color%";
        $stmt = $db->prepare('SELECT * FROM Pet WHERE
                              petName LIKE :petN
                              AND specie LIKE :specie
                              AND gender LIKE :gender
                              AND size LIKE :size
                              AND color LIKE :color');
        $stmt->bindParam(':petN', $name2, PDO::PARAM_STR);
        $stmt->bindParam(':specie', $specie2, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $gender2, PDO::PARAM_STR);
        $stmt->bindParam(':size', $size2, PDO::PARAM_STR);
        $stmt->bindParam(':color', $color2, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

      function addPet($user, $name, $race, $gender, $size, $color, $bio) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('INSERT INTO Pet(petName, specie, gender, size, color, bio) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($name, $race, $gender, $size, $color, $bio));

        $idPet = $db->lastInsertId();
        
        $stmt2 = $db->prepare('INSERT INTO UserFoundPet VALUES (?, ?)');
        $stmt2->execute(array($user['idUser'], $idPet));

        if (!file_exists("../images/pet-profile/pet-$idPet")) {
            mkdir("../images/pet-profile/pet-$idPet", 0777, true);
        }

        $originalFileName = "../images/pet-profile/pet-$idPet/profile.jpg";

        // Move the uploaded file to its final destination
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

        return TRUE;
      }

      function getFavoritePets($user) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM Pet, FavoritePet WHERE idUser = ? and Pet.idPet = FavoritePet.idPet');
        
        $stmt->execute(array($user['idUser']));
        $petsID = $stmt->fetchAll();


        return $petsID;
    }

    function getAllProposals() {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM PetPhoto WHERE idPet = ?');
        
        $stmt->execute(array($id));
        $petsID = $stmt->fetchAll();


        return $petsID;

    }

    function getAllPhotos($id) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM PetPhoto WHERE idPet = ?');
        
        $stmt->execute(array($id));
        $petsID = $stmt->fetchAll();


        return $petsID;
    }

    function addPetPhoto($idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('INSERT INTO PetPhoto(idPet) VALUES (?)');
        $stmt->execute(array($idPet));

        $idPhoto = $db->lastInsertId();

        if (!file_exists("../images/pet-profile/pet-$idPet")) {
            mkdir("../images/pet-profile/pet-$idPet", 0777, true);
        }

        $originalFileName = "../images/pet-profile/pet-$idPet/photo-$idPhoto.jpg";

        // Move the uploaded file to its final destination
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

        return TRUE;
      }

    function isFavorited($user, $idPet) {
        $db = Database::instance()->db();
        
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
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM PostsPet WHERE idPet = ?');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetchAll();

        return $petsID;
    }

    function isOwner($user, $idPet) {
        $db = Database::instance()->db();
        
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

    function addPost($idPet, $username, $post) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('INSERT INTO PostsPet(idPet, author, datePost, post) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($idPet, $username, date("Y/m/d"), $post));
    }

    function deletePost($idPost) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('DELETE FROM PostsPet WHERE id = ?');
        $stmt->execute(array($idPost));
    }

    function updatePost($idPost, $info) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('UPDATE PostsPet SET POST = ? WHERE id = ?');
        $stmt->execute(array($info, $idPost));  
    }

    function getAllOwner($user) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM Pet, UserFoundPet WHERE idUser = ? and Pet.idPet = UserFoundPet.idPet');
        
        $stmt->execute(array($user['idUser']));
        $petsID = $stmt->fetchAll();
        
        return $petsID;
    }

    function getPetOwner($idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM User, UserFoundPet WHERE UserFoundPet.idPet = ? and User.idUser = UserFoundPet.idUser');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetch();

        return $petsID;
    }

    function getPetAdopted($idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM User, UserAdoptedPet WHERE UserAdoptedPet.idPet = ? and User.idUser = UserAdoptedPet.idUser');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetch();

        return $petsID;
    }

    function updateFavoriteList($user, $idPet) {
        $db = Database::instance()->db();
        
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
      
    function updatePet($idPet, $npetName, $bio, $nspecie, $ngender, $nsize, $ncolor) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('UPDATE Pet SET petName = ?, bio = ?, specie = ?, gender = ?, size = ?, color = ? WHERE idPet = ?');

        $hashed_new_password = sha1($new_password);
        $stmt->execute(array( $npetName, $bio, $nspecie, $ngender, $nsize, $ncolor, $idPet));  
    }
?>