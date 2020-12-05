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

?>