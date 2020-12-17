<?php
    include_once('../includes/session.php');
    
    if($_SESSION['theme'] == 'dark') {
        $_SESSION['theme'] = 'light';
    } else {
        $_SESSION['theme'] = 'dark';
    }
?>