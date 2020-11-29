<?php
    function getAllDogs() {
        global $db;

        $stmt = $db->prepare('SELECT * FROM Pet ');
        $stmt->execute();

        return $stmt->fetchAll();
    }
?>