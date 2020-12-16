<?php
    /*
    * Check if user has updated permissions
    */
    function canUpdate($idUser, $idPet) {
        $db = Database::instance()->db();
        
        $owner = $db->prepare('SELECT * FROM UserFoundPet WHERE idUser = ? and idPet = ?');
        $owner->execute(array($idUser, $idPet));
        $isOwner = $owner->fetchAll();

        $adopted = $db->prepare('SELECT * FROM UserAdoptedPet WHERE idUser = ? and idPet = ?');
        $adopted->execute(array($idUser, $idPet));
        $isAdopted = $adopted->fetchAll();
        
        if(empty($isOwner) && empty($isAdopted)) {
            return FALSE;
        } 
        else {
            return TRUE;
        }
    }

    /* 
     * Update and Add a new Pet
    */
    function addPet($user, $name, $race, $gender, $size, $color, $bio) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('INSERT INTO Pet(petName, specie, gender, size, color, bio) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($name, $race, $gender, $size, $color, $bio));

        $idPet = $db->lastInsertId();
        
        $stmt2 = $db->prepare('INSERT INTO UserFoundPet VALUES (?, ?)');
        $stmt2->execute(array($user['idUser'], $idPet));

        if (!file_exists("../images/pet-profile/pet-$idPet")) {
            mkdir("../images/pet-profile/pet-$idPet", 0777, true);
        }

        $originalFileName = "../images/pet-profile/pet-$idPet/profile.jpg";

        // Move the uploaded file to its final destination
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

        return TRUE;
    }

    function updatePet($idUser, $idPet, $npetName, $bio, $nspecie, $ngender, $nsize, $ncolor) {
        $db = Database::instance()->db();
        
        if(canUpdate($idUser, $idPet)) {
            $stmt = $db->prepare('UPDATE Pet SET petName = ?, bio = ?, specie = ?, gender = ?, size = ?, color = ? WHERE idPet = ?');

            $hashed_new_password = sha1($new_password);
            $stmt->execute(array($npetName, $bio, $nspecie, $ngender, $nsize, $ncolor, $idPet));  

            $originalFileName = "../images/pet-profile/pet-$idPet/profile.jpg";
            move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

            return TRUE;
        }

        return FALSE;
    }

    /*
    * Pet Photos
    */
    function getPetFromPhoto($idPhoto) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM Pet, PetPhoto WHERE idPhoto = ? and PetPhoto.idPet = Pet.idPet');
        $stmt->execute(array($idPhoto));
        $pet = $stmt->fetch();

        return $pet;
    }

    function getAllPhotos($id) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM PetPhoto WHERE idPet = ?');
        
        $stmt->execute(array($id));
        $petsID = $stmt->fetchAll();

        return $petsID;
    }

    function addPetPhoto($idUser, $idPet) {
        $db = Database::instance()->db();
        
        if(canUpdate($idUser, $idPet)) {
            $stmt = $db->prepare('INSERT INTO PetPhoto(idPet) VALUES (?)');
            $stmt->execute(array($idPet));

            $idPhoto = $db->lastInsertId();

            if (!file_exists("../images/pet-profile/pet-$idPet")) {
                mkdir("../images/pet-profile/pet-$idPet", 0777, true);
            }

            $originalFileName = "../images/pet-profile/pet-$idPet/photo-$idPhoto.jpg";

            // Move the uploaded file to its final destination
            move_uploaded_file($_FILES['image-album']['tmp_name'], $originalFileName);

            return TRUE;
        }
        return FALSE;
    }

    function deletePhoto($idUser, $idPhoto) {
        $db = Database::instance()->db();
        
        $pet = getPetFromPhoto($idPhoto);
        if((!empty($pet)) && (canUpdate($idUser, $pet['idPet']))) {
            $stmt = $db->prepare('DELETE FROM PetPhoto WHERE idPhoto = ?');
            $stmt->execute(array($idPhoto));

            return TRUE;
        }

        return FALSE;
    }

    /*
    *   Favorite List
    */
    function isFavorited($user, $idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM FavoritePet WHERE idUser = ? and idPet = ?');
        
        $stmt->execute(array($user['idUser'], $idPet));
        $petsID = $stmt->fetchAll();

        if(empty($petsID)) {
            return TRUE;
        } 
        else {
            return FALSE;
        }
    }

    function updateFavoriteList($user, $idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM FavoritePet WHERE idUser = ? and idPet = ?');
        
        $stmt->execute(array($user['idUser'], $idPet));
        $petsID = $stmt->fetchAll();
        if(empty($petsID)) {
            $stmt = $db->prepare('INSERT INTO FavoritePet VALUES (?, ?)');
            $stmt->execute(array($user['idUser'], $idPet));
        }
        else {
            $stmt = $db->prepare('DELETE FROM FavoritePet WHERE idUser = ? and idPet = ?');
            $stmt->execute(array($user['idUser'], $idPet));
        }
    }

    /*
    *   Pet Posts
    */
    function getPetFromPost($idPost) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM Pet, PostsPet WHERE Pet.idPet = PostsPet.idPet and id = ?');
        
        $stmt->execute(array($idPost));
        $pet = $stmt->fetch();

        return $pet;
    }

    function getPosts($idPet) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM PostsPet WHERE idPet = ?  ORDER BY id DESC');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetchAll();

        return $petsID;
    }
    
    function addPost($user, $idPet, $post) {
        $db = Database::instance()->db();
        
        if(canUpdate($user['idUser'], $idPet)) {
            $stmt = $db->prepare('INSERT INTO PostsPet(idPet, author, datePost, post) VALUES (?, ?, ?, ?)');
            $stmt->execute(array($idPet, $user['username'], date("Y/m/d"), $post));

            return TRUE;
        }

        return FALSE;
    }

    function updatePost($idUser, $idPost, $info) {
        $db = Database::instance()->db();
        
        $pet = getPetFromPost($idPost);
        if((!empty($pet)) && canUpdate($idUser, $pet['idPet'])) {
            $stmt = $db->prepare('UPDATE PostsPet SET POST = ? WHERE id = ?');
            $stmt->execute(array($info, $idPost)); 
            
            return TRUE;
        }
        return FALSE;
    }

    function deletePost($idUser, $idPost) {
        $db = Database::instance()->db();
        
        $pet = getPetFromPost($idPost);
        
        if((!empty($pet)) && canUpdate($idUser, $pet['idPet'])) {
            $stmt = $db->prepare('DELETE FROM PostsPet WHERE id = ?');
            $stmt->execute(array($idPost));

            return TRUE;
        }

        return FALSE;
    }

    /* 
    * Pet Questions and Answer 
    */
    function getPetFromQuestion($idQuestion) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM Pet, PetQuestion WHERE PetQuestion.idQuestion = ? and PetQuestion.idPet = Pet.idPet');
        $stmt->execute(array($idQuestion));
        $pet = $stmt->fetch();

        return $pet;
    }

    function getQuestions($idPet) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM PetQuestion WHERE idPet = ? ORDER BY idQuestion DESC');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetchAll();

        return $petsID;
    }

    function addQuestion($idPet, $author, $question) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('INSERT INTO PetQuestion(idPet, dateQuestion, authorQuestion, question) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($idPet, date("Y/m/d"), $author, $question));
    }

    function deleteQuestion($idUser, $idQuestion) {
        $db = Database::instance()->db();

        $pet = getPetFromQuestion($idQuestion);
        if((!empty($pet)) && (canUpdate($idUser, $pet['idPet']))) {
            $stmt = $db->prepare('DELETE FROM PetQuestion WHERE idQuestion = ?');
            $stmt->execute(array($idQuestion));

            return TRUE;
        }

        return FALSE;
    }

    function addAnswer($user, $idQuestion, $answer) {
        $db = Database::instance()->db();
        
        $pet = getPetFromQuestion($idQuestion);
        if((!empty($pet)) && (canUpdate($user['idUser'], $pet['idPet']))) {
            $update = $db->prepare('UPDATE PetQuestion SET dateAnswer = ?, authorAnswer = ?, answer = ? WHERE idQuestion = ?');
            $update->execute(array(date("Y/m/d"), $user['username'], $answer, $idQuestion));  

            return TRUE;
        }

        return FALSE;
    }
?>