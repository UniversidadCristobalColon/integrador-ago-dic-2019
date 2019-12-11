<?php
require_once '../../../../config/db.php';

$ins = "insert into cuestionarios (cuestionario) values ('')";

$res = mysqli_query($conexion, $ins);
if($res){
    $id = mysqli_insert_id($conexion);
    header("location: editar.php?id={$id}");
    exit;
}else{
    echo 'Error al crear el cuestionario';
}
?>
