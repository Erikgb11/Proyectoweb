<?php
$archivo = $_FILES["archivo"];
$resultado = move_uploaded_file($archivo["tmp_name"],'../formatos/protocolos/'.  $archivo["name"]);
?>