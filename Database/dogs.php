<?php
    function getAllPets() {
        global $db;

        $stmt = $db->prepare('SELECT * FROM Pet ');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getAllDogs() {
        return getDogsBySpecie('dog');
    }

    function getAllCats() {
        return getDogsBySpecie('cat');
    }

    function getPet($id){
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM Pet WHERE idPet = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        $stmt->execute();
        $pet = $stmt->fetch();
        return $pet;
      }

    function getPetsByName($name) {
        global $db;
        $name2 = "%$name%";
        $stmt = $db->prepare('SELECT * FROM Pet WHERE petName LIKE :petN');
        $stmt->bindParam(':petN', $name2, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    function getPetsBySpecie($specie) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM Pet WHERE specie = :specie');
        $stmt->bindParam(':petN', $specie, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    function getPetsByGender($gender) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM Pet WHERE gender = :gender');
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function gePetsBySize($size) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM Pet WHERE size = :size');
        $stmt->bindParam(':size', $size, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    function getPetsByColor($color) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM Pet WHERE color = :petN');
        $stmt->bindParam(':petN', $color, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getPetsByParameter($parameter,$val) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM Pet WHERE :parameter = :val');
        $stmt->bindParam(':parameter', $parameter, PDO::PARAM_STR);
        $stmt->bindParam(':val', $val, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getPetsByAll($name,$specie,$gender,$size,$color){
        global $db;

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


      
?>