<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';
$id = $_GET["id"];
//Cuando el id_evaluacion no esté en aplicacion
$select = "SELECT evaluaciones.id 
            FROM evaluaciones 
            where evaluaciones.id 
            not in (
                select id_evaluacion from aplicaciones) 
            order by evaluaciones.id";
$resultado = mysqli_query($conexion, $select);
if ($resultado) {
    while($fila = mysqli_fetch_assoc($resultado)){
        if($fila['id']==$id){

            $ideliminar=$fila['id'];
            $delete= "delete from evaluaciones where evaluaciones.id=$ideliminar ";
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
$selectin = "SELECT evaluaciones.id 
FROM evaluaciones 
where evaluaciones.id 
in ( select id_evaluacion from aplicaciones) 
order by evaluaciones.id";
$resultadoin = mysqli_query($conexion, $selectin);
if ($resultadoin) {
    while($filain = mysqli_fetch_assoc($resultadoin)){
        if($filain['id']==$id){
            $idupdate=$filain['id'];
            $ip = $_SERVER['REMOTE_ADDR'];
            $update=$conexion->prepare( " update evaluaciones set estado='B', actualizacion=NOW(), actualizacion_ip=? where evaluaciones.id=? ");
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
