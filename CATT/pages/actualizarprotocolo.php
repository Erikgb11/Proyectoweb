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

    $id_tt = $_POST['id_TT'];
    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];

    echo $id_tt;
    echo $titulo;
    echo $resumen;

    mysqli_query($conexion, "UPDATE tt SET id_tt = '$id_tt', titulo = '$titulo', resumen = '$resumen' where id_tt = '$id_tt'");
    header("location:./gestionprotocolos.php");
?>