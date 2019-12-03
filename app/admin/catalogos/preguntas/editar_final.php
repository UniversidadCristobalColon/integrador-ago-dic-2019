<?php
require '../../../../config/db.php';
$id = $conexion->real_escape_string($_POST["id"]);
$pregunta = $conexion->real_escape_string($_POST["pregunta"]);
$actualizacion = date("Y-m-d H:i:s");
$ip = $conexion->real_escape_string($_POST["ip"]);
$sql = "update preguntas set pregunta=?,actualizacion=?, actualizacion_ip=? where id=?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssi",$pregunta,$actualizacion,$ip,$id);
$stmt->execute();
$stmt->close();
echo "s";
?>