<?php
     function userExists($username, $password) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ?');
        
        $stmt->execute(array($username, $password));
        $user = $stmt->fetch();

        if ($user) return TRUE;
        else return FALSE;
    }
?>