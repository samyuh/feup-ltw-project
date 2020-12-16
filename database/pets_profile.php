<?php
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

    function updatePet($idPet, $npetName, $bio, $nspecie, $ngender, $nsize, $ncolor) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('UPDATE Pet SET petName = ?, bio = ?, specie = ?, gender = ?, size = ?, color = ? WHERE idPet = ?');

        $hashed_new_password = sha1($new_password);
        $stmt->execute(array( $npetName, $bio, $nspecie, $ngender, $nsize, $ncolor, $idPet));  


        $originalFileName = "../images/pet-profile/pet-$idPet/profile.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
    }

    /*
    * Pet Photos
    */
    function getAllPhotos($id) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM PetPhoto WHERE idPet = ?');
        
        $stmt->execute(array($id));
        $petsID = $stmt->fetchAll();

        return $petsID;
    }

    function addPetPhoto($idPet) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('INSERT INTO PetPhoto(idPet) VALUES (?)');
        $stmt->execute(array($idPet));

        $idPhoto = $db->lastInsertId();

        if (!file_exists("../images/pet-profile/pet-$idPet")) {
            mkdir("../images/pet-profile/pet-$idPet", 0777, true);
        }

        $originalFileName = "../images/pet-profile/pet-$idPet/photo-$idPhoto.jpg";

        // Move the uploaded file to its final destination
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

        return TRUE;
    }

    function deletePhoto($idPhoto) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('DELETE FROM PetPhoto WHERE idPhoto = ?');
        $stmt->execute(array($idPhoto));

        return TRUE;
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
            print('add');
        }
        else {
            $stmt = $db->prepare('DELETE FROM FavoritePet WHERE idUser = ? and idPet = ?');
            $stmt->execute(array($user['idUser'], $idPet));
            print('del');
        }
    }

    /*
    *   Pet Posts
    */
    function getPosts($idPet) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM PostsPet WHERE idPet = ?  ORDER BY id DESC');
        
        $stmt->execute(array($idPet));
        $petsID = $stmt->fetchAll();

        return $petsID;
    }
    
    function addPost($idPet, $username, $post) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('INSERT INTO PostsPet(idPet, author, datePost, post) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($idPet, $username, date("Y/m/d"), $post));
    }

    function updatePost($idPost, $info) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('UPDATE PostsPet SET POST = ? WHERE id = ?');
        $stmt->execute(array($info, $idPost));  
    }

    function deletePost($idPost) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('DELETE FROM PostsPet WHERE id = ?');
        $stmt->execute(array($idPost));
    }

    /* 
    * Pet Questions and Answer 
    */
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

        $stmt = $db->prepare('SELECT * FROM User, UserFoundPet, PetQuestion WHERE 
                                                                            PetQuestion.idQuestion = ? 
                                                                            and PetQuestion.idPet = UserFoundPet.idPet
                                                                            and User.idUser = UserFoundPet.idUser');
        $stmt->execute(array($idQuestion));
        $question = $stmt->fetch();

        if((!empty($question)) && ($question['idUser'] == $idUser)) {
            $stmt = $db->prepare('DELETE FROM PetQuestion WHERE idQuestion = ?');
            $stmt->execute(array($idQuestion));
        }
    }

    function addAnswer($idQuestion, $author, $answer) {
        $db = Database::instance()->db();
        
        $stmt = $db->prepare('SELECT * FROM User, UserFoundPet, PetQuestion WHERE 
                                                                            PetQuestion.idQuestion = ? 
                                                                            and PetQuestion.idPet = UserFoundPet.idPet
                                                                            and User.idUser = UserFoundPet.idUser');
        $stmt->execute(array($idQuestion));
        $question = $stmt->fetch();

        if((!empty($question)) && ($question['username'] == $author)) {
            $update = $db->prepare('UPDATE PetQuestion SET dateAnswer = ?, authorAnswer = ?, answer = ? WHERE idQuestion = ?');
            $update->execute(array(date("Y/m/d"), $author, $answer, $idQuestion));  
        }
    }
?>