<?php
    require_once '../../config/global.php';
    include '../../config/db.php';

    //$ruta = "Upload/";
    $dep = $_POST['departamento'];
    foreach ($_FILES as $key) {
        $nombre = $key["name"];
        $ruta_temp = $key["tmp_name"];

    }
    $x = 0;
    $data = array();
    $fichero = fopen($ruta_temp , "r");

    while (($datos=fgetcsv($fichero,1000))!=false){
        $x++;
        if ($x>1){
            $data[]='('.$datos[0].',"'.$datos[1].'","'.$datos[2].'","'.$datos[3].'","'.$datos[4].'","'.$dep.'","11")';
        }
    }
    $insert= "insert into empleados_temp (num_empleado, nombre, apellidos, telefono, email, id_departamento, id_puesto_temp) values ".implode(",",$data);
    print_r("<pre>");
    print_r($insert);
    print_r("</pre>");
    mysqli_query($conexion,$insert);
    fclose($fichero);
    header("location: empleados_temp.php");

?>
