<?php

require '../../../../config/config.php';

$password   = password_hash("contraseña", 
                            PASSWORD_BCRYPT, 
                            $options);

echo $password;
?>