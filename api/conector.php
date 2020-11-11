<?php
$con = new mysqli('localhost', 'root', '', 'pruebasgreys');
if(!$con){
		echo 'No se puede conectar a la base de datos';
	}
