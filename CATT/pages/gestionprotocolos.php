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
    $sql = "SELECT * from tt";
    $result = mysqli_query($conexion,$sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Gestionar Información de Protocolos</title>
   
    <!--CSS-->
    <link rel="stylesheet" href="./../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/paratables.css">

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
                        <a href="./index.html" class="nav-link text-dark">Inicio</a>
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
                        <a href="" class="nav-link text-dark">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Indo-->
    <div class="info d-flex">
        <div class="container">
            <h1 class="h1 text-center pb-4 pt-5 font-weight-bold">Gestionar Información de Protocolos</h1>
            
            <?php
                    while ($mostrar=mysqli_fetch_array($result)){
                ?>
                <h1 class="h1 text-center pb-4 pt-5 font-weight-bold"><?php echo $mostrar['titulo'] ?></h1><!-- aqui se pone el nombre del tt -->
        <form action="actualizarprotocolo.php" method="post">
            <h2>Número</h2>
            <div class="input_field">
            <input type = "text" value = "<?php echo $mostrar['id_TT'];?>" name="id_TT">
          </div>
          <br>
          <h2>Nombre</h2>
          <div class="input_field">
            <input type = "text" value = "<?php echo $mostrar['titulo'];?>" name="titulo">
          </div>
          <br>
          <h2>Resumen</h2>
          <div class="input_field">
          <input type = "text" value = "<?php echo $mostrar['resumen'];?>" name="resumen">
          </div>
          <br>
          <br>
          <input class="button" type="submit" value="Actualizar"/>
        </form>
            <?php
                    }
                ?>
            </tr>
            <br>
            <br>
        </div>
    </div> 

  

    <!--JavaScript-->
    <script src="./../js/jquery/jquery-3.6.0.min.js"></script>
    <script src="./../js/bootstrap/popper.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.bundle.js"></script>
    
</body>
</html>