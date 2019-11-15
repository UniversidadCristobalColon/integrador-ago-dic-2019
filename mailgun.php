<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function enviarCorreo($para, $asunto, $mensaje){
	$filtro = filter_var($para, FILTER_VALIDATE_EMAIL);
	if($filtro){
require '../vendor/PHPMailer/Exception.php';
require '../vendor/PHPMailer/PHPMailer.php';
require '../vendor/PHPMailer/SMTP.php';
require '../config/db.php';


$sql = "SELECT host, port, username, password, email_name FROM email_conf";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$host = $row['host'];
    	$port = $row['port'];
    	$username = $row['username'];
    	$password = $row['password'];
    	$mailName = $row['email_name'];
    }
}

$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $host;                     // Specify main and backup SMTP servers
$mail->Port = $port;
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $username;   // SMTP username
$mail->Password = $password ;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted
$mail->From = $username;
$mail->FromName =$mailName;
$mail->addAddress($para);                 // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->Subject = $asunto;
$mail->Body = $mensaje;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
}