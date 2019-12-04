<?php

require '../../../../config/db.php';
$sqlR = "select id_respuesta from preguntas_respuestas where id_respuesta=?";
$stmt = $conexion->prepare($sqlR);
$stmt->bind_param("i", $_POST['id']);
$stmt->execute();
$stmt->bind_result($contar);
$stmt->fetch();
$stmt->close();
if(!isset($contar)){
    $sql2= "DELETE r FROM respuestas r LEFT JOIN preguntas_respuestas pr ON pr.id_respuesta = r.id WHERE r.id=? and pr.id_respuesta IS NULL";
    $stmt2 = $conexion->prepare($sql2);
    $stmt2->bind_param("i", $_POST['id']);
    $stmt2->execute();
    $stmt2->close();
    echo "s";
}else{
    echo "No se puede eliminar";
}

?>