<?php
include 'db_conectar.php';

if (empty($_FILES['img_file']['name'])) {
  $id_producto = $_POST['id_producto'];
  $titulo = $_POST['titulo'];
  $fecha = $_POST['fecha']."-01";
  $lugar = $_POST['lugar'];
  $pais = $_POST['pais'];
  $formato = $_POST['formato'];
  $dimensiones = $_POST['dimensiones'];
  $stock = $_POST['stock'];
  $precio = $_POST['precio'];
  $estado = $_POST['estado'];
  $categorias1 = implode("|", $_POST['categorias1']);

  if (isset($_POST['categorias2'])) {
    $categorias2 = implode("|", $_POST['categorias2']);
  }else {
    $categorias2 = " ";
  }

  $query_modificar = "UPDATE `productos` SET `titulo`='$titulo', `fecha_toma`='$fecha', `lugar`='$lugar', `pais`='$pais', `formato`='$formato', `dimensiones`='$dimensiones',
  `stock`='$stock', `precio`='$precio', `estado`='$estado', `categorias1`='$categorias1', `categorias2`='$categorias2'
  WHERE `id_producto`='$id_producto'";

  if (mysqli_query($conexion, $query_modificar)) {
    header("Location: pag_vproducto.php?id=$id_producto");
    echo '<script> alert("Registro modificado."); </script>';
  }else {
    echo 'ERROR: No pudo insertarse el registro. '.mysqli_error($conexion);
  }
  mysqli_close($conexion);

}else {
  //PARTE I: BORRAR IMAGEN VIEJA
  $id_producto = $_POST['id_producto'];

  $query_consulta = "SELECT `imagen` FROM `productos` WHERE `id_producto`='$id_producto'";
  $consulta = mysqli_query($conexion, $query_consulta);
  $fila = mysqli_fetch_assoc($consulta);

  unlink('img/'.$fila['imagen']);

  //PARTE II: GUARDAR IMAGEN NUEVA
  $img_file = $_FILES['img_file'];

  $img_temp = $_FILES['img_file']['tmp_name'];
  $img_filename_original = $_FILES['img_file']['name'];

  function changeName($filename) {
    $filename_name = pathinfo($filename, PATHINFO_FILENAME);
    $filename_extension = pathinfo($filename, PATHINFO_EXTENSION);
    $suffix = 1;

    while (file_exists("img/".$filename_name.$suffix.".".$filename_extension)) {
      $suffix++;
    }
    return $filename_name.$suffix.".".$filename_extension;
  }

  if (file_exists("img/".$img_filename_original)) {
    $img_filename = changeName($img_filename_original);
  }else {
    $img_filename = $img_filename_original;
  }

  if ($_FILES['img_file']['type'] == 'image/jpeg') {
    $img_original = imagecreatefromjpeg($img_temp);
  }else if ($_FILES['img_file']['type'] == 'image/png') {
    $img_original = imagecreatefrompng($img_temp);
  }else {
    die('Formato no aceptado');
  }

  $img_original_w = imagesx($img_original);
  $img_original_h = imagesy($img_original);

  if ($img_original_w > $img_original_h) {
    $img_new_h = 700;
    $img_new_w = round($img_new_h * $img_original_w / $img_original_h);
  }else {
    $img_new_w = 934;
    $img_new_h = round($img_new_w * $img_original_h / $img_original_w);
  }

  $img_copy = imagecreatetruecolor($img_new_w, $img_new_h);
  imagecopyresampled($img_copy, $img_original, 0, 0, 0, 0, $img_new_w, $img_new_h, $img_original_w, $img_original_h);

  imagejpeg($img_copy, "img/".$img_filename, 100);

  imagedestroy($img_original);
  imagedestroy($img_copy);

  //PARTE 3: INSERTAR LOS DATOS EN LA BASE DE DATOS
  $titulo = $_POST['titulo'];
  $fecha = $_POST['fecha']."-01";
  $lugar = $_POST['lugar'];
  $pais = $_POST['pais'];
  $formato = $_POST['formato'];
  $dimensiones = $_POST['dimensiones'];
  $stock = $_POST['stock'];
  $precio = $_POST['precio'];
  $estado = $_POST['estado'];
  $categorias1 = implode("|", $_POST['categorias1']);

  if (isset($_POST['categorias2'])) {
    $categorias2 = implode("|", $_POST['categorias2']);
  }else {
    $categorias2 = " ";
  }

  $query_modificar = "UPDATE `productos` SET `titulo`='$titulo', `fecha_toma`='$fecha', `lugar`='$lugar', `pais`='$pais', `imagen`='$img_filename', `formato`='$formato',
  `dimensiones`='$dimensiones', `stock`='$stock', `precio`='$precio', `estado`='$estado', `categorias1`='$categorias1', `categorias2`='$categorias2'
  WHERE `id_producto`='$id_producto'";

  if (mysqli_query($conexion, $query_modificar)) {
    header("Location: pag_vproducto.php?id=$id_producto");
    echo '<script> alert("Registro modificado."); </script>';
  }else {
    echo 'ERROR: No pudo insertarse el registro. '.mysqli_error($conexion);
  }

  mysqli_close($conexion);
}
?>
