<?php
$conexion = mysqli_connect('localhost', 'root', '', 'phpintermedio');

if (mysqli_connect_errno()) {
  echo("ERROR: No pudo conectarse. ".mysqli_connect_error());
}
?>
