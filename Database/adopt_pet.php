<?php
    function addQuestion($idPet, $question) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('INSERT INTO PetQuestion(idPet, info) VALUES (?, ?)');
        $stmt->execute(array($idPet, $question));
    }

    function getQuestions($idPet) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM PetQuestion WHERE idPet = ?');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetchAll();

        return $petsID;
    }

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

      function getAdoptPets($user) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM Pet, UserAdoptedPet WHERE idUser = ? and Pet.idPet = UserAdoptedPet.idPet');
        
        $stmt->execute(array($user['idUser']));
        $petsID = $stmt->fetchAll();


        return $petsID;
    }

    function updateAdopt($user, $idPet) {
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

      function isProposed($idUser, $idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM AdoptionProposal WHERE idUser = ? and idPet = ?');
        $stmt->execute(array($idUser, $idPet));
        $pet = $stmt->fetch();

        if(empty($pet)) {
            return FALSE;
        }
        else {
            return TRUE;
        }
      }

      function updateAdoptionProposal($user, $idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM AdoptionProposal WHERE idUser = ? and idPet = ?'); 
        $stmt->execute(array($user['idUser'], $idPet));
        $petsID = $stmt->fetchAll();
        if(empty($petsID)) {
            $stmt = $db->prepare('INSERT INTO AdoptionProposal VALUES (?, ?)');
            $stmt->execute(array($user['idUser'], $idPet));
            print('add');
        }
        else {
            
        }
      }

      function getAdoptionProposalList($idPet) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM AdoptionProposal WHERE idPet = ?');
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetchAll();

        return $petsID;

      }

      function updateAdoptList($user, $idPet) {
        $db = Database::instance()->db();
        
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