<?php
require '../../../../config/db.php';
$id = $conexion->real_escape_string($_POST["id"]);
$pregunta = $conexion->real_escape_string($_POST["pregunta"]);
$sql = "select preguntas.tipo, (select decalogos.decalogo from decalogos where decalogos.id=preguntas.id_decalogo) as decalogo, (select decalogos_aseveraciones.aseveracion from decalogos_aseveraciones where decalogos_aseveraciones.id=preguntas.id_decalogo_aseveracion) as aseveracion from preguntas where preguntas.id=?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($tipo, $decalogo, $aseveracion);
$stmt->fetch();
$stmt->close();
if($tipo=='M'){
    $tipoC ="Opción Múltiple";
}else {
    $tipoC ="Abierta";
}

?>
<head>
<script type="text/javascript">
    $(document).ready(function() {
        $("#btn-editar").click(function(){
           var pregunta = $("#pregunta").val();
           var pid = <?=$id;?>;
            var ip = $("#ip").val();
           $.ajax({
               url: "editar_final.php",
               type: "POST",
               data: "id=" + pid + "&pregunta=" + pregunta + "&ip=" + ip,
               success:function(exito){
                   if(exito=='s'){
                       location.href="index.php";
                   }
               }
           });

        });

    });

</script>
</head>
<form method="post" class="form-horizontal" role="form">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Pregunta</h4>
                <button type="button" class="close" data-dismiss="modal" OnClick="location.href='index.php'">
                   <!-- <span aria-hidden="true">&times;</span>-->
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="editar_pregunta" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="item_name">Pregunta:</label>
                    <input type="text" class="form-control" id="pregunta" name="pregunta" value="<?php echo $pregunta; ?>" placeholder="Pregunta" required autofocus>
                    <label for="item_code">Decálogo:</label>
                    <input type="text" readonly class="form-control" id="decalogo" name="decalogo" value="<?php echo $decalogo; ?>" placeholder="Decálogo" required>
                    <label for="tipo">Tipo:</label>
                    <input type="text" readonly class="form-control" id="tipo" name="pregunta" value="<?php echo $tipoC; ?>" placeholder="Pregunta" required autofocus>

                    <label for="aseveracion">Aseveración:</label>
                    <input type="text" readonly class="form-control" id="asever" name="aseveracion" value="<?php echo $aseveracion; ?>" placeholder="Aseveracion" required>
                </div>
                <input type="hidden" id="ip" value="<?php echo getIP();?>"></input>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary mb-3" name="update" id="btn-editar">Editar</button>
                <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal"  OnClick="location.href='index.php'">Cancelar</button>
            </div>
        </div>
    </div>
</form>
<?php
function getIP(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>
