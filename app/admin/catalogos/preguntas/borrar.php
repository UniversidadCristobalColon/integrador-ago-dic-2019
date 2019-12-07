<?php
require '../../../../config/db.php';
$sqlR = "select id_cuestionario from preguntas where id=?";
$stmt = $conexion->prepare($sqlR);
$stmt->bind_param("i", $_POST['id']);
$stmt->execute();
$stmt->bind_result($contar);
$stmt->fetch();
$stmt->close();
if(!isset($contar)){
    $sql2 = "delete from preguntas where id=? and id_cuestionario IS NULL";
    $stmt2 = $conexion->prepare($sql2);
    $stmt2->bind_param("i", $_POST['id']);
    $stmt2->execute();
    $stmt2->close();
    echo "s";
}else{
    echo "No se puede eliminar en este momento";
}
?>