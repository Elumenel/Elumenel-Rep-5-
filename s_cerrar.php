<?php
session_name('usuarios');
session_start();

session_destroy();
header('location: index.php');
?>
