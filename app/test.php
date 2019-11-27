<?php

#$array[0] = 0;
#echo $array[1];

#require '../config/config.php';

#$contrasena = 'contraseña';
#echo password_hash($contrasena, PASSWORD_BCRYPT, $options);

require './mailgun.php';
$email = 'correo@outlook.com';
$token = 'token';
enviarCorreo(
    $email, 
    utf8_decode('Cambiar correo'), 
    'http://'.$_SERVER['HTTP_HOST'].'/proyecto/app/cambiar.php?email='
    .$email.'&token='.$token,
    '/proyecto/app/recuperar.php?email='.$email
);

?>