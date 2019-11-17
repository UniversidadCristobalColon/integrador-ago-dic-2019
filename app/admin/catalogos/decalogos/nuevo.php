<?php

require '../../../../config/db.php';

$n_deca = $_POST['nuevodeca'];
$act = date("Y-m-d H:i:s");
$sql = "INSERT INTO decalogos (decalogo, actualizacion, id_escala) VALUES ('$n_deca','$act','1');";

if (mysqli_query($conexion, $sql)) {
    header("location: index.php");
    /*Se ha guardado el registro*/
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

mysqli_close($conexion);