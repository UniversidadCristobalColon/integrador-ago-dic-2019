<?php
/*Lógica para terminar la sesión del usuario*/

session_start();
session_destroy();
header("location: /integrador-ago-dic-2019/app/index.php");

?>