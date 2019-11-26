<?php
    include '../../../../config/db.php';
    ob_start();
        $id = $_GET['id'];
        $sql = "update competencias set estado = '0' where id=".$id;
        $resultado=mysqli_query($conexion, $sql);
        if ($resultado) {
            header('location: index.php');
        }else{
            echo "no elimino";
        }
    ob_end_flush();
?>