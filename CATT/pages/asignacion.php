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

    if (isset ($_POST['id']))
    {
        if (isset ($_POST ['id_tt']))
        {
            
            $id_prof=$_POST['id'];
            $id_tt=$_POST['id_tt'];
            echo $id_prof;
            echo $id_tt;
            mysqli_query($conexion, "INSERT INTO sinodal (id_sinodal, id_TT, id_prof) VALUE (NULL, '$id_tt', '$id_prof')");
            header("location:./asignacionsinodales.PHP");
        }
    }

?>