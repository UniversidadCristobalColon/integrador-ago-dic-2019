<?php

/*Lógica para terminar la sesión del usuario*/

session_start();
require 'login.php';
$email = $_SESSION['usuario'];
logout($email);

header("location: index.php");

?>