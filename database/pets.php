<?php
    /* 
     * Functions related to the pet information
    */

    function getAllPets() {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM Pet ');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /*
    * Get Pet Information
    */
    function getPet($id) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM Pet WHERE idPet = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        $stmt->execute();
        $user = $stmt->fetch();

        return $user;
    }

    function getPetOwner($idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM User, UserFoundPet WHERE UserFoundPet.idPet = ? and User.idUser = UserFoundPet.idUser');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetch();

        return $petsID;
    }

    /* 
    * See if a pet is already adopted 
    */
    function isAdopted($id) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM UserAdoptedPet WHERE idPet = ?');
        $stmt->execute(array($id));
        $stmt->execute();
        $pet = $stmt->fetch();

        if(empty($pet)) {
            return FALSE;
        }
        else {
            return TRUE;
        }
      }
    
    /* 
    * See if user is owner of a specific pet 
    */
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
    
    /* 
    * Pet Search
    */
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

    /* 
    * User Pet Lists 
    */
    function getFavoritePets($user) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM Pet, FavoritePet WHERE idUser = ? and Pet.idPet = FavoritePet.idPet');
        
        $stmt->execute(array($user['idUser']));
        $petsID = $stmt->fetchAll();


        return $petsID;
    }
    
    function getAdoptPets($user) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM Pet, UserAdoptedPet WHERE idUser = ? and Pet.idPet = UserAdoptedPet.idPet');
        
        $stmt->execute(array($user['idUser']));
        $petsID = $stmt->fetchAll();


        return $petsID;
    }

    function getAllOwner($user) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM Pet, UserFoundPet WHERE idUser = ? and Pet.idPet = UserFoundPet.idPet');
        
        $stmt->execute(array($user['idUser']));
        $petsID = $stmt->fetchAll();
        
        return $petsID;
    }
?>