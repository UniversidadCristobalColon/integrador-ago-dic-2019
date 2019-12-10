<?php
require '../../../../config/db.php';
if (count($_POST) == 2) {
    $respuesta = $conexion->real_escape_string($_POST["respuesta"]);
    $ip = $conexion->real_escape_string($_POST["ip"]);
    $msg = "";
    if(empty($respuesta)){
        $msg = "Escriba una respuesta válida";
    }else {
        $creacion = date("Y-m-d H:i:s");
        $sql = "insert into respuestas(respuesta,creacion,creacion_ip) values (?,?,?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $respuesta,$creacion ,$ip);
        $stmt->execute();
        $stmt->close();
        $msg = 's';
   }
    echo $msg;
}
