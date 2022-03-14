<?php
include "db_conectar.php";

$resultado = mysqli_query($conexion, "SELECT * FROM `productos` ORDER BY `titulo` ASC");
$fila = mysqli_num_rows($resultado);
?>
