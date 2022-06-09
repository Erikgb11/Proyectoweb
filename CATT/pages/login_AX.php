<?php 
    session_start();
    include("./configBD.php");
    $boleta = $_POST["boleta"];
    $pass = md5($_POST["pass"]);

    if(substr($boleta, 0, 1) == "2" ){
        $sqlCheckUsuario = "SELECT * FROM alumno WHERE boleta = '$boleta' AND contrasena = '$pass'";
        $resCheckUsuario = mysqli_query($conexion,$sqlCheckUsuario);
        $infUsuario = mysqli_fetch_row($resCheckUsuario);
        $respAX["cod"] = 1;
    }

    if(substr($boleta, 0, 1) == "S" ){
        $sqlCheckUsuario = "SELECT * FROM profesor WHERE id_prof = '$boleta' AND contrasena = '$pass'";
        $resCheckUsuario = mysqli_query($conexion,$sqlCheckUsuario);
        $infUsuario = mysqli_fetch_row($resCheckUsuario);
        if($infUsuario[8]=="1"){//administrador
            $respAX["cod"] = 2;
        }else{
            $respAX["cod"] = 3;
        }
    }

    if(mysqli_num_rows($resCheckUsuario) == 1){
        $respAX["msj"] = "<h5>Bienvenido $infUsuario[1]</h5>";
        $_SESSION["boleta"] = $boleta;
    }
    else{
        $respAX["cod"] = 0;
        $respAX["msj"] = "<h5>Error. Verificar los datos proporcionados</h5>";
    }

    echo json_encode($respAX);
?>
