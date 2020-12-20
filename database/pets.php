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
        
        $stmt = $db->prepare('SELECT * FROM Pet WHERE idPet = ?');
        $stmt->execute(array($id));

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

    function getAdoptedOwner($idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM User, UserAdoptedPet WHERE UserAdoptedPet.idPet = ? and User.idUser = UserAdoptedPet.idUser');
        
        $stmt->execute(array($idPet));
        $id = $stmt->fetch();

        return $id;
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
                              petName LIKE ?');
        $stmt->execute(array($name2));

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
                                petName LIKE ?
                                AND specie LIKE ?
                                AND gender LIKE ?
                                AND size LIKE ?
                                AND color LIKE ?');

        if($gender == "female" || $gender == "male") {
            $stmt->execute(array($name2, $specie2, $gender, $size2, $color2));
        } 
        else {
            $stmt->execute(array($name2, $specie2, $gender2, $size2, $color2));
        }

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