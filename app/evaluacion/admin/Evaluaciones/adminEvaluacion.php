<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';

if(empty($_GET['id_evaluacion'])){
    exit('ID no establecido');
}
$Evaluacion = $_GET['id_evaluacion'];
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad

$sql = "select * from evaluaciones where id = $Evaluacion";
$res = mysqli_query($conexion, $sql);
if($res){
    $f = mysqli_fetch_assoc($res);
    if(empty($f['id'])){
        exit('No existe información');
    }
    $Depa   = $f['id_departamento'];
    $Nombre = $f['descripcion'];
}
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
    <script src="../../../../vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="../../../../vendor/datepicker/css/bootstrap-datepicker.standalone.min.css">

    <script>
        $(document).ready(function () {
            $('#F-inicio').datepicker();
        });
        $(document).ready(function () {
            $('#F-fin').datepicker();
        });

        function guardar() {
            $('#Envio').trigger("submit");
        }
        function eliminar(id, eval) {
            //$('#Borrado').trigger("submit");
            var respuesta = confirm("¿Está seguro de que desea eliminar este evaluado?");
            if (respuesta===true){
                window.self.location = "eliminar.php?id_eliminar="+id+"&id_evaluacion="+eval;
            }
        }

        function validar(){
            var evaluado = $('#evaluado').val();
            var evaluadorS = $('#evaluadorS').val();
            var evaluadorP1 = $('#evaluadorP1').val();
            var evaluadorP2 = $('#evaluadorP2').val();
            var evaluadorC = $('#evaluadorC').val();
            if (evaluado == "") {
                alert("Seleccione al personal que desea evaluar");
                return false;
            }
            if (evaluadorS == "") {
                alert("Seleccione al personal superior que sera el evaluardor");
                return false;
            }
            if (evaluadorP1 == "") {
                alert("Seleccione al personal par que sera el evaluardor");
                return false;
            }
            if (evaluadorP2 == "") {
                alert("Seleccione al personal par que sera el evaluardor");
                return false;
            }
            if (evaluadorC == "") {
                alert("Seleccione al cliente que sera el evaluardor");
                return false;
            }
            if (evaluado == evaluadorS){
                alert("No se puede seleccionar el mismo evaluado como evaluador, verificar al evaluador superior");
                return false;
            }
            if (evaluado == evaluadorP1){
                alert("No se puede seleccionar el mismo evaluado como evaluador, verificar al evaluador par");
                return false;
            }
            if (evaluado == evaluadorP2){
                alert("No se puede seleccionar el mismo evaluado como evaluador, verificar al evaluador par");
                return false;
            }
            if (evaluado == evaluadorC){
                alert("No se puede seleccionar el mismo evaluado como evaluador, verificar al evaluador cliente");
                return false;
            }
            if (evaluadorS == evaluadorP1){
                alert("No se puede seleccionar el mismo evaluador superior en otro campo de evaluador, verificar al evaluador par");
                return false;
            }
            if (evaluadorS == evaluadorP2){
                alert("No se puede seleccionar el mismo evaluador superior en otro campo de evaluador, verificar al evaluador par");
                return false;
            }
            if (evaluadorS == evaluadorC){
                alert("No se puede seleccionar el mismo evaluador superior en otro campo de evaluador, verificar al evaluador cliente");
                return false;
            }
            if (evaluadorP1 == evaluadorS){
                alert("No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador superior");
                return false;
            }
            if (evaluadorP1 == evaluadorP2){
                alert("No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador par");
                return false;
            }
            if (evaluadorP1 == evaluadorC){
                alert("No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador cliente");
                return false;
            }
            if (evaluadorP2 == evaluadorS){
                alert("No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador superior");
                return false;
            }
            if (evaluadorP2 == evaluadorP1){
                alert("No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador par");
                return false;
            }
            if (evaluadorP2 == evaluadorC){
                alert("No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador cliente");
                return false;
            }
            if (evaluadorC == evaluadorS){
                alert("No se puede seleccionar el mismo evaluador cliente en otro campo de evaluador, verificar al evaluador superior");
                return false;
            }
            if (evaluadorC == evaluadorP1){
                alert("No se puede seleccionar el mismo evaluador cliente en otro campo de evaluador, verificar al evaluador par");
                return false;
            }
            if (evaluadorC == evaluadorP2){
                alert("No se puede seleccionar el mismo evaluador cliente en otro campo de evaluador, verificar al evaluador par");
                return false;
            }
            return true;
        }

    </script>
</head>

<body id="page-top">

<?php getNavbar() ?>

<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Page Content -->
            <h1><?php echo $Nombre?></h1>
            <hr>
            <h6>Progreso general de la evaluacion</h6>
            <?php
                $total = 0;
                $Iniciadas = 0;
                $Correctas = 0;

                $sql = "select estado from aplicaciones where id_evaluacion = $Evaluacion";
                $res = mysqli_query($conexion,$sql);
                if($res){
                    while($fila = mysqli_fetch_assoc($res)){
                        $estado = $fila['estado'];

                        if($estado != 'A'){
                            $Iniciadas++;
                        }

                        if($estado == 'C'){
                            $Correctas++;
                        }

                        $total++;
                    }
                }

                $porcentaje = $Correctas > 0 && $total > 0 ? floor(($Correctas*100)/$total) : 0;
            ?>

            <div class="row mb-5">
                <div class="col">
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $porcentaje ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $porcentaje ?>%</div>
                    </div>
                </div>
            </div>

            <?php
            $mostrar_boton = false;
            if($porcentaje > 65){
                $mostrar_boton = true;
            }

            $elementos_boton = $mostrar_boton ?"<button class=\"btn btn-primary\" type=\"button\">
                                                                Calculo de promedio
                                                               </button>" : "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"tooltip\" data-placement=\"top\" disabled title=\"La evaluación debe de estar un 65% completada como mínimo\">
                                                                Calculo de promedio
                                                               </button>";
            ?>

            <div class="row mb-3">
                <div class="col">
                    <button class="btn btn-primary" type="button">Envio</button>
                    <?php echo $elementos_boton?>
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalSiguiente">Agregar evaluación</button>
                </div>
            </div>

            <div class="form-group">
                <?php
                $sql = "SELECT b.id, b.nombre, b.apellidos FROM aplicaciones a, empleados b WHERE a.id_evaluado = b.id and a.id_evaluacion = $Evaluacion GROUP BY b.id, b.nombre, b.apellidos";
                $resultado = mysqli_query($conexion,$sql);
                $evaluados = array();
                if($resultado){
                    while($fila = mysqli_fetch_assoc($resultado)){
                        $evaluados[]=$fila;
                    }
                }
                if (!empty($evaluados)) {
                    foreach ($evaluados as $evaluado) {
                        $id_evaluado        = $evaluado['id'];
                        $nombre_evaluado    = $evaluado['nombre'];
                        $apellido_evaluado  = $evaluado['apellidos'];


                    $sql1="select emp.id, emp.nombre,emp.apellidos, puestos.puesto, roles.rol, app.estado, SUBSTRING(app.hash, 1, 7) as codigo from aplicaciones app 
                            left join empleados emp on app.id_evaluador=emp.id 
                            LEFT JOIN puestos ON emp.id_puesto = puestos.id 
                            LEFT JOIN roles ON roles.id = app.id_rol_evaluador
                            where app.id_evaluado=$id_evaluado and app.id_evaluacion = $Evaluacion";
                    $resultado2 = $conexion->query($sql1);

                    /*  ESTE SQL ES PARA LO DEL CORREO, TE SACA EL ID, NOMBRE, APELLIDO, CORREO DEL EMPLEADO, ASI COMO SU ESTATUS Y HASH DE LAS PLICACIONES
                     * select emp.id, emp.nombre,emp.apellidos, emp.email, app.estado, SUBSTRING(app.hash, 1, 7) as codigo from aplicaciones app
                    left join empleados emp on app.id_evaluador=emp.id where app.id_evaluado=10 and app.id_evaluacion = 1*/

                    $Evaluadores = array();
                    $mostrar_eliminar = true;
                        while($row2 = $resultado2 -> fetch_assoc()){
                            $Evaluadores[] = $row2;
                            if($row2['estado'] == 'B' || $row2['estado'] == 'C'){
                                $mostrar_eliminar = false;
                            }
                        }

                            $liga_eliminar_registro = $mostrar_eliminar ?"<a title=\"Eliminar registro\"  href=\"javascript:;\"  class=\"btn btn-light\" onclick=\"eliminar($id_evaluado, $Evaluacion)\">
                                                                <i class=\"fa fa-trash\"></i>
                                                               </a>" : '';

                    ?>



                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <?php echo "<h3>$nombre_evaluado $apellido_evaluado</h3>"; ?>
                                </div>
                                <div class="col-md-2 text-right">
                                    <?php echo $liga_eliminar_registro ?>
                                    <a class="btn btn-light">
                                    <i class="fas fa-paper-plane"></i>
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <?php
                                        foreach ($Evaluadores as $row2) {
                                            $nombre = $row2['nombre'];
                                            $apellido = $row2['apellidos'];
                                            $puesto = $row2['puesto'];
                                            $rol = $row2['rol'];
                                            $estado = $row2['estado'];
                                            $codigo = $row2['codigo'];

                                            //$estado = $row2['estado'];
                                            //$estado = 'A';

                                            $clase = '';
                                            switch($estado){
                                                case 'A':
                                                    $clase = 'text-danger';
                                                    break;
                                                case 'B':
                                                    $clase = 'text-warning';
                                                    break;
                                                case 'C':
                                                    $clase = 'text-success';
                                                    break;

                                            }
                                            ?>

                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-1 text-center">
                                                        <i class="fa fa-circle <?php echo $clase ?>"></i>
                                                    </div>
                                                    <div class="col-11">
                                                        <?php echo "<h5>$nombre $apellido</h5><div><div>$puesto ($rol)</div></div>
                                                                     <p>Codigo de la evaluación:<samp> $codigo</samp></p>" ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                        }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                } else {
                    echo '<h2>No hay registros</h2>';
                }
                ?>

            </div>
        </div>
        <!-- /.container-fluid -->


        <div class="modal fade" id="modalSiguiente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal">Agregar una evaluación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="actualizar.php" method="post" id="Envio" onsubmit="return validar()">
                            <input type="hidden" name="id_evaluacion" value="<?php echo $Evaluacion?>">
                            <input type="hidden" name="id_departamento" value="<?php echo $Depa?>">
                            <input type="hidden" name="id_nombre" value="<?php echo $Nombre?>">
                            <fieldset class="form-group">
                                <legend>Personal a evaluar</legend>
                                <select class="form-control mb-3" name="evaluado" id="evaluado">
                                    <option selected value="">Seleccione una opción</option>
                                    <?php
                                    $sql = "SELECT empleados.id, empleados.nombre, empleados.apellidos, puestos.puesto, niveles_puesto.nivel_puesto FROM niveles_puesto
                                            LEFT JOIN puestos ON puestos.id_nivel_puesto = niveles_puesto.id 
                                            LEFT JOIN empleados ON empleados.id_puesto = puestos.id
                                            LEFT JOIN departamentos ON departamentos.id = empleados.id_departamento 
                                            WHERE empleados.estado = 'A' AND departamentos.id   = $Depa 
                                            AND empleados.id NOT IN (SELECT aplicaciones.id_evaluado from aplicaciones WHERE id_evaluacion = $Evaluacion)";
                                    $resultado = mysqli_query($conexion,$sql);
                                    if($resultado){
                                        while($fila = mysqli_fetch_assoc($resultado)){
                                            echo "<option value = '$fila[id]'>$fila[nombre] $fila[apellidos] ($fila[nivel_puesto], $fila[puesto])</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="checkbox" name="auto" value="1"> El evaluado se auto-evalúa
                                <hr/>
                            </fieldset>

                            <fieldset><legend>Evaluadores</legend>
                                <div class="form-group">
                                    <label for="evaluadorS">Superior</label>
                                    <select class="form-control mb-3" name="evaluadorS" id="evaluadorS">
                                        <option selected value="">Seleccione al trabajador</option>
                                        <?php
                                        $sql = "SELECT empleados.id, empleados.nombre, empleados.apellidos, puestos.puesto, niveles_puesto.nivel_puesto FROM niveles_puesto 
                                                                    LEFT JOIN puestos ON puestos.id_nivel_puesto = niveles_puesto.id 
                                                                    LEFT JOIN empleados ON empleados.id_puesto = puestos.id 
                                                                    LEFT JOIN departamentos ON departamentos.id = empleados.id_departamento 
                                                                    WHERE empleados.estado = 'A' AND departamentos.id =".$Depa;
                                        $resultado = mysqli_query($conexion,$sql);
                                        if($resultado){
                                            while($fila = mysqli_fetch_assoc($resultado)){
                                                echo "<option value = '$fila[id]'>$fila[nombre] $fila[apellidos] ($fila[nivel_puesto], $fila[puesto])</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <p>Par 1</p>
                                <select class="form-control mb-3" name="evaluadorP1" id="evaluadorP1">
                                    <option selected value="">Seleccione al trabajador</option>
                                    <?php
                                    $sql = "SELECT empleados.id, empleados.nombre, empleados.apellidos, puestos.puesto, niveles_puesto.nivel_puesto FROM niveles_puesto 
                                                                LEFT JOIN puestos ON puestos.id_nivel_puesto = niveles_puesto.id 
                                                                LEFT JOIN empleados ON empleados.id_puesto = puestos.id 
                                                                LEFT JOIN departamentos ON departamentos.id = empleados.id_departamento 
                                                                WHERE empleados.estado = 'A' AND departamentos.id =".$Depa;
                                    $resultado = mysqli_query($conexion,$sql);
                                    if($resultado){
                                        while($fila = mysqli_fetch_assoc($resultado)){
                                            echo "<option value = '$fila[id]'>$fila[nombre] $fila[apellidos] ($fila[nivel_puesto], $fila[puesto])</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <p>Par 2</p>
                                <select class="form-control mb-3" name="evaluadorP2" id="evaluadorP2">
                                    <option selected value="">Seleccione al trabajador</option>
                                    <?php
                                    $sql = "SELECT empleados.id, empleados.nombre, empleados.apellidos, puestos.puesto, niveles_puesto.nivel_puesto FROM niveles_puesto 
                                                                LEFT JOIN puestos ON puestos.id_nivel_puesto = niveles_puesto.id 
                                                                LEFT JOIN empleados ON empleados.id_puesto = puestos.id 
                                                                LEFT JOIN departamentos ON departamentos.id = empleados.id_departamento 
                                                                WHERE empleados.estado = 'A' AND departamentos.id =".$Depa;
                                    $resultado = mysqli_query($conexion,$sql);
                                    if($resultado){
                                        while($fila = mysqli_fetch_assoc($resultado)){
                                            echo "<option value = '$fila[id]'>$fila[nombre] $fila[apellidos] ($fila[nivel_puesto], $fila[puesto])</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <p>Cliente</p>
                                <select class="form-control mb-3" name="evaluadorC" id="evaluadorC">
                                    <option selected value="">Seleccione al trabajador</option>
                                    <?php
                                    $sql = "SELECT empleados.id, empleados.nombre, empleados.apellidos, puestos.puesto, niveles_puesto.nivel_puesto FROM niveles_puesto 
                                                                LEFT JOIN puestos ON puestos.id_nivel_puesto = niveles_puesto.id 
                                                                LEFT JOIN empleados ON empleados.id_puesto = puestos.id 
                                                                LEFT JOIN departamentos ON departamentos.id = empleados.id_departamento 
                                                                WHERE empleados.estado = 'A' AND departamentos.id =".$Depa;
                                    $resultado = mysqli_query($conexion,$sql);
                                    /*if($resultado){
                                        while($fila = mysqli_fetch_assoc($resultado)){
                                            echo "<div class='form-check'>
                                            <input class='form-check-input' type='checkbox' value='$fila[id]' id='$fila[id]' name='empleado[]'>
                                            <label class='form-check-label' for='$fila[id]'>
                                            $fila[nombre] $fila[apellidos]
                                            </label>
                                            </div>";
                                        }
                                    }*/
                                    if($resultado){
                                        while($fila = mysqli_fetch_assoc($resultado)){
                                            echo "<option value = '$fila[id]'>$fila[nombre] $fila[apellidos] ($fila[nivel_puesto], $fila[puesto])</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary ml-3" id="agregarNuevo" onclick="guardar()">Agregar</button>
                    </div>
                </div>
            </div>
        </div>


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
