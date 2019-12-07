
<?php
require '../../../../config/db.php';
$decalogo = $_POST["decalogo"];
$sql = "select id,aseveracion from decalogos_aseveraciones where id_decalogo=?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i",$decalogo);
$stmt->execute();
$stmt->bind_result($aid,$asevera);
//echo"<option value=''></option>";
while($stmt->fetch()){
    echo"<option value='$aid'>$asevera </option>";
}
?>