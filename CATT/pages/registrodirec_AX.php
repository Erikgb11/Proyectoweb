<?php 
    include("./configBD.php");

    $boleta = $_POST["boleta"];
    $email = $_POST["email"];
    $pass2 = md5($_POST["pass2"]);
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $tel = $_POST["tel"];
    
    $respAX = [];

    $sqlCheckBoleta = "SELECT * FROM profesor WHERE id_prof='$boleta'";
    $resCheckBoleta = mysqli_query($conexion, $sqlCheckBoleta);
    if(mysqli_num_rows($resCheckBoleta)==1){
        $respAX["cod"] = 2;
        $respAX["msj"] = "Error. Director ya registrado";
        //echo "ERROR. Correo registrado, favor de verificar";
    }else{
        $sqlInsProfesor="INSERT INTO profesor VALUE('$boleta','$nombre','$apellido','$email','$tel','$pass2','1',NOW(),'2')";
        $resInsProfesor = mysqli_query($conexion, $sqlInsProfesor);
        if(mysqli_affected_rows($conexion)==1){
            //echo "GRACIAS. Datos registrados correctamente";
            $respAX["cod"] = 1;
            $respAX["msj"] = "<h5>Datos registrados correctamente</h5>";
        }else{
            //echo "ERROR. Favor de intentarlo nuevamente";
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5>ERROR. Favor de intentarlo nuevamente</h5>";
        }
    }   

    echo json_encode($respAX);
?>