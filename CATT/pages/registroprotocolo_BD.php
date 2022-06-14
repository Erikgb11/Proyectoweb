<?php
include("./configBD.php");
$boleta = $_SESSION["boleta"];

$sqlCheckProtocolo = "SELECT * FROM equipo WHERE boleta='$boleta'";
$resCheckProtocolo = mysqli_query($conexion,$sqlCheckProtocolo);
$RegProtocolo = 0;

if(mysqli_num_rows($resCheckProtocolo)==1){
    $RegProtocolo = 1;
}
?>