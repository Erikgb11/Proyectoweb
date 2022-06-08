<?php 
    session_start();
    include("./configBD.php");
    $boleta = $_POST["boleta"];
    $pass = md5($_POST["pass"]);

    $sqlCheckAlmn = "SELECT * FROM alumno WHERE boleta = '$boleta' AND contrasena = '$pass'";
    $resCheckAlmn = mysqli_query($conexion,$sqlCheckAlmn);
    if(mysqli_num_rows($resCheckAlmn) == 1){
        $infAlmn = mysqli_fetch_row($resCheckAlmn);
        $respAX["cod"] = 1;
        $respAX["msj"] = "<h5>Bienvenido $infAlmn[0]</h5>";
        $_SESSION["boleta"] = $boleta;
    }else{
        $respAX["cod"] = 0;
        $respAX["msj"] = "<h5>Error. Verificar los datos proporcionados</h5>";
    }

    echo json_encode($respAX);
?>