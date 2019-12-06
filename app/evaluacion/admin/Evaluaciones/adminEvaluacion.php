<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';
$Depa = $_GET['id_departamento'];
$Nombre = $_GET['id_nombre'];
$Evaluacion = $_GET['id_evaluacion'];
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
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
        function eliminar(id, eval, depa, nombre) {
            //$('#Borrado').trigger("submit");
            var respuesta = confirm("¿Está seguro de que desea eliminar este evaluado?");
            if (respuesta===true){
                window.self.location = "eliminar.php?id_eliminar="+id+"&id_evaluacion="+eval+"&id_departamento="+depa+"&id_nombre="+nombre;
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

                <button class="btn btn-success mb-3">Envio</button>

                <button class="btn btn-info mb-3">Cálculo de promedio</button>

                <div class="form-group">

                    <div class="input-group mb-3 col-3">
                        <p>Personal a evaluar</p>

                        <!-- modal -->

                        <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#modalSiguiente">
                            Agregar
                        </button>
                    </div>
                        <div class="modal fade" id="modalSiguiente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal"><?php echo $Nombre?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <form action="actualizar.php" method="post" id="Envio" onsubmit="return validar()">
                                                <input type="hidden" name="id_evaluacion" value="<?php echo $Evaluacion?>">
                                                <input type="hidden" name="id_departamento" value="<?php echo $Depa?>">
                                                <input type="hidden" name="id_nombre" value="<?php echo $Nombre?>">
                                            <div class="form-check">
                                                <p>Evaluado</p>
                                                <select class="form-control mb-3" name="evaluado" id="evaluado">
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
                                                <p>Superior</p>
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
                                                <input type="checkbox" name="auto" value="1"> Autoevaluación
                                            </div>
                                            </form>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary ml-3" id="agregarNuevo" onclick="guardar()">Continuar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- DataTables Example -->
                    <form action="eliminar.php" method="post" id="Borrado">
                        <?php
                        $sql = "SELECT id_evaluado FROM aplicaciones WHERE id_evaluacion = $Evaluacion GROUP BY id_evaluado";
                        $resultado = mysqli_query($conexion,$sql);
                        $evaluados = array();
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                $evaluados[]=$fila['id_evaluado'];
                            }
                        }
                        if (!empty($evaluados)) {
                        foreach ($evaluados as $id_evaluado) {
                        $sql1="select emp.id, emp.nombre,emp.apellidos, puestos.puesto, niveles_puesto.nivel_puesto from aplicaciones app 
                                                left join empleados emp on app.id_evaluador=emp.id 
                                                LEFT JOIN puestos ON emp.id_puesto = puestos.id 
                                                LEFT JOIN niveles_puesto ON niveles_puesto.id = puestos.id_nivel_puesto 
                                                where app.id_evaluado=$id_evaluado and app.id_evaluacion = $Evaluacion";
                        $resultado2 = $conexion -> query($sql1);

                        $sql2="select emp.id, emp.nombre,emp.apellidos from aplicaciones app 
                                               left join empleados emp on app.id_evaluado=emp.id where app.id_evaluado= $id_evaluado 
                                               and app.id_evaluacion = $Evaluacion
                                               GROUP BY emp.nombre,emp.apellidos";

                        $resultado3 = $conexion -> query($sql2);
                        $row3 = mysqli_fetch_array($resultado3, MYSQLI_ASSOC);
                        $nombre_evaluado=$row3['nombre'];
                        $apellido_evaluado=$row3['apellidos'];
                        $id_eliminar=$row3['id'];
                        ?>
                        <input type="hidden" name="id_eliminar" value="<?php echo $id_eliminar?>">
                        <input type="hidden" name="id_evaluacion" value="<?php echo $Evaluacion?>">
                        <input type="hidden" name="id_departamento" value="<?php echo $Depa?>">
                        <input type="hidden" name="id_nombre" value="<?php echo $Nombre?>">
                        <button title="Eliminar registro"  type="button" onclick="eliminar(<?php echo $id_eliminar?>, <?php echo $Evaluacion?>, <?php echo $Depa?>, '<?php echo $Nombre?>')" class="btn btn-xs btn-light" ">
                        <i class="fa fa-trash" ></i>
                        </button>
                        <?php echo " ".$nombre_evaluado." ".$apellido_evaluado ?>
                        <?php  ?>
                        <ul class="list-group">
                            <?php
                            while($row2 = $resultado2 -> fetch_assoc()) {
                                $nombre=$row2['nombre'];
                                $apellido=$row2['apellidos'];
                                $puesto=$row2['puesto'];
                                $npuesto=$row2['nivel_puesto'];
                                ?>

                                <li class="list-group-item"><?php echo $nombre." ".$apellido." ($puesto, $npuesto)"?></li>

                                <?php
                            }
                            echo "</ul><br>";
                            }
                            } else {
                                ?>
                                <h2>No hay registros</h2>
                                <?php
                            }
                            ?>
                    </form>
                    <p>Progreso:</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 18%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">18%</div>
                    </div>
                    <br>
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