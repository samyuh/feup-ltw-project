<?php
    /* 
    * Pet Adoption Proposal 
    */
    function getAdoptionProposalList($idPet) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM User, AdoptionProposal WHERE AdoptionProposal.idPet = ? AND AdoptionProposal.idUser = User.idUser');
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetchAll();

        return $petsID;

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

    /* 
    * Adopted Pet
    */
    function getPetAdopted($idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM User, UserAdoptedPet WHERE UserAdoptedPet.idPet = ? and User.idUser = UserAdoptedPet.idUser');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetch();

        return $petsID;
    }  

    function updateAdoptList($idUser, $idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM UserAdoptedPet WHERE idUser = ? and idPet = ?');
        
        $stmt->execute(array($idUser, $idPet));
        $petsID = $stmt->fetchAll();
        if(empty($petsID)) {
            $stmt = $db->prepare('INSERT INTO UserAdoptedPet VALUES (?, ?)');
            $stmt->execute(array($idUser, $idPet));
            
            $delstmt = $db->prepare('DELETE FROM AdoptionProposal WHERE idPet = ?');
            $delstmt->execute(array($idPet));
        }
        else {
            
        }
    }
?>