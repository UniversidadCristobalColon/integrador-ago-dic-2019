<?php
require_once '../../../config/global.php';
include '../../../config/db.php';
define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo PAGE_TITLE ?></title>

    <?php getTopIncludes(RUTA_INCLUDE ) ?>

    <script>
        var empleados = {
            <?php
            $sql="SELECT id, nombre, apellidos, id_departamento from empleados";
            $res=$conexion->query($sql  );
            while($row=$res->fetch_assoc()) {
                echo "'".$row['id']."': ['".$row['nombre']."', '".$row['apellidos']."', '".$row['id_departamento']."'], ";
            }
            ?>
            '' : ['', '', '']
        }
        $(document).ready(function () {
            $('#departamentos').on('change', function () {
                $departamento = $('#departamentos').val();
                $('#empleados').empty();
                $('#empleados').append('<option selected disabled> Seleccione empleado </option>');
                for(empleado in empleados){
                    if(empleados[empleado][2] == $departamento) {
                        $('#empleados').append('<option value="' + empleado + '">' + empleados[empleado][0] + ' ' + empleados[empleado][1] + '</option>');
                    }
                }
            }).change();
        });
    </script>
</head>

<body id="page-top">

<?php getNavbar() ?>

<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Comparativo Histórico
                </div>

                <div class="card-body">
                    <form method="get">
                    <div class="row">

                        <div class="col">
                            <label>Periodos</label>
                            <div class="dropdown">
                                <button class="custom-select" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seleccione periodos</button>
                                <ul class="dropdown-menu">
                                    <?php
                                    $sql="SELECT id, periodo FROM periodos";
                                    $res=$conexion->query($sql);
                                    while ($row = $res->fetch_assoc()) {
                                    ?>
                                    <li><label class="checkbox"><input type="checkbox" name="periodo[]" value="<?php echo $row['periodo']; ?>"><?php echo $row['periodo']; ?></label></li>
                                     <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                        </div>

                        <div class="col">
                            <div class="form-group">
                            <label>Departamento</label>
                            <select class="browser-default custom-select" id="departamentos" name="departamento">
                                <option selected disabled> Seleccione departamento </option>
                                <?php
                                $sql="SELECT id, departamento FROM departamentos";
                                $res=$conexion->query($sql);
                                while ($row = $res->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['departamento']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                           <label>Empleados</label>
                            <select class="browser-default custom-select" id="empleados" name="empleado" >
                            </select>
                            </div>
                        </div>


                        <div class="col">
                            <input type="submit" class="btn btn-primary mt-4" value="Buscar">
                        </div>

                    </div>



                    </form>

                    <?php

                    $periodos = @$_GET['periodo'];
                    //print_r($periodos);
                    $departamento = @$_GET['departamento'];
                    //echo " ";
                    $empleado = @$_GET['empleado'];
                    //echo "<br>";
$anterior = null;
                        if (isset($_GET['periodo'])){
                            if (isset($_GET['departamento'])){
                                if (isset($_GET['empleado'])) {
                                    //    foreach($_GET['periodo'] as $periodo){

                                   $sql = "SELECT (SELECT periodo FROM periodos WHERE id = p.id_periodo) AS \"Periodo\", 
                                (SELECT nombre FROM empleados WHERE id = p.id_evaluado) AS \"Nombre de Evaluado\", 
                                (SELECT apellidos FROM empleados WHERE id = p.id_evaluado) AS \"Apellido de Evaluado\", 
                                (SELECT nivel_puesto FROM niveles_puesto WHERE id = p.id_evaluador_nivel) AS \"Nivel de Puesto\", 
                                (SELECT aseveracion FROM decalogos_aseveraciones WHERE id = (SELECT id_decalogo_aseveracion FROM preguntas WHERE id = p.id_pregunta)) AS \"Aseveraciones\", 
                                puntos AS \"Puntos\",
                                (SELECT p.id_pregunta) AS \"Id Pregunta\"
                                FROM promedios_por_evaluado AS p
                                WHERE id_evaluado = " . $_GET["empleado"]."
                                ORDER BY p.id_evaluador_nivel
                                ";

                                    $res = $conexion->query($sql);

                                    if ($res) {
                                        $row = $res->fetch_assoc();
                                        if (isset($row['Nombre de Evaluado'])) {
                                            ?>

                                            <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <td><h3>Resultados
                                                        de <?php echo $row['Nombre de Evaluado'] . ' ' . $row['Apellido de Evaluado'] ?></h3></td>
                                                <?php

                                                if (isset($periodos)) {
                                                    foreach ($periodos as $periodo) {
                                                        echo "<td>" . $periodo . "</td>";
                                                    }
                                                }

                                                ?>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            <?php
                                            $res = $conexion->query($sql);
                                            while ($row = $res->fetch_assoc()) {
                                                ?>
                                                <?php if($row['Nivel de Puesto'] != $anterior) {echo "<tr><td colspan='5'><b>".$row['Nivel de Puesto']."</b></tr></td>"; } $anterior = $row['Nivel de Puesto']; ?>

                                                <tr>
                                                    <td><?php echo $row['Aseveraciones']; ?></td>
                                                    <?php
                                                    if (isset($periodos)) {
                                                        foreach ($periodos as $periodo) {
                                                            $sql1 = "SELECT puntos FROM promedios_por_evaluado WHERE id_evaluado = \"" . $_GET["empleado"] . "\"
                                                                    AND id_periodo = (SELECT id FROM periodos WHERE periodo = \"" . $periodo . "\")
                                                                    AND id_pregunta = " . $row["Id Pregunta"];
                                                            //echo "<br>";
                                                            $res1 = $conexion->query($sql1);
                                                            $row1 = $res1->fetch_assoc();
                                                            if(isset($row1['puntos'])) {
                                                                echo "<td>" . $row1['puntos'] . "</td>";
                                                            } else {
                                                                echo "<td> - </td>";
                                                            }
                                                        }
                                                    }

                                                    ?>
                                                </tr>

                                                <?php
                                            }
                                        } //ESTE ES DEL IF DE SI NO HAY EMPLEADO, puedo poner un else para enviar mensaje

                                ?>
                                </tbody>
                                </table>
                                </div>
                                <?php

                            }

                                } //ESTE ES EL IF DE SELECCIONAR PERIODO
                            } //ESTE ES EL IF DE SELECCIONAR DEPARTAMENTO
                        } //ESTE ES EL IF DE SELECCIONAR EMPLEADO
                    ?>

                <!--
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>El empleado sabe negociar ante situaciones criticas</td>
                                <td>3</td>
                                <td>4</td>
                                <td>2</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>El empleado es empático y mentor con sus colaboradores</td>
                                <td>2</td>
                                <td>1</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                -->
                </div>

                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <?php getFooter() ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php getModalLogout() ?>

<?php getBottomIncudes( RUTA_INCLUDE ) ?>

</body>

</html>
