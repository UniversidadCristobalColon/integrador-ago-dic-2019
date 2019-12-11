<?php

require '../config/dir.php';

if(empty($_SESSION)) {
    session_start();
}
$email = empty($_POST['email']) ? $_SESSION['usuario']: $_POST['email'];
$token = md5(uniqid($email.time(), true));

require '../config/global.php';
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
        $link = 'http://'.$_SERVER['HTTP_HOST'].'/'.PROYECTO.'/app/cambiar.php?email='
                        .$email.'&token='.$token;
        $msg =
"<p>¡Hola!</p>
<p>Se ha solicitado un cambio de contraseña de acceso a su cuenta. Da clic en la siguiente liga de Internet para realizar el cambio:</p>
<p>{$link}</p>
<p>Si no lo has solicitado tú, te recomendamos ingresar a la aplicación y cambiar tu contraseña para proteger tu cuenta.</p>
<p>Saludos.</p>";
        if(isset($_POST['email'])) {
            $redirect = '/'.PROYECTO.'/app/recuperar.php?email='.$email;
        } else {
            $redirect = '/'.PROYECTO.'/app/main.php?alert';
        }
        enviarCorreo(
            $email, 
            utf8_decode('Restablecer contraseña'),
            $msg,
            $redirect
        );
    } else {
        if(isset($_POST['email'])) {        
            header('location: /'.PROYECTO.'/app?error=1');
        }        
        exit();
    }
}
?>
