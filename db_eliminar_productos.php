<?php
include "db_conectar.php";

$id = $_GET['id'];
$file = $_GET['file'];

//BORRAR EL ARCHIVO DE IMAGEN DE LA CARPETA LOCAL/DEL SERVIDOR
if (file_exists($file)) {
	unlink($file);
}

//BORRAR DE LA BASE DE DATOS
$query_delete = "DELETE FROM `productos` WHERE `id_producto`='$id'";

if (mysqli_query($conexion, $query_delete)) {
	header('Location: pag_inventario.php');
	echo '<script> alert("Registro eliminado."); </script>';
}else {
	echo "ERROR: No pudo ejecutarse $query_delete. ".mysqli_error($conexion);
}

mysqli_close($conexion);
?>
