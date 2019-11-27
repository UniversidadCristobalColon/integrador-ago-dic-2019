<?php

require_once("../../../../config/db.php");
echo $hola;
/*
$sql = "SELECT id_marca, marca, desc_marca FROM marcas";
$result = $conexion->query($sql);
$arreglo = [];

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $usuario["id_marca"] = $row["id_marca"];
        $usuario["descripcion"] = $row["desc_marca"];
        $usuario["marca"] = $row["marca"];
        array_push($arreglo,$usuario);
      }
} else {
    echo "0 results";
}
*/

?>