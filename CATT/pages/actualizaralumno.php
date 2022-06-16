<?php 
    session_start();
    if(!isset($_SESSION["boleta"])){
        header("location:./../login.html");
    }else{
        include("./inicio_profe_BD.php");
        if($infGetNombre[8] != 1){
            header("location:./../index.html");
        }
    }

    $boleta = $_POST['boleta'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    if (isset ($_POST['auditoria']))
    {
        $auditoria = $_POST['auditoria'];
        if (isset ($_POST['carrera']))
        {
            $carrera = $_POST['carrera'];
            mysqli_query($conexion, "UPDATE alumno SET boleta = '$boleta', nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono', auditoria = '$auditoria', carrera = '$carrera' where boleta = '$boleta'");
            header("location:./gestionalumnos.php");
        }
        mysqli_query($conexion, "UPDATE alumno SET boleta = '$boleta', nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono', auditoria = '$auditoria' where boleta = '$boleta'");
        header("location:./gestionalumnos.php");
    }

    if (isset ($_POST['carrera']))
    {
        $carrera = $_POST['carrera'];
        if (isset ($_POST['auditoria']))
        {
            $auditoria = $_POST['auditoria'];
            mysqli_query($conexion, "UPDATE alumno SET boleta = '$boleta', nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono', auditoria = '$auditoria', carrera = '$carrera' where boleta = '$boleta'");
            header("location:./gestionalumnos.php");
        }
        mysqli_query($conexion, "UPDATE alumno SET boleta = '$boleta', nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono', carrera = '$carrera' where boleta = '$boleta'");
        header("location:./gestionalumnos.php");
    }

    mysqli_query($conexion, "UPDATE alumno SET boleta = '$boleta', nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono' where boleta = '$boleta'");
    header("location:./gestionalumnos.php");
?>