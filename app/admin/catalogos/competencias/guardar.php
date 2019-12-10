<?php
    include '../../../../config/db.php';
    ob_start();
    $stmt = $conexion->prepare("INSERT INTO competencias (id, competencia, creacion, actualizacion, estado) VALUES (null,?, ?, ?,1)");
    $stmt->bind_param("sss", $nom_Com, $cre_Com, $act_Com);
    $nom_Com = $_POST['nom_Com'];
    if(empty($nom_Com)){
        header("location: nuevo.php");
    }else{
        $cre_Com = date('Y-m-d H:i:s');
        $act_Com = date('Y-m-d H:i:s');
        $stmt->execute();
        $stmt->close();
        header("location: index.php");
    }

    ob_end_flush();
?>
