<?php
  require_once __DIR__ . '/vendor/autoload.php';

  use Dotenv\Dotenv;

  $dotenv = Dotenv::createImmutable(__DIR__);
  $dotenv->load();
    
  foreach ($_ENV as $key => $value) {
    $_SERVER[$key] = $value;
    putenv("$key=$value");
  }
?>
