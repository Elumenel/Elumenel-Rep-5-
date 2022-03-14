<?php
session_name('usuarios');
session_start();

if (!isset($_SESSION['admin'])) {
  header('location: index.php?please_login');
}
?>
