<?php

$email = @$_POST['email'];
$token = bin2hex(random_bytes(32));

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
    	'http://localhost/integrador-ago-dic-2019/app/recuperar2.php?email='
    	.$email.'&token='.$token,
        '/integrador-ago-dic-2019/app/recuperar1.php?email='.$email
    );
} else {
    header("location: /integrador-ago-dic-2019/app?error=Error.");
}
*/

if($stmt = $conexion->prepare('INSERT INTO password_resets 
                                VALUES((SELECT id 
                                        FROM usuarios 
                                        WHERE usuario = ?), 
                                        ?, 
                                        NOW() + INTERVAL 1 HOUR,
                                        1)')) {
    $stmt->bind_param('ss', $email, $token);
    $result = $stmt->execute();
    $stmt->close();
    $conexion->close();
    if($result) {
        require './mailgun.php';
        enviarCorreo(
            $email, 
            utf8_decode('Restablecer Contraseña'), 
            'http://localhost/integrador-ago-dic-2019/app/recuperar2.php?email='
            .$email.'&token='.$token,
            '/integrador-ago-dic-2019/app/recuperar1.php?email='.$email
        );
    } else {
        header('location: /integrador-ago-dic-2019/app?error=Error.');
    }
}
?>