<?php 
    session_start();
    if(!isset($_SESSION["boleta"])){
        header("location:./../login.html");
    }else{
        include("./inicio_alumno_BD.php");
        include("./registroprotocolo_BD.php");

        //Verificando que sea alumno
        if($infGetNombre[7]!= 3){
            header("location:./../index.html");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Protocolo</title>

    <!--Validetta-->
    <link rel="stylesheet" href="./../js/validetta/dist/validetta.css">

     <!--CSS-->
     <link rel="stylesheet" href="./../css/bootstrap/bootstrap.min.css">
     <link rel="stylesheet" href="./../css/index.css">
     <link rel="stylesheet" href="./../css/edicionprotocol.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!--Font Awesome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
     integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!--Validetta-->
    <link rel="stylesheet" href="./../js/validetta/dist/validetta.css">

</head>
<body>

<?php
      if(isset($_POST["btnUpdateResumen"])){
        $EditResumen = $_POST["resumenprot"];
        $sqlEditProt="UPDATE tt SET resumen='$EditResumen' WHERE id_TT='$boleta'";
        $resEditProt = mysqli_query($conexion, $sqlEditProt);
    ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>Resumen modificado</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
      }else if(isset($_POST["btnUpdateTitulo"])){
                $EditTitulo = $_POST["tituloprot"];
                $sqlEditTitu="UPDATE tt SET titulo='$EditTitulo' WHERE id_TT='$boleta'";
                $resEditTitu = mysqli_query($conexion, $sqlEditTitu);
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>Título modificado</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

        }
    ?>

    <nav class="navbar navbar-expand-sm bg-light sticky-top index b-bt-color">
        <div class="container-fluid d-flex">
           <a href="#" class="navbar-brand font-weight-bold">CATT</a> 

            <!--Menu collapse-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon">  <i class="fas fa-bars" id="btn_user"></i></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent"> 
                <ul class="navbar-nav">
                    <li class="nav-item user">
                        <a class="nav-link text-dark grey-bold" href="./inicio_alumno.php"> <i class="fa-solid fa-user"></i>
                        <?php echo $infGetNombre="$infGetNombre[1]"?>
                        </a>
                    </li>

                    <li class="nav-item user">
                        <a class="nav-link text-dark grey-bold" href="./cerrarSesion.php?sesion=boleta"> Cerrar Sesión</a>
                    </li>
                </ul> 
            </div>
        </div>
    </nav>

    <?php
      if($RegProtocolo!=0){
    ?>
    <div class="container mt-5">
        <h1 class="mb-5 font-weight-bold">Información de tu Protocolo</h1>
        <div class="mb-3 mt-3">
            <form  id="formTitulo" name="formTitulo" class="d-flex" action="./edicionprotocolo.php" method="POST">
                <input name="tituloprot" id="titulo" data-validetta="required" placeholder="Titulo" disabled />
                <div class="botones">
                    <a class="btn btn-outline-primary cambiarTitulo">Modificar</a>
                    <button type="submit" name="btnUpdateTitulo" id="btnUpdateTitulo" class="btn btn-outline-success updateTitulo" disabled>Actualizar</button>
                </div>                      
            </form>
        </div>
    
        <div class="mb-3 mt-3">
            <form id="formResumen" name="formResumen" class="d-flex" action="./edicionprotocolo.php" method="POST">
                <input name="resumenprot" id="resumen" data-validetta="required" placeholder="Resumen" disabled />
                <div class="botones">
                    <a class="btn btn-outline-primary cambiarResumen">Modificar</a>
                    <button type="submit" name="btnUpdateResumen" id="btnUpdateResumen" class="btn btn-outline-success updateResumen" disabled>Actualizar</button>
                </div>                      
            </form>
        </div>
    </div>
    <?php
            }
            else{
      ?>
        <div class="container mt-5">
            <h1 class="mb-5 font-weight-bold">Información de tu Protocolo</h1>
            <div class="mb-3 mt-3">
            <h4 class="mb-5 font-weight-bold">Aun no registras tu Protocolo</h4>
            </div>
        </div>
    <?php
            }
      ?>

      <!--JavaScript-->
    <script src="./../js/jquery/jquery-3.6.0.min.js"></script>
    <script src="./../js/bootstrap/popper.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="./../js/validetta/dist/validetta.min.js"></script>
    <script src="./../js/validetta/localization/validettaLang-es-ES.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./../js/edicionprotocol.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>
<?php 
}
?>