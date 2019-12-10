<?php
require_once '../config/db.php';

$codigo = substr($_POST["codigo"],0,7);
if(!empty($codigo)){
    $sql = "select * from aplicaciones where hash like '{$codigo}%' LIMIT 1";
    $res = mysqli_query($conexion, $sql);
    if($res){
        if(mysqli_num_rows($res)){
            $f = mysqli_fetch_assoc($res);

            if($f["estado"] == 'A' || $f["estado"] == 'B'){
                $hash = $f["hash"];

                header("location: evaluacion/cuestionario/index.php?id=$hash");
            }elseif($f["estado"] == 'C'){
                header("location: codigo.php?error=1");
            }
        }else{
            header("location: codigo.php?error=2");
        }
    }else{

    }
}else{
    header("location: codigo.php?error=3");
}
?>
