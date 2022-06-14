<?php 
    session_start();
    include("./configBD.php");
    include("./inicio_alumno_BD.php");
    $nalumnos = $_POST["nalumnos"];
    $Tprotocolo = $_POST["namep"];
    $Rprotocolo = $_POST["resp"];
    $boletaprof = $_POST["named"];
    
    if($nalumnos==2){
        $email1 = $_POST["email1"];$name1 = $_POST["name1"];$bolAlu1 = $_POST["bolAlu1"];$ape1 = $_POST["ape1"];$phone1 = $_POST["phone1"];
    }
    if($nalumnos==3){
        $email1 = $_POST["email1"];$name1 = $_POST["name1"];$bolAlu1 = $_POST["bolAlu1"];$ape1 = $_POST["ape1"];$phone1 = $_POST["phone1"];
        $email2 = $_POST["email2"];$name2 = $_POST["name2"];$bolAlu2 = $_POST["bolAlu2"];$ape2 = $_POST["ape2"];$phone2 = $_POST["phone2"];
    }
    if($nalumnos==4){
        $email1 = $_POST["email1"];$name1 = $_POST["name1"];$bolAlu1 = $_POST["bolAlu1"];$ape1 = $_POST["ape1"];$phone1 = $_POST["phone1"];
        $email2 = $_POST["email2"];$name2 = $_POST["name2"];$bolAlu2 = $_POST["bolAlu2"];$ape2 = $_POST["ape2"];$phone2 = $_POST["phone2"];
        $email3 = $_POST["email3"];$name3 = $_POST["name3"];$bolAlu3 = $_POST["bolAlu3"];$ape3 = $_POST["ape3"];$phone3 = $_POST["phone3"];
    }

    $respAX = [];

    $sqlCheckBoletaprof = "SELECT * FROM profesor WHERE id_prof='$boletaprof'";
    $resCheckBoletaprof = mysqli_query($conexion, $sqlCheckBoletaprof);
    //Verificando si el director esta registrado
    if(mysqli_num_rows($resCheckBoletaprof)==0){
        $respAX["cod"] = 2;
        $respAX["msj"] = "<h5>ERROR. La boleta del profesor no es valida</h5>";
    }

    //Registro de protocolo con 1 alumno
    else if($nalumnos==1){
        $sqlInstt="INSERT INTO tt VALUE('$boleta','$Tprotocolo','$Rprotocolo','')";
        $resInstt = mysqli_query($conexion, $sqlInstt);
        $sqlInsequipo="INSERT INTO equipo VALUE('','$boleta','$boleta')";
        $resInsequipo = mysqli_query($conexion, $sqlInsequipo);
        $sqlInsdirec="INSERT INTO director VALUE('','$boleta','$boletaprof')";
        $resInsdirec = mysqli_query($conexion, $sqlInsdirec);
        if(mysqli_affected_rows($conexion)==1){
            $respAX["cod"] = 1;
            $respAX["msj"] = "<h5>GRACIAS. Protocolo registrado correctamente</h5>";
        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5>ERROR. Favor de intentarlo nuevamente</h5>";
        }
    }

    //Registro de protocolo con 2 alumnos
    else if($nalumnos==2){
        //Verificando que el alumno no este en otro TT
        $sqlCheckBoletaAlu1 = "SELECT * FROM alumno WHERE boleta='$bolAlu1'";
        $resCheckBoletaAlu1 = mysqli_query($conexion, $sqlCheckBoletaAlu1);
        if(mysqli_num_rows($resCheckBoletaAlu1)==1){
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5>Lo siento. El alumno $bolAlu1 ya esta participando en otro TT</h5>";
        }else{
                $sqlInstt="INSERT INTO tt VALUE('$boleta','$Tprotocolo','$Rprotocolo','')";
                $resInstt = mysqli_query($conexion, $sqlInstt);
                $sqlInsAlu1="INSERT INTO alumno VALUE('$bolAlu1','$name1','$ape1','$email1','$phone1',NULL,NOW(),'3','$infGetNombre[8]')";
                $resInsAlu1 = mysqli_query($conexion, $sqlInsAlu1);
                $sqlInsdirec="INSERT INTO director VALUE('','$boleta','$boletaprof')";
                $resInsdirec = mysqli_query($conexion, $sqlInsdirec);
                $sqlInsequipo="INSERT INTO equipo VALUE('','$boleta','$boleta')";
                $resInsequipo = mysqli_query($conexion, $sqlInsequipo);
                $sqlInsequipo="INSERT INTO equipo VALUE('','$boleta','$bolAlu1')";
                $resInsequipo = mysqli_query($conexion, $sqlInsequipo);
            if(mysqli_affected_rows($conexion)==1){
                $respAX["cod"] = 1;
                $respAX["msj"] = "<h5>GRACIAS. Protocolo registrado correctamente</h5>";
            }else{
                $respAX["cod"] = 0;
                $respAX["msj"] = "<h5>ERROR. Favor de intentarlo nuevamente</h5>";
            }
        }
    }

    //Registro de protocolo con 3 alumnos
    else if($nalumnos==3){
        //Verificando que los alumnos no esten participando en otro TT
        $sqlCheckBoletaAlu2 = "SELECT * FROM alumno WHERE boleta='$bolAlu2'";
        $resCheckBoletaAlu2 = mysqli_query($conexion, $sqlCheckBoletaAlu2);
        $sqlCheckBoletaAlu1 = "SELECT * FROM alumno WHERE boleta='$bolAlu1'";
        $resCheckBoletaAlu1 = mysqli_query($conexion, $sqlCheckBoletaAlu1);
        if(mysqli_num_rows($resCheckBoletaAlu1)==1){
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5>Lo siento. El alumno $bolAlu1 ya esta participando en otro TT</h5>";
        }
        if(mysqli_num_rows($resCheckBoletaAlu2)==1){
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5>Lo siento. El alumno $bolAlu2 ya esta participando en otro TT</h5>";
        }
        if(mysqli_num_rows($resCheckBoletaAlu1)!=1 && mysqli_num_rows($resCheckBoletaAlu2)!=1){
            $sqlInstt="INSERT INTO tt VALUE('$boleta','$Tprotocolo','$Rprotocolo','')";
            $resInstt = mysqli_query($conexion, $sqlInstt);
            $sqlInsAlu1="INSERT INTO alumno VALUE('$bolAlu1','$name1','$ape1','$email1','$phone1',NULL,NOW(),'3','$infGetNombre[8]')";
            $resInsAlu1 = mysqli_query($conexion, $sqlInsAlu1);
            $sqlInsAlu2="INSERT INTO alumno VALUE('$bolAlu2','$name2','$ape2','$email2','$phone2',NULL,NOW(),'3','$infGetNombre[8]')";
            $resInsAlu2 = mysqli_query($conexion, $sqlInsAlu2);
            $sqlInsdirec="INSERT INTO director VALUE('','$boleta','$boletaprof')";
            $resInsdirec = mysqli_query($conexion, $sqlInsdirec);
            $sqlInsequipo="INSERT INTO equipo VALUE('','$boleta','$boleta')";
            $resInsequipo = mysqli_query($conexion, $sqlInsequipo);
            $sqlInsequipo="INSERT INTO equipo VALUE('','$boleta','$bolAlu1')";
            $resInsequipo = mysqli_query($conexion, $sqlInsequipo);
            $sqlInsequipo="INSERT INTO equipo VALUE('','$boleta','$bolAlu2')";
            $resInsequipo = mysqli_query($conexion, $sqlInsequipo);
            if(mysqli_affected_rows($conexion)==1){
                $respAX["cod"] = 1;
                $respAX["msj"] = "<h5>GRACIAS. Protocolo registrado correctamente</h5>";
            }else{
                $respAX["cod"] = 0;
                $respAX["msj"] = "<h5>ERROR. Favor de intentarlo nuevamente</h5>";
            }
        }
    }
    //Registro de protocolo con 4 alumnos
    else if($nalumnos==4){
        //Verificando que los alumnos no esten participando en otro TT
        $sqlCheckBoletaAlu3 = "SELECT * FROM alumno WHERE boleta='$bolAlu3'";
        $resCheckBoletaAlu3 = mysqli_query($conexion, $sqlCheckBoletaAlu3);
        $sqlCheckBoletaAlu2 = "SELECT * FROM alumno WHERE boleta='$bolAlu2'";
        $resCheckBoletaAlu2 = mysqli_query($conexion, $sqlCheckBoletaAlu2);
        $sqlCheckBoletaAlu1 = "SELECT * FROM alumno WHERE boleta='$bolAlu1'";
        $resCheckBoletaAlu1 = mysqli_query($conexion, $sqlCheckBoletaAlu1);
        if(mysqli_num_rows($resCheckBoletaAlu1)==1){
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5>Lo siento. El alumno $bolAlu1 ya esta participando en otro TT</h5>";
        }
        if(mysqli_num_rows($resCheckBoletaAlu2)==1){
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5>Lo siento. El alumno $bolAlu2 ya esta participando en otro TT</h5>";
        }
        if(mysqli_num_rows($resCheckBoletaAlu3)==1){
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5>Lo siento. El alumno $bolAlu3 ya esta participando en otro TT</h5>";
        }

        if(mysqli_num_rows($resCheckBoletaAlu1)!=1 && mysqli_num_rows($resCheckBoletaAlu2)!=1 && mysqli_num_rows($resCheckBoletaAlu3)!=1){
            $sqlInstt="INSERT INTO tt VALUE('$boleta','$Tprotocolo','$Rprotocolo','')";
            $resInstt = mysqli_query($conexion, $sqlInstt);
            $sqlInsAlu1="INSERT INTO alumno VALUE('$bolAlu1','$name1','$ape1','$email1','$phone1',NULL,NOW(),'3','$infGetNombre[8]')";
            $resInsAlu1 = mysqli_query($conexion, $sqlInsAlu1);
            $sqlInsAlu2="INSERT INTO alumno VALUE('$bolAlu2','$name2','$ape2','$email2','$phone2',NULL,NOW(),'3','$infGetNombre[8]')";
            $resInsAlu2 = mysqli_query($conexion, $sqlInsAlu2);
            $sqlInsAlu3="INSERT INTO alumno VALUE('$bolAlu3','$name3','$ape3','$email3','$phone3',NULL,NOW(),'3','$infGetNombre[8]')";
            $resInsAlu3 = mysqli_query($conexion, $sqlInsAlu3);
            $sqlInsdirec="INSERT INTO director VALUE('','$boleta','$boletaprof')";
            $resInsdirec = mysqli_query($conexion, $sqlInsdirec);
            $sqlInsequipo="INSERT INTO equipo VALUE('','$boleta','$boleta')";
            $resInsequipo = mysqli_query($conexion, $sqlInsequipo);
            $sqlInsequipo="INSERT INTO equipo VALUE('','$boleta','$bolAlu1')";
            $resInsequipo = mysqli_query($conexion, $sqlInsequipo);
            $sqlInsequipo="INSERT INTO equipo VALUE('','$boleta','$bolAlu2')";
            $resInsequipo = mysqli_query($conexion, $sqlInsequipo);
            $sqlInsequipo="INSERT INTO equipo VALUE('','$boleta','$bolAlu3')";
            $resInsequipo = mysqli_query($conexion, $sqlInsequipo);
            if(mysqli_affected_rows($conexion)==1){
                $respAX["cod"] = 1;
                $respAX["msj"] = "<h5>GRACIAS. Protocolo registrado correctamente</h5>";
            }else{
                $respAX["cod"] = 0;
                $respAX["msj"] = "<h5>ERROR. Favor de intentarlo nuevamente</h5>";
            }
        }


    }

    echo json_encode($respAX);
?>