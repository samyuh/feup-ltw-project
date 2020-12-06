<?php
    function addQuestion($idPet, $question) {
        global $db;
        
        $stmt = $db->prepare('INSERT INTO PetQuestion(idPet, info) VALUES (?, ?)');
        $stmt->execute(array($idPet, $question));
    }

    function getQuestions($idPet) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM PetQuestion WHERE idPet = ?');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetchAll();

        return $petsID;
    }

    function isAdopted($id) {
        global $db;
        
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

      function getAdoptPets($user) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM Pet, UserAdoptedPet WHERE idUser = ? and Pet.idPet = UserAdoptedPet.idPet');
        
        $stmt->execute(array($user['idUser']));
        $petsID = $stmt->fetchAll();


        return $petsID;
    }

    function updateAdopt($user, $idPet) {
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

      function updateAdoptList($user, $idPet) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM UserAdoptedPet WHERE idUser = ? and idPet = ?');
        
        $stmt->execute(array($user['idUser'], $idPet));
        $petsID = $stmt->fetchAll();
        if(empty($petsID)) {
            $stmt = $db->prepare('INSERT INTO UserAdoptedPet VALUES (?, ?)');
            $stmt->execute(array($user['idUser'], $idPet));
            print('add');
        }
        else {
            
        }
      }
?>