<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';
echo $id = $_GET["id"];
$select = "select e.estado 
from evaluaciones e 
left join aplicaciones a 
on e.id=a.id_evaluacion 
where e.id=$id and e.id not in(select id_evaluacion from aplicaciones) group by e.estado; ";
$resultado = mysqli_query($conexion, $select);
$ip =  $_SERVER['REMOTE_ADDR'];
$row = mysqli_fetch_array($resultado);
echo $estado=$row['estado'];
if($resultado){
    if($estado == "A"){
        $sqlCambiar = "UPDATE evaluaciones SET estado = 'B', actualizacion = NOW(), actulizacion_ip = '$ip' WHERE id = '$id' ";
        header('location: index.php');
    }else if($estado == "B"){
        $sqlCambiar = "UPDATE evaluaciones SET estado = 'A', actualizacion = NOW(), actulizacion_ip = '$ip'   WHERE id = '$id' ";
        header('location: index.php');
    }else{
        header('location: index.php?error=1');
    }

    if ($conexion->query($sqlCambiar) == TRUE) {
        ob_flush();
    }else {
        echo "Error updating record: " . $conexion->error;
    }

}



define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
?>
