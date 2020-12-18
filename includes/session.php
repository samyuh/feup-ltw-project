<?php
  session_set_cookie_params(60*60*24, '/');
  session_start();
  //session_regenerate_id(true);

  function generate_random_token() {
    //openssl_random_pseudo_bytes(32)
    return bin2hex(random_bytes(32));
  }

  if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = generate_random_token();
  }
  
  if(!isset($_SESSION['theme'])) {
    $_SESSION['theme'] = 'light';
  }
?>