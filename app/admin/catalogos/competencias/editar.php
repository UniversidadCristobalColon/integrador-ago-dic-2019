<?php
include '../../../../config/db.php';
ob_start();
$id = $_POST['id'];
$nom_Com = $_POST['nom_Com'];
if(empty($nom_Com)){
    header("location: agregar_editar.php?id=".$id);
}else{
    $act_Com = date('Y-m-d H:i:s');
    $editar = "update competencias set competencia = '".$nom_Com."', actualizacion = '".$act_Com."' where id=".$id;
    $resultado = mysqli_query($conexion, $editar);
    if ($resultado) {
        header('location: index.php');
    }else{
        echo "no edito";
    }
}

ob_end_flush();
?>