<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$novedad = $_POST['novedad'];
$fecha = date("j-n-Y G:i");

$texto_guardar = "\n<b>Fecha:</b> ".$fecha."\n<b>Cliente:</b> ".$nombre."\n<b>Email:</b> ".$email."\n<b>Novedad:</b> ".$novedad."\n..........";

$archivo = fopen('novedades.txt', 'a');

fputs($archivo, $texto_guardar);
fclose($archivo);

header("Location: home.php?status=ok");
?>
