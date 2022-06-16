<?php 
    session_start();
    if(!isset($_SESSION["boleta"])){
        header("location:./../login.html");
    }else{
        include("./inicio_profe_BD.php");
        if($infGetNombre[8] != 1){
            header("location:./../index.html");
        }
        
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Bienvenido</title>
   
    <!--CSS-->
    <link rel="stylesheet" href="./../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/index.css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


    <!--Header-->
    <nav class="navbar navbar-expand-sm bg-light sticky-top index b-bt-color">
        <div class="container-fluid d-flex">
           <a href="#" class="navbar-brand font-weight-bold">CATT</a> 

            <!--Menu collapse-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon">  <i class="fas fa-bars" id="btn_menu"></i></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent"> 
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="./../index.html" class="nav-link text-dark">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" role="button" data-bs-toggle="dropdown">Etapas</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Protocolo</a></li>
                            <li><a href="#" class="dropdown-item">Trabajo Terminal I</a></li>
                            <li><a href="#" class="dropdown-item">Trabajo Terminal II</a></li>
                        </ul>    
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-dark">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a href="./cerrarSesion.php?sesion=boleta" class="nav-link text-dark">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Indo-->
    <div class="info d-flex">
        <div class="container">
            <ul class="list-group">
                <li class="list-group-item">
                    <div id="slider" class="carousel slide tam-slider" data-bs-ride="carousel">
       
                        <!--Indicators-->
                        <div class="carousel-indicators ">
                            <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active indicadores btn "></button>
                            <button type="button" data-bs-target="#slider" data-bs-slide-to="1" class="indicadores ml-1 btn"></button>
                            <button type="button" data-bs-target="#slider" data-bs-slide-to="2" class="indicadores ml-1 btn"></button>
                            <button type="button" data-bs-target="#slider" data-bs-slide-to="3" class="indicadores ml-1 btn"></button>
                        </div>
                
                        <!--Elements-->
                        <div class="carousel-inner h-100 w-100">
                                <div class="carousel-item active h-100">
                                    <img src="./../imgs/miembros.jpg" alt="Propuestas" class="d-block w-100">
                                    <div class="carousel-caption ">
                                        <h5 class="">Miembros del Protocolo</h5>
                                        <p>Cada miembro del protocolo, TTI y TTII se debe inscribir de manera individual, solo uno es representante</p>
                                    </div>
                                </div>
                
                                <div class="carousel-item h-100" >
                                    <img src="./../imgs/sinodalcatt.jpg" alt="Consulta" class="d-block w-100">
                                    <div class="carousel-caption" >
                                        <h5 >Sinodales</h5>
                                        <p>Recuerda Asignar los Sinodales a los protocolos</p>
                                    </div>
                                </div>
                
                                <div class="carousel-item h-100">
                                        <img src="./../imgs/profeexter.jpg" alt="Discos" class="d-block w-100">
                                        <div class="carousel-caption">
                                            <h5>Acuse de Recibido</h5>
                                            <p>El equipo debe entregar el Acuse de Recibido de TT 5 días previos a su presentación</p>
                                        </div>
                                </div>
                                <div class="carousel-item h-100">
                                    <img src="./../imgs/gestion.jpg" alt="Discos" class="d-block w-100">
                                    <div class="carousel-caption">
                                        <h5>Gestión</h5>
                                        <p>Puedes gestionar información sobre protocolos, alumnos, docentes y su relación</p>
                                    </div>
                            </div>
                        </div>
               </li>
            </ul>
        </div>
        <div class=" container panel-lateral ">
            <div class="documents ">
                <h1 class="font-weight-bold">Bienvenid@ Administrador</h1><!-- aqui colocar el nombre del usuario -->
                <h1 class="font-weight-bold">¿Qué deseas hacer?</h1>
                <ul class="list-group">
                    <a href="./asignacionsinodales.php"class="list-group-item list-group-item-action">Asignar Sinodales</a></li>
                    <a href="./gestionprotocolos.php" class="list-group-item list-group-item-action">Gestionar Información de Protocolos</a></li>
                    <a href="./gestionalumnos.php" class="list-group-item list-group-item-action">Gestionar Información de Alumnos</a></li>
                </ul>
            </div>
        </div>
    </div>

  

    <!--JavaScript-->
    <script src="./../js/jquery/jquery-3.6.0.min.js"></script>
    <script src="./../js/bootstrap/popper.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.bundle.js"></script>
    
</body>
</html>

<?php 
}
?>