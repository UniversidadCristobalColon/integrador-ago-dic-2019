<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad

$sql = "DELETE FROM niveles_puesto WHERE id='$_POST[id]'";
if (mysqli_query($conexion, $sql)) {
    echo "<div class='alert alert-success mt-4' role='alert'><h3>Has eliminado el Nivel.</h3>
        <a class='btn btn-outline-primary' href='index.php' role='button'>Ver Niveles</a></div>";
} else {
    echo "Error: " .$sql. "<br>" .mysqli_error($conexion);
}

mysqli_close($conexion);
?>


