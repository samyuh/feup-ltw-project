<?php
    /*
    * Check if user has updated permissions
    */
    function canAcceptAdopt($idUser, $idPet) {
        $db = Database::instance()->db();
        
        $owner = $db->prepare('SELECT * FROM UserFoundPet WHERE idUser = ? and idPet = ?');
        $owner->execute(array($idUser, $idPet));
        $isOwner = $owner->fetchAll();
        
        if(empty($isOwner)) {
            return FALSE;
        } 
        else {
            return TRUE;
        }
    }

    /*
    *   Getter functions
    */
    function getAdoptionProposalList($idPet) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM User, AdoptionProposal WHERE AdoptionProposal.idPet = ? AND AdoptionProposal.idUser = User.idUser');
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetchAll();

        return $petsID;

    }

    function getPetAdopted($idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM User, UserAdoptedPet WHERE UserAdoptedPet.idPet = ? and User.idUser = UserAdoptedPet.idUser');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetch();

        return $petsID;
    }  

    /* 
    * Pet Adoption Proposal 
    */
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

    function addProposal($idUser, $idPet) {
        $db = Database::instance()->db();
        
        if(!isProposed($idUser, $idPet)) {
            $stmt = $db->prepare('INSERT INTO AdoptionProposal VALUES (?, ?)');
            $stmt->execute(array($idUser, $idPet));
        }
    }

    /* 
    * Adopted/Reject Pet
    */
    function adopt($idUser, $idPet) {
        $db = Database::instance()->db();
        
        if(isProposed($idUser, $idPet) && canAcceptAdopt($_SESSION['user']['idUser'], $idPet)) {
            $stmt = $db->prepare('INSERT INTO UserAdoptedPet VALUES (?, ?)');
            $stmt->execute(array($idUser, $idPet));
            
            $delstmt = $db->prepare('DELETE FROM AdoptionProposal WHERE idPet = ?');
            $delstmt->execute(array($idPet));
        }
    }

    function removeProposal($idUser, $idPet) {
        $db = Database::instance()->db();

        if(isProposed($idUser, $idPet) && canAcceptAdopt($_SESSION['user']['idUser'], $idPet)) {
            $stmt = $db->prepare('DELETE FROM AdoptionProposal WHERE idUser = ? and idPet = ?'); 
            $stmt->execute(array($idUser, $idPet));
        }
    }
?>