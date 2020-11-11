<?php
session_start();
session_unset();
session_destroy();
header("location:index.php");
// esta parate es para destruir la sesion del usuario

?>
