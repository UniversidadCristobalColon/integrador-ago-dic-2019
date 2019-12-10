<?php
require_once '../../config/global.php';
include '../../config/db.php';
$i = 1;
while(isset($_POST['puesto'.$i]) && isset($_POST['id'.$i])){
$id_puesto = $_POST['puesto'.$i];
$id_employee = $_POST['id'.$i];
$query = "UPDATE empleados_temp set id_puesto_temp = $id_puesto where id = $id_employee";
$conexion->query($query);
	$i++;
}
$sql = "SELECT * FROM empleados_temp";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$no_empleado = $row['num_empleado'];
$nombre_empleado = $row['nombre'];
$apellido_empleado = $row['apellidos'];
$email_empleado = $row['email'];
$depa_empleado = $row['id_departamento'];
$puesto_empleado = $row['id_puesto_temp'];
$query = "INSERT INTO empleados(num_empleado,nombre,apellidos,email,id_departamento,id_puesto)
values('$no_empleado', '$nombre_empleado','$apellido_empleado', '$email_empleado', $depa_empleado, $puesto_empleado)";
$conexion->query($query);
    

}
$query = "truncate empleados_temp";
$conexion->query($query);
header("Location: import.php");
}



?>