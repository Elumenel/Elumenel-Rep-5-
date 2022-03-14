<?php
include 'db_conectar.php';

$id_producto = $_GET['id'];

$query_consulta = "SELECT `estado` FROM `productos` WHERE `id_producto`='$id_producto'";
$consulta = mysqli_query($conexion, $query_consulta);
$fila = mysqli_fetch_assoc($consulta);

if ($fila['estado'] == 1) {
  $query_modificar = "UPDATE `productos` SET `estado`='0' WHERE `id_producto`='$id_producto'";

  if (mysqli_query($conexion, $query_modificar)) {
    header("Location: pag_inventario.php#row-$id_producto");
  }else {
    echo 'ERROR: No pudo modificarse el registro. '.mysqli_error($conexion);
  }
}elseif ($fila['estado'] == 0) {
  $query_modificar = "UPDATE `productos` SET `estado`='1' WHERE `id_producto`='$id_producto'";

  if (mysqli_query($conexion, $query_modificar)) {
    header("Location: pag_inventario.php#row-$id_producto");
  }else{
    echo 'ERROR: No pudo modificarse el registro. '.mysqli_error($conexion);
  }
}

mysqli_close($conexion);
?>
