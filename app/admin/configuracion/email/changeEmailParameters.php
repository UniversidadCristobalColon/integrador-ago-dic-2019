<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';
if(isset($_POST['host']) AND isset($_POST['port']) AND isset($_POST['name']) AND isset($_POST['user']) AND isset($_POST['pass']) AND isset($_POST['editor'])){
	$host = $_POST['host'];
	$port = $_POST['port'];
	$name = $_POST['name'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$content = $_POST['editor'];

	$sql = "UPDATE email_conf SET host = '$host', port = $port, email_name = '$name', username = '$user', 
	password = '$pass', content = '$content' WHERE id = 1";
if ($conexion->query($sql) === TRUE) {
    echo "Record updated successfully";

} else {
    echo "Error updating record: " . $conexion->error;
}

}
    header("Location: mailConfig.php");


define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
?>