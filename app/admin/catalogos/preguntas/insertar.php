<?php
require '../../../../config/db.php';
if(count($_POST)==5){
    $pregunta = $conexion->real_escape_string($_POST["pregunta"]);
    $tipo = $conexion->real_escape_string($_POST["tipo"]);
    $decalogo = $conexion->real_escape_string($_POST["decalogo"]);
    $aseveracion = $conexion->real_escape_string($_POST["aseveracion"]);
    $ip = $conexion->real_escape_string($_POST["ip"]);
    $msg = "";
    $bandera = true;
    if(!is_numeric($aseveracion)){
        $bandera = false;
        $msg = "Seleccione una aseveración";
    }
    if(!($pregunta)){
        $bandera = false;
        $msg = "Escriba una pregunta";
    }

    if($bandera){
        $creacion = date("Y-m-d H:i:s");
        $sql = "insert into preguntas(pregunta,tipo,creacion,id_decalogo,id_decalogo_aseveracion,creacion_ip) values (?,?,?,?,?,?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssiis",$pregunta,$tipo,$creacion,$decalogo,$aseveracion,$ip);
        $stmt->execute();
        $msg = 's';
    }
    echo $msg;
}
?>