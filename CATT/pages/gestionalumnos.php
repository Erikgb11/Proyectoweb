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
    $sql = "SELECT * from alumno";
    $result = mysqli_query($conexion,$sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Gestionar Alumnos</title>
   
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
            <h1 class="h1 text-center pb-4 pt-5 font-weight-bold">Gestionar Información de Alumnos</h1>
            
            <?php
                    while ($mostrar=mysqli_fetch_array($result)){
                ?>
                <h1 class="h1 text-center pb-4 pt-5 font-weight-bold"><?php echo $mostrar['nombre'] ?></h1><!-- aqui se pone el nombre del tt -->
        <form action="actualizaralumno.php" method="post">
            <h2>Boleta</h2>
            <div class="input_field">
            <input type = "text" value = "<?php echo $mostrar['boleta'];?>" name="boleta">
          </div>
          <br>
          <h2>Nombre</h2>
          <div class="input_field">
            <input type = "text" value = "<?php echo $mostrar['nombre'];?>" name="nombre">
          </div>
          <br>
          <h2>Apellidos</h2>
          <div class="input_field">
          <input type = "text" value = "<?php echo $mostrar['apellidos'];?>" name="apellidos">
          </div>
          <br>
          <h2>Correo</h2>
          <div class="input_field">
          <input type = "text" value = "<?php echo $mostrar['correo'];?>" name="correo">
          </div>
          <br>
          <h2>Telefono</h2>
          <div class="input_field">
          <input type = "text" value = "<?php echo $mostrar['telefono'];?>" name="telefono">
          </div>
          <br>
          <h2>Auditoria</h2>
          <div class="input_field">
          <input type = "date" name="auditoria">
          <br>
          <h2>Plan de Estudios</h2>
                    <select name="carrera" id="carrera">
                        <option value="<?php echo $mostrar['carrera'];?>">--Seleccionar--</option>
                        <option value="ISC">Ing. en Sistemas Computacionales</option>
                        <option value="IIA">Ing. en Inteligencia Artificial</option>
                        <option value="LCD">Lic. en Ciencia de Datos</option>
                    </select>
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