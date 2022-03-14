<?php
include "db_conectar.php";

$id = $_GET['id'];

$resultado = mysqli_query($conexion, "SELECT * FROM `productos` WHERE id_producto=$id");
$fila = mysqli_num_rows($resultado);
?>
