<?php
/*Lógica para terminar la sesión del usuario*/

session_start();
session_destroy();
header("location: index.php");

?>