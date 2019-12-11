<?php
include '../../../../config/db.php';
$id = ($_POST['preguntas']);
$idCuestionario = $_POST['idCuestionario'];
if (!empty($id)){
    foreach ($id as $idc){
        $orden = $_POST["ordenp_$idc"];
        $idpregunta = $idc;

        $sql = "UPDATE preguntas set id_cuestionario = $idCuestionario,orden = $orden where id =  $idpregunta";
        $resultado = mysqli_query($conexion, $sql);

        if ($conexion->query($sql) === TRUE) {
            header("location: editar.php?=id=$idCuestionario");
        } else {
            echo "Error updating record: " . $conexion->error;
        }


    }


}else{
    header("location: editar.php?=id=$idCuestionario");
}

?>