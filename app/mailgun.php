<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarCorreo($para, $asunto, $mensaje, $redirect){

    require '../config/db.php';

    require '../vendor/PHPMailer/Exception.php';
    require '../vendor/PHPMailer/PHPMailer.php';
    require '../vendor/PHPMailer/SMTP.php';

    $sql = 'SELECT host, port, username, password, email_name 
            FROM email_conf
            WHERE id = 2';

    $res = $conexion->query($sql);

    if($res) {
        $assoc = $res->fetch_assoc();

        $mail = new PHPMailer;
        $mail->isSMTP();                       // Set mailer to use SMTP
        $mail->Host = $assoc['host'];          // Specify main and backup SMTP servers
        $mail->Port = $assoc['port'];
        $mail->SMTPAuth = true;                // Enable SMTP authentication
        $mail->Username = $assoc['username'];  // SMTP username
        $mail->Password = $assoc['password'];  // SMTP password
        $mail->SMTPSecure = 'tls';             // Enable encryption, only 'tls' is accepted
        $mail->From = $assoc['username'];
        $mail->FromName = utf8_decode($assoc['email_name']);
        $mail->addAddress($para);              // Add a recipient

        $mail->WordWrap = 50;                  // Set word wrap to 50 characters
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            //echo 'Message has been sent';
            header('location: '.$redirect);
        }
    }
    
}

?>