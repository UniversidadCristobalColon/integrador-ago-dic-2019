<?php

require_once '../../../../config/global.php';
include '../../../../config/db.php';

if(empty($_GET['id_evaluacion'])){
    exit('ID no establecido');
}
$Evaluacion = $_GET['id_evaluacion'];
$mostrar_msg_resultados = !empty($_GET['resultados']) && $_GET['resultados'] == '1';

define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad

$sql = "SELECT *, periodos.periodo FROM evaluaciones LEFT JOIN periodos ON periodos.id = evaluaciones.id_periodo WHERE evaluaciones.id = $Evaluacion";
$res = mysqli_query($conexion, $sql);
if($res){
    $f = mysqli_fetch_assoc($res);
    if(empty($f['id'])){
        exit('No existe información');
    }
    $Depa   = $f['id_departamento'];
    $Nombre = $f['descripcion'];
    $Periodo = $f['periodo'];
}

function formatoFechaCorta($fecha){
    setlocale(LC_TIME, 'es_MX');
    return !empty($fecha) ? strftime("%e %b %G, %r", strtotime($fecha)) : '';
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <title><?php echo PAGE_TITLE ?></title>
    <?php getTopIncludes(RUTA_INCLUDE ) ?>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        function guardar() {
            $('#Envio').trigger("submit");
        }
        function eliminar(id, eval) {
            var respuesta = confirm("¿Está seguro de que desea eliminar este evaluado?");
            if (respuesta===true){
                window.self.location = "eliminar.php?id_eliminar="+id+"&id_evaluacion="+eval;
            }
        }
        function enviar(id, eval) {
            var respuesta = confirm("¿Está seguro de que desea enviar esta evaluación?");
            if (respuesta===true){
                window.self.location = "enviar.php?id_enviar="+id+"&id_evaluacion="+eval;
            }
        }

        function validar(){
            var evaluado = $('#evaluado').val();
            var evaluadorS = $('#evaluadorS').val();
            var evaluadorP1 = $('#evaluadorP1').val();
            var evaluadorP2 = $('#evaluadorP2').val();
            var evaluadorC = $('#evaluadorC').val();
            if (evaluado == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Seleccione al personal que desea evaluar',
                });
                return false;
            }
            if (evaluadorP1 == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Seleccione al personal par que será el evaluador',
                });
                return false;
            }
            if (evaluadorP2 == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Seleccione al personal par que será el evaluador',
                });
                return false;
            }
            if (evaluado == evaluadorS){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluado como evaluador, verificar al evaluador jefe',
                });
                return false;
            }
            if (evaluado == evaluadorP1){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluado como evaluador, verificar al evaluador par',
                });
                return false;
            }
            if (evaluado == evaluadorP2){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluado como evaluador, verificar al evaluador par',
                });
                return false;
            }
            if (evaluado == evaluadorC){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluado como evaluador, verificar al evaluador cliente',
                });
                return false;
            }
            if (evaluadorS == evaluadorP1){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador jefe en otro campo de evaluador, verificar al evaluador par',
                });
                return false;
            }
            if (evaluadorS == evaluadorP2){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador jefe en otro campo de evaluador, verificar al evaluador par',
                });
                return false;
            }
            if ((evaluadorS!="") && (evaluadorS == evaluadorC)){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador jefe en otro campo de evaluador, verificar al evaluador cliente',
                });
                return false;
            }
            if (evaluadorP1 == evaluadorS){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador jefe',
                });
                return false;
            }
            if (evaluadorP1 == evaluadorP2){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador par',
                });
                return false;
            }
            if (evaluadorP1 == evaluadorC){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador cliente',
                });
                return false;
            }
            if (evaluadorP2 == evaluadorS){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador jefe',
                });
                return false;
            }
            if (evaluadorP2 == evaluadorP1){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador par',
                });
                return false;
            }
            if (evaluadorP2 == evaluadorC){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador par en otro campo de evaluador, verificar al evaluador cliente',
                });
                return false;
            }
            if ((evaluadorC!="") && (evaluadorC == evaluadorS)){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador cliente en otro campo de evaluador, verificar al evaluador jefe',
                });
                return false;
            }
            if (evaluadorC == evaluadorP1){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador cliente en otro campo de evaluador, verificar al evaluador par',
                });
                return false;
            }
            if (evaluadorC == evaluadorP2){
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No se puede seleccionar el mismo evaluador cliente en otro campo de evaluador, verificar al evaluador par',
                });
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
            <?php
            if($mostrar_msg_resultados) {
                ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle fa-1x"></i> Se han calculado los resultados de la evaluación
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>

            <!-- Page Content -->
            <h1><?php echo $Nombre?></h1>
            <small><?php echo $Periodo?></small>
            <hr>
            <h6>Participación general</h6>
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

            <div class="row mb-4">
                <div class="col">
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $porcentaje ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $porcentaje ?>%</div>
                    </div>
                </div>
            </div>

            <?php
            $ultima = "";
            $sqlultima = "select max(creacion) from promedios_por_evaluado where id_evaluacion = $Evaluacion";
            $resultima = mysqli_query($conexion,$sqlultima);
            if($resultima){
                $filaultima = mysqli_fetch_assoc($resultima);
                $ultima = $filaultima['max(creacion)'];
            }


            $mostrar_boton = false;
            if($porcentaje >= 65){
                $mostrar_boton = true;
            }

            $elementos_boton = $mostrar_boton ?"<a href='calculoPromedio.php?id={$Evaluacion}' class=\"btn btn-primary\">
                                                Calcular resultados
                                               </a>
                                               <div class='float-right text-right'>
                                               <small>Ultimo cálculo <br>$ultima</small>
                                               </div>" : "<button type=\"button\" class=\"btn btn-secondary disabled\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"La participación general debe ser de al menos un 65%\">
                                                Calcular resultados
                                               </button>
                                                <div class='text-right'>
                                               <small>$ultima</small>
                                               </div>";
            ?>

            <div class="row mb-3">
                <div class="col">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalSiguiente">Agregar evaluación</button>
                    <?php echo $elementos_boton?>
                </div>
            </div>

            <?php
            $sql = "SELECT b.id, b.nombre, b.apellidos 
                    FROM aplicaciones a, empleados b 
                    WHERE a.id_evaluado = b.id 
                    and a.id_evaluacion = $Evaluacion
                    
                    GROUP BY b.id, b.nombre, b.apellidos";

            $resultado = mysqli_query($conexion,$sql);
            $evaluados = array();
            if($resultado){
                while($fila = mysqli_fetch_assoc($resultado)){
                    $evaluados[]=$fila;
                }
            }
            if (!empty($evaluados)) {
                $columnas = 0;
                $Enviado = 0;
                foreach ($evaluados as $evaluado) {
                    if($columnas == 0){
                        echo '<div class="row">';
                    }


                    $id_evaluado        = $evaluado['id'];
                    $nombre_evaluado    = $evaluado['nombre'];
                    $apellido_evaluado  = $evaluado['apellidos'];


                    $sqlVerde = "select COUNT(aplicaciones.email_enviado) as enviado from aplicaciones 
                         WHERE aplicaciones.id_evaluado = $id_evaluado 
                         AND aplicaciones.id_evaluacion = $Evaluacion
                         AND aplicaciones.email_enviado = 'S'";
                    $resultadoVerde = mysqli_query($conexion,$sqlVerde);
                    if($resultadoVerde){
                        $filaVerde = mysqli_fetch_assoc($resultadoVerde);
                        $Enviado = $filaVerde['enviado'];
                    }


                    $sql1="select emp.id, emp.nombre,emp.apellidos, puestos.puesto, roles.rol, app.estado, SUBSTRING(app.hash, 1, 7) as codigo, app.finalizado from aplicaciones app 
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

                        if($Enviado>0){
                            $liga_enviar_registro = "<a title=\"Enviar registro\"  href=\"javascript:;\"  class=\"btn btn-light\" onclick=\"enviar($id_evaluado, $Evaluacion)\">
                                                            <i class=\"fas fa-paper-plane text-success\"></i>
                                                           </a>";
                        } else {
                            $liga_enviar_registro = "<a title=\"Enviar registro\"  href=\"javascript:;\"  class=\"btn btn-light\" onclick=\"enviar($id_evaluado, $Evaluacion)\">
                                                            <i class=\"fas fa-paper-plane\"></i>
                                                           </a>";
                        }
                ?>


                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <?php echo "<small>Evaluado</small><h4>$nombre_evaluado $apellido_evaluado</h4>"; ?>
                                </div>
                                <div class="col-md-2 text-right">
                                    <?php echo $liga_eliminar_registro ?>
                                    <?php echo $liga_enviar_registro ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-group list-group-flush">
                                        <?php
                                        if(!empty($Evaluadores)) {
                                            foreach ($Evaluadores as $row2) {
                                                $nombre = $row2['nombre'];
                                                $apellido = $row2['apellidos'];
                                                $puesto = $row2['puesto'];
                                                $rol = $row2['rol'];
                                                $estado = $row2['estado'];
                                                $codigo = $row2['codigo'];

                                                $clase          = '';
                                                $finalizado   = '';
                                                switch ($estado) {
                                                    case 'A':
                                                        $clase = 'text-danger';
                                                        break;
                                                    case 'B':
                                                        $clase = 'text-warning';
                                                        break;
                                                    case 'C':
                                                        $clase = 'text-success';
                                                        $finalizado = formatoFechaCorta($row2['finalizado']);
                                                        break;
                                                }


                                                ?>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-1 text-center">
                                                            <i class="fa fa-circle <?php echo $clase ?>"></i>
                                                        </div>
                                                        <div class="col-md-11">

                                                            <?php
                                                                if(!empty($finalizado)){
                                                                    echo "<small class='float-right text-right'>Finalizó el <br>{$finalizado}</small>";
                                                                }
                                                                echo "<h5>$nombre $apellido</h5><div>$puesto ($rol)</div>
                                                                     <div>Código de la evaluación:<samp> $codigo</samp></div>"
                                                            ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                    if(++$columnas >= 2){
                        echo '</div>'; //row
                        $columnas = 0;
                    }
                }
            } else {
                echo '<div class="row"><div class="col"><h4>No hay registros</h4></div>';
            }
            ?>


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
                                <label><input type="checkbox" name="auto" value="1"> Se auto-evalúa</label>
                                <hr/>
                            </fieldset>

                            <?php
                            $sql = "SELECT empleados.id, empleados.nombre, empleados.apellidos, puestos.puesto, niveles_puesto.nivel_puesto FROM niveles_puesto 
                                                                    LEFT JOIN puestos ON puestos.id_nivel_puesto = niveles_puesto.id 
                                                                    LEFT JOIN empleados ON empleados.id_puesto = puestos.id 
                                                                    LEFT JOIN departamentos ON departamentos.id = empleados.id_departamento 
                                                                    WHERE empleados.estado = 'A' AND departamentos.id =".$Depa;
                            $resultado = mysqli_query($conexion,$sql);
                            $lista_empleados = array();

                            if($resultado) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    $lista_empleados[] = $fila;
                                }
                            }

                            if(!empty($lista_empleados)) {
                                ?>
                                <fieldset>
                                    <legend>Evaluadores</legend>
                                    <div class="form-group">
                                        <label for="evaluadorS">Jefe</label>
                                        <select class="form-control mb-3" name="evaluadorS" id="evaluadorS">
                                            <option selected value="">Seleccione una opción</option>
                                            <?php
                                            foreach ($lista_empleados as $fila) {
                                                echo "<option value = '$fila[id]'>$fila[nombre] $fila[apellidos] ($fila[nivel_puesto])</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <p>Par 1</p>
                                    <select class="form-control mb-3" name="evaluadorP1" id="evaluadorP1">
                                        <option selected value="">Seleccione una opción</option>
                                        <?php
                                        foreach ($lista_empleados as $fila) {
                                            echo "<option value = '$fila[id]'>$fila[nombre] $fila[apellidos] ($fila[nivel_puesto])</option>";
                                        }
                                        ?>
                                    </select>
                                    <p>Par 2</p>
                                    <select class="form-control mb-3" name="evaluadorP2" id="evaluadorP2">
                                        <option selected value="">Seleccione una opción</option>
                                        <?php
                                        foreach ($lista_empleados as $fila) {
                                            echo "<option value = '$fila[id]'>$fila[nombre] $fila[apellidos] ($fila[nivel_puesto])</option>";
                                        }
                                        ?>
                                    </select>
                                    <p>Cliente</p>
                                    <select class="form-control mb-3" name="evaluadorC" id="evaluadorC">
                                        <option selected value="">Seleccione una opción</option>
                                        <?php
                                        foreach ($lista_empleados as $fila) {
                                            echo "<option value = '$fila[id]'>$fila[nombre] $fila[apellidos] ($fila[nivel_puesto])</option>";
                                        }
                                        ?>
                                    </select>
                                </fieldset>
                                <?php
                            }else{
                                echo '<h5>No hay trabajadores en el departamento seleccionado</h5>';
                            }
                            ?>
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

<script type="text/javascript" src="../../../../vendor/bootstrap/js/popper.min.js"></script>
</body>

</html>
