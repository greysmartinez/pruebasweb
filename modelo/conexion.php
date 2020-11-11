<?php
$servidorbd = "localhost";
$usuarioBaseDatos = "root";
$claveBaseDatos = ""; 
$baseDatos = "pruebasgreys";

$con = @mysqli_connect($servidorbd,$usuarioBaseDatos,$claveBaseDatos,$baseDatos);

if (!$con)
die('No se Puede Conectar: ' . mysqli_error($con));

date_default_timezone_set("America/Bogota" ) ; 
$hora = date('H:i:s',time() - 3600*date('I'));
?>