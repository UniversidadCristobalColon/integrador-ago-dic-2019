<?php
require '../../../../config/db.php';
if(count($_POST)==3){
   $pregunta = $conexion->real_escape_string($_POST["pregunta"]);
   $orden = $conexion->real_escape_string($_POST["orden"]);
   $tipo = $conexion->real_escape_string($_POST["tipo"]);
   $msg = "";
   if(strlen(trim($pregunta))<5){
       $msg = "Escriba una pregunta valida";
   }
   else{
       $idcuestionario = 1;
       $idcompetencia = 1;
       $creacion = date("Y-m-d H:i:s");
       $sql = "insert into preguntas(pregunta,orden,tipo,id_cuestionario,id_competencia,creacion) values (?,?,?,?,?,?)";
       $stmt = $conexion->prepare($sql);
       $stmt->bind_param("sisiis",$pregunta,$orden,$tipo,$idcuestionario,$idcompetencia,$creacion);
       $stmt->execute();
       $msg = 's';
   }
   echo $msg;

}

?>