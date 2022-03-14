<?php

include 'db_conectar.php';

//PARTE I: GUARDAR EL ARCHIVO DE IMAGEN EN UN DIRECTORIO LOCAL/DEL SERVIDOR
$img_file = $_FILES['img_file'];

$img_temp = $_FILES['img_file']['tmp_name'];
$img_filename_original = $_FILES['img_file']['name'];

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
//imagecopyresampled($dst_image, $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $dst_width, int $dst_height, int $src_width, int $src_height)
imagecopyresampled($img_copy, $img_original, 0, 0, 0, 0, $img_new_w, $img_new_h, $img_original_w, $img_original_h);

//imagejpeg($image, $file, $quality)
imagejpeg($img_copy, "img/".$img_filename, 100);

imagedestroy($img_original);
imagedestroy($img_copy);

function changeName($filename) {
  $filename_name = pathinfo($filename, PATHINFO_FILENAME);
  $filename_extension = pathinfo($filename, PATHINFO_EXTENSION);
  $suffix = 1;

  while (file_exists("img/".$filename_name.$suffix.".".$filename_extension)) {
    $suffix++;
  }
  return $filename_name.$suffix.".".$filename_extension;
}

//PARTE 2: INSERTAR LOS DATOS EN LA BASE DE DATOS
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

$query_insertar = "INSERT INTO `productos` (`titulo`, `fecha_toma`, `lugar`, `pais`, `imagen`, `categorias1`, `categorias2`, `formato`, `dimensiones`, `stock`, `precio`, `estado`)
VALUES ('$titulo','$fecha','$lugar','$pais', '$img_filename', '$categorias1','$categorias2','$formato','$dimensiones','$stock','$precio','$estado')";

if (mysqli_query ($conexion, $query_insertar)) {
  header('Location: pag_inventario.php');
  echo '<script> alert("Producto ingresado."); </script>';
}else {
  echo 'ERROR: No pudo insertarse el registro. '.mysqli_error($conexion);
}

mysqli_close($conexion);
?>
