<?php
$archivo = $_FILES["archivo"];
$resultado = move_uploaded_file($archivo["tmp_name"],'../formatos/Direc_CV/'.  $archivo["name"]);
?>