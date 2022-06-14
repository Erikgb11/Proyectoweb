<?php 
    include("./configBD.php");

    $Apepa = $_POST["Apepa"];
    $Apema = $_POST["Apema"];
    $nombre = $_POST["nombre"];
    $tel = $_POST["tel"];
    $boleta = $_POST["boleta"];
    $correo = $_POST["correo"];
    $carrera = $_POST["carrera"];
    $pass2 = md5($_POST["pass2"]);
    
    $respAX = [];

    $sqlCheckBoleta = "SELECT * FROM alumno WHERE boleta='$boleta'";
    $resCheckBoleta = mysqli_query($conexion, $sqlCheckBoleta);
    if(mysqli_num_rows($resCheckBoleta)==1){
        $respAX["cod"] = 2;
        $respAX["msj"] = "Error. Alumno ya registrado";
        //echo "ERROR. Correo registrado, favor de verificar";
    }else{
        $sqlInsAlumno="INSERT INTO alumno VALUE('$boleta','$nombre','$Apepa $Apema','$correo','$tel','$pass2',NOW(),'3','$carrera')";
        $resInsAlumno = mysqli_query($conexion, $sqlInsAlumno);
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