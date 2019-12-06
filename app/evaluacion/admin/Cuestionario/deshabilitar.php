<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';
$id = $_GET["id"];
//Cuando el id_cuestionario no estè en evaluaciòn
$select = "SELECT cuestionarios.id
            FROM cuestionarios 
            where cuestionarios.id not in (select id_cuestionario from evaluaciones)";
$resultado = mysqli_query($conexion, $select);
if ($resultado) {
    while($fila = mysqli_fetch_assoc($resultado)){
        ECHO $fila['id'];
        if($fila['id']==$id){

            $ideliminar=$fila['id'];
            $delete= "delete from cuestionarios where cuestionarios.id=$ideliminar ";
            $result = $conexion->prepare($delete);
            $result->execute();
            $result->close();
            $conexion->close();
            header('Location: index.php?error=1');
        }
    }

}

//Cuando el id cuestionario ya haya sido utilizado en una evaluaciòn
    echo $id;
    $selectin = "SELECT cuestionarios.id
            FROM cuestionarios 
            where cuestionarios.id in (select id_cuestionario from evaluaciones)";
    $resultadoin = mysqli_query($conexion, $selectin);
    if ($resultadoin) {
        while($filain = mysqli_fetch_assoc($resultadoin)){
            if($filain['id']==$id){
                $idupdate=$filain['id'];
                $ip = $_SERVER['REMOTE_ADDR'];
                $update=$conexion->prepare( " update cuestionarios set estado='B', actualizacion=NOW(), actualizacion_ip=? where cuestionarios.id=? ");
                $update->bind_param("si", $ip,$idupdate);
                $update->execute();
                $update->close();
                $conexion->close();
                header('Location: index.php?error=2');
            }
        }


}

define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
?>