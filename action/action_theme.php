<?php
    include_once('../includes/session.php');
    
    /* Change Sesshion theme between dark and light mode */
    if($_SESSION['theme'] == 'dark') {
        $_SESSION['theme'] = 'light';
    } else {
        $_SESSION['theme'] = 'dark';
    }
?>