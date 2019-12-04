<?php

$email = @$_POST['email'];
$token = md5(uniqid($email.time(), true));

require '../config/db.php';

/*
$sql =  "INSERT INTO password_resets 
            VALUES((SELECT id 
                    FROM usuarios 
                    WHERE usuario = '{$email}'), 
                    '{$token}', 
                    NOW() + INTERVAL 1 HOUR,
                	1);";

$res = $conexion->query($sql);
if($res) {
    require './mailgun.php';
    enviarCorreo(
    	$email, 
    	utf8_decode('Restablecer Contraseña'), 
    	'http://localhost/integrador-ago-dic-2019/app/cambiar.php?email='
    	.$email.'&token='.$token,
        '/integrador-ago-dic-2019/app/recuperar.php?email='.$email
    );
} else {
    header("location: /integrador-ago-dic-2019/app?error=Error.");
}
*/

if($stmt = $conexion->prepare('INSERT INTO password_resets 
                                VALUES((SELECT id 
                                        FROM usuarios 
                                        WHERE id = (SELECT id 
                                                    FROM empleados 
                                                    WHERE email = ?)), 
                                        ?, 
                                        NOW() + INTERVAL 1 HOUR,
                                        1)')) {
    $stmt->bind_param('ss', $email, $token);
    $res = $stmt->execute();
    $stmt->close();
    $conexion->close();
    if($res) {
        require './mailgun.php';
        enviarCorreo(
            $email, 
            utf8_decode('Restablecer Contraseña'), 
            'http://'.$_SERVER['HTTP_HOST'].'/proyecto/app/cambiar.php?email='
            .$email.'&token='.$token,
            '/proyecto/app/recuperar.php?email='.$email
        );
    } else {
        header('location: /proyecto/app?error=1');
        exit();
    }
}
?>