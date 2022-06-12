<?php
include("./configBD.php");
$boleta = $_SESSION["boleta"];
$sqlGetNombre = "SELECT * FROM profesor WHERE id_prof = '$boleta'";
$resGetNombre = mysqli_query($conexion, $sqlGetNombre);
$infGetNombre = mysqli_fetch_row($resGetNombre);
?>