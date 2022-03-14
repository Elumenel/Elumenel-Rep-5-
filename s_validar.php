<?php
session_name('usuarios');
session_start();

$user = $_POST['user'];
$pw = $_POST['pw'];
$captcha_input = $_POST['captcha'];

if ($captcha_input == $_SESSION['codigo_captcha']) {
  if (($user=="admin" && $pw=="admin123") || ($user=="20123456" && $pw=="admin123")) {
    $_SESSION['admin'] = $user;
    header('location: home.php');
  }else {
    header('location: index.php?error_credenciales');
  }
}else {
  header('location: index.php?error_captcha');
}
?>
