<?php // SQL_login.php
  $host = 'localhost';
  $data = 'foodzilla';
  $user = 'admin2';         // Change as necessary
  $pass =  'mypasswd';       // Change as necessary
  $chrs = 'utf8mb4';
  $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
  $tbl_name = 'userdb';
  $opts =
  [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];//sql connection
?> 
