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
        $pet = $stmt->fetch();
        return $pet;
      }

    function getDogsByName($name) {
        global $db;
        $name2 = "%$name%";
        $stmt = $db->prepare('SELECT * FROM Pet WHERE petName LIKE :petN');
        $stmt->bindParam(':petN', $name2, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }
      
?>