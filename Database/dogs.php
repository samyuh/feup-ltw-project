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


    function getDogsBySpecie($specie) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM Pet WHERE specie = :specie');
        $stmt->bindParam(':petN', $specie, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    function getDogsByGender($gender) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM Pet WHERE gender = :gender');
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getDogsBySize($size) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM Pet WHERE size = :size');
        $stmt->bindParam(':size', $size, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    function getDogsByColor($color) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM Pet WHERE color = :petN');
        $stmt->bindParam(':petN', $color, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getDogsByParameter($parameter,$val) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM Pet WHERE :parameter = :val');
        $stmt->bindParam(':parameter', $parameter, PDO::PARAM_STR);
        $stmt->bindParam(':val', $val, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getDogsByAll($name,$specie,$gender,$size,$color){
        global $db;

        $name2 = "%$name%";
        $stmt = $db->prepare('SELECT * FROM Pet WHERE
                              petName LIKE :petN
                              AND specie = :specie
                              AND gender = :gender
                              AND size = :size
                              AND color = :color');
        $stmt->bindParam(':petN', $name2, PDO::PARAM_STR);
        $stmt->bindParam(':specie', $specie, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':size', $size, PDO::PARAM_STR);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();


    }


      
?>