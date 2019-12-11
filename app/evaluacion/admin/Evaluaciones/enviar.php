<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';
require_once '../../../mailgun.php';

$Evaluacion = $_GET["id_evaluacion"];
$Evaluado   = $_GET["id_enviar"];

if(!empty($Evaluacion)) {
    $sql = "select distinct a.email, b.id, b.hash 
        from empleados a, aplicaciones b
        where a.id = b.id_evaluador
        and a.email is not null
        and b.id_evaluacion = $Evaluacion
        and b.estado in ('A', 'B')";

    $res = mysqli_query($conexion, $sql);
    if ($res) {
        while ($f = mysqli_fetch_assoc($res)) {
            $email          = $f["email"];
            $hash           = $f["hash"];
            $id_aplicacion  = $f["id"];

            if (!empty($email) && !empty($hash) && filter_var($email, FILTER_VALIDATE_EMAIL) !== true) {
                $qry = "select content, url from email_conf where id = 1";
                $r = mysqli_query($conexion, $qry);
                if($r){
                    $m = mysqli_fetch_assoc($r);
                    $mensaje    = $m["content"];
                    $url        = $m["url"];

                    if(!empty($mensaje) && !empty($url)) {
                        $url = $url . "app/evaluacion/cuestionario/index.php?id=$hash";

                        $mensaje = str_replace('{{url_encuesta}}', $url, $mensaje);

                        echo $mensaje;

                        //enviarCorreo2($email, '¡Participa en la evaluación!', '', '');


                        $update = "UPDATE aplicaciones set email_enviado = 'S'  where id = $id_aplicacion";
                        //$resultado = mysqli_query($conexion, $update);
                    }
                }
            }
        }

        exit;



        header("location: adminEvaluacion.php?id_evaluacion=$Evaluacion&enviados=1");
    }

}

?>
