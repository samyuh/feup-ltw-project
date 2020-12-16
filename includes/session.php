<?php
  session_start();

  function generate_random_token() {
    //openssl_random_pseudo_bytes(32)
    return bin2hex(random_bytes(32));
  }

  if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = generate_random_token();
  }
?>