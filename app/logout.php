<?php

/*Lógica para terminar la sesión del usuario*/

session_start();
setcookie(session_name(), '', time()-3600, '/');
session_unset();
session_destroy();
header("location: index.php");

?>