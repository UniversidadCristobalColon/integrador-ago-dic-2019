<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';
$Actualizar = 0;
$Evaluacion = 0;
$Nombre = "";
$Departamento = "";
$Cuestionario = "";
$Periodo = "";
$Inicio = "";
$Fin = "";
$Limite = "";
function convertirFecha($fecha){
    $outs = explode('-',$fecha);
    return "$outs[1]/$outs[2]/$outs[0]";
}
if (!empty($_GET['id'])){
    $Actualizar = 1;
    $Evaluacion = $_GET['id'];
    $sql = "SELECT cuestionarios.id as id_cuestionario , departamentos.id as id_departamento, periodos.id as id_periodo, evaluaciones.inicio, evaluaciones.fin, evaluaciones.limite, evaluaciones.descripcion from evaluaciones
            LEFT JOIN cuestionarios ON cuestionarios.id = evaluaciones.id_cuestionario
            LEFT JOIN departamentos ON departamentos.id = evaluaciones.id_departamento
            LEFT JOIN periodos ON periodos.id = evaluaciones.id_periodo
            where evaluaciones.id = $Evaluacion";
    $resultado = mysqli_query($conexion,$sql);
    if($resultado){
        $fila = mysqli_fetch_assoc($resultado);
        //var_dump($fila);
        $Nombre = $fila['descripcion'];
        $Departamento = $fila['id_departamento'];
        $Cuestionario = $fila['id_cuestionario'];
        $Periodo = $fila['id_periodo'];
        $Inicio = convertirFecha($fila['inicio']);
        $Fin = convertirFecha($fila['fin']);
        $Limite = convertirFecha($fila['limite']);
    }
}
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
?>

<?php
$Iniciadas = 0;
    if($Actualizar==1){
        $total = 0;
        $Iniciadas = 0;
        $Correctas = 0;

        $sql = "select estado from aplicaciones where id_evaluacion = $Evaluacion";
        $res = mysqli_query($conexion,$sql);
        if($res){
            while($fila = mysqli_fetch_assoc($res)){
                $estado = $fila['estado'];

                if($estado == 'B' || $estado == 'C'){
                    $Iniciadas++;
                }
            }
        }
    }

    if($Iniciadas>0){
        $disable = "disabled";
    } else {
        $disable = "";
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
    <script src="../../../../vendor/moment/moment-with-locales.js"></script>
    <link rel="stylesheet" href="../../../../vendor/datepicker/css/bootstrap-datepicker.standalone.min.css">

    <script>
        function validar(){
            var descripcion = $('#Descripcion').val();
            var departamento = $('#Departamento').val();
            var cuestionario = $('#Cuestionario').val();
            var periodo = $('#Periodo').val();
            var inicio = $('#Inicio').val();
            var fin = $('#Fin').val();
            var limite = $('#Limite').val();
            if (descripcion == "") {
                alert("Escriba un nombre para la evaluación");
                return false;
            }
            if (departamento == "") {
                alert("Seleccione el departamento a evaluar");
                return false;
            }
            if (cuestionario == "") {
                alert("Seleccione el cuestionario de la evaluación");
                return false;
            }
            if (periodo == "") {
                alert("Seleccione el periodo de la evaluación");
                return false;
            }
            if (inicio == "") {
                alert("Seleccione el inicio de la evaluación");
                return false;
            }
            if (fin == "") {
                alert("Seleccione el fin de la evaluación");
                return false;
            }
            if (!moment(fin).isBefore(limite)){
                alert("La fecha de fin no puede ser mayor a la fecha de limite");
                return false;
            }
            if (!moment(inicio).isBefore(fin)){
                alert("La fecha de inicio no puede ser mayor a la fecha de fin");
                return false;
            }
            return true;
        }

        function calcularLimite(){
            var final = $('#Fin').val();
            return moment(final).add(7, 'd');
        }

        $(document).ready(function () {
            <?php
                if($Actualizar==1){
                    echo "";
                } else {
                    echo "$('#F-inicio').datepicker();";
                }
            ?>
        });

        $(document).ready(function () {
            <?php
            if($Actualizar==1){
                echo "";
            } else {
                echo "$('#F-fin').datepicker({
                onSelect: function() {
                }
            }).on(\"change\", function() {
                $('#Limite').val(moment(calcularLimite()).format(\"MM/DD/YYYY\"));
            });";
            }
            ?>
        });

        $(document).ready(function () {
            $('#F-limite').datepicker();
        });

    </script>
</head>

<body id="page-top">

<?php getNavbar() ?>

<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Page Content -->
            <form action="guardar.php" method="post" onsubmit="return validar()">
                <input type="hidden" name="actualizar" value="<?php echo $Actualizar?>">
                <input type="hidden" name="id_evaluacion" value="<?php echo $Evaluacion?>">
                <?php
                if ($Actualizar == 1){
                    echo "<h1>Actualizar evaluación</h1>";
                } else {
                    echo "<h1>Nueva evaluación</h1>";
                }
                ?>
                <hr>
                <div class="form-group">
                    <label for="Descripcion">Nombre de la evaluación</label>
                    <input class="form-control mb-3" type="text" id="Descripcion" name="Descripcion" <?php echo $disable ?> value="<?php echo $Nombre ?>">

                    <label for="Evaluar">Departamento</label>  <!-- Evaluado -->
                    <select class="form-control mb-3" id="Departamento" name="Departamento" <?php echo $disable ?>>
                        <option value="">Seleccione una opción</option>
                        <?php
                        $sql = "select * from departamentos";
                        $resultado = mysqli_query($conexion,$sql);
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                $selected = $fila['id'] == $Departamento ? 'selected="selected"' : '';
                                echo "<option $selected value = '$fila[id]'>$fila[departamento]</option>";
                            }
                        }
                        ?>
                    </select>

                    <label for="Cuestionario">Cuestionario</label>
                    <select class="form-control mb-3" id="Cuestionario" name="Cuestionario" <?php echo $disable ?>>
                        <option selected value="">Seleccione una opción</option>
                        <?php
                        $sql = "select * from cuestionarios";
                        $resultado = mysqli_query($conexion,$sql);
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                $selected = $fila['id'] == $Cuestionario ? 'selected="selected"' : '';
                                echo "<option $selected value = '$fila[id]'>$fila[cuestionario]</option>";
                            }
                        }
                        ?>
                    </select>

                    <label for="Periodo">Periodo</label>
                    <select class="form-control mb-3" id="Periodo" name="Periodo" <?php echo $disable ?>>
                        <option selected value="">Seleccione una opción</option>
                        <?php
                        $sql = "select * from periodos";
                        $resultado = mysqli_query($conexion,$sql);
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                $selected = $fila['id'] == $Periodo ? 'selected="selected"' : '';
                                echo "<option $selected value = '$fila[id]'>$fila[periodo]</option>";
                            }
                        }
                        ?>
                    </select>


                    <div class="input-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label>Inicia</label>
                                <div class="input-group date" id="F-inicio">
                                    <input type="text" class="form-control mb-3" name="Inicio" id="Inicio" readonly value="<?php echo $Inicio ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                            <div class="col">
                                <label>Termina</label>
                                <div class="input-group date" id="F-fin">
                                    <input type="text" class="form-control mb-3" name="Fin" id="Fin" readonly value="<?php echo $Fin ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                            <div class="col">
                                <label>Limite</label>
                                <div class="input-group date" id="F-limite">
                                    <input type="text" class="form-control mb-3" name="Limite" id="Limite" readonly value="<?php echo $Limite ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Continuar</button>
                </div>

            </form>


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
