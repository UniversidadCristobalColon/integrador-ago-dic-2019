<?php
require_once '../../../config/db.php';
$id_departamento = !empty($_GET["id_departamento"]) ? $_GET["id_departamento"] : '';
$id_periodo = !empty($_GET["id_periodo"]) ? $_GET["id_periodo"] : '';
$empleados = array();
if(!empty($id_departamento) && !empty($id_periodo)){
    $sql = "SELECT a.id, CONCAT(a.nombre, ' ', a.apellidos) as nombre 
            FROM empleados a, promedios_por_evaluado b
            WHERE b.id_periodo = $id_periodo
            and b.id_evaluado = a.id
            and a.id_departamento = $id_departamento
            GROUP by a.id, a.nombre, a.apellidos
            order by apellidos asc, nombre ASC";
    $res = mysqli_query($conexion, $sql);
    if ($res) {
        if(mysqli_num_rows($res)) {
            while($f = mysqli_fetch_assoc($res)) {
                array_push($empleados, $f);
            }
        }
    }
}
echo json_encode($empleados);
?>
