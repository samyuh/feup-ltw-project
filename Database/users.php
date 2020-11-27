<?php
     function userExists($username, $password) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ?');

        $hashed_password = sha1($password);

        $stmt->execute(array($username, $hashed_password));
        $user = $stmt->fetch();

        if ($user) return TRUE;
        else return FALSE;
    }

    function insert($id, $username, $password) {
        global $db;

        $hashed_password = sha1($password);

        $stmt = $db->prepare('INSERT INTO User(username, password) VALUES (?, ?)');
        $stmt->execute(array($username, $hashed_password));
    }
?>