<?php

$email = @$_POST['email'];
$token = bin2hex(random_bytes(32));

require '../config/db.php';

$sql =  "INSERT INTO password_resets 
            VALUES((SELECT id 
                    FROM usuarios 
                    WHERE usuario = '{$email}'), 
                    '{$token}', 
                    NOW() + INTERVAL 1 HOUR);";

$res = $conexion->query($sql);
if($res) {
    require './mailgun.php';
} else {
    header("location: /integrador-ago-dic-2019/app");
}

?>