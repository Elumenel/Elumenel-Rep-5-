<?php
session_name('usuarios');
session_start();

//Para generar el código captcha...
$_SESSION['codigo_captcha'] = '';
$caracteres_posibles = array_merge(range('a', 'z'), range(1,9));
$caracteres_actuales = 0;
$start = 0;

while ($caracteres_actuales < 6) {
  $caracter = rand($start,34);
  $_SESSION['codigo_captcha'] .= $caracteres_posibles[$caracter];
  $caracteres_actuales++;
  $start++;
}

//Para lookearlo...
$captcha_h = 35;
$captcha_w = 120;
$font_family = dirname(__FILE__).'/fonts/Raleway-SemiBold.ttf';
$font_size = 18;
$ruido_puntos = 50;
$ruido_lineas = 25;

$imagen_captcha = imagecreate($captcha_w, $captcha_h);
$background_color = imagecolorallocate($imagen_captcha, 255, 250, 205); //LemonChiffon
$color_font = imagecolorallocate($imagen_captcha, 0, 206, 209); //DarkTurquoise
$color_ruido = imagecolorallocate($imagen_captcha, 175, 238, 238); //PaleTurquoise

for ($i=0; $i < $ruido_puntos; $i++) {
  //imagefilledellipse($imagen, $centroX, $centroY, $ancho, $altura, $color);
  imagefilledellipse($imagen_captcha, rand(0, $captcha_w), rand(0, $captcha_h), 2, 3, $color_ruido);
}

for ($i=0; $i < $ruido_lineas; $i++) {
  //imageline($imagen, $xInicio, $yInicio, $xFin, $yFin, $color);
  imageline($imagen_captcha, rand(0, $captcha_w), rand(0, $captcha_h), rand(0, $captcha_w), rand(0, $captcha_h), $color_ruido);
}

$caja_texto = imagettfbbox($font_size, 0,	$font_family,	$_SESSION['codigo_captcha']);
$x = ($captcha_w - $caja_texto[4])/2;
$y = ($captcha_h - $caja_texto[5])/2;

imagettftext($imagen_captcha,	$font_size,	0,	$x,	$y,	$color_font,	$font_family,	$_SESSION['codigo_captcha']);

header('Content-Type: image/png');
imagepng($imagen_captcha);

imagedestroy($captchaImage);
?>
