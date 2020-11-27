<?php
    function getAllDogs() {
        global $db;

        $stmt = $db->prepare('SELECT petName FROM Pet ');
        $stmt->execute();

        return $stmt->fetchAll();
    }
?>