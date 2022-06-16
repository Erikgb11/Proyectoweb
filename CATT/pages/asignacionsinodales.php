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
   
    <title>Asignar Sinodales</title>
   
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
            <h1 class="h1 text-center pb-4 pt-5 font-weight-bold">Asignacion de sinodales para el TT:</h1>
            
            <?php
                    while ($mostrar=mysqli_fetch_array($result)){
                ?>
                <h1 class="h1 text-center pb-4 pt-5 font-weight-bold"><?php echo $mostrar['titulo'] ?></h1><!-- aqui se pone el nombre del tt -->
            <table class="table">
                <thead class="thead-dark">
                    <tr><!-- ejemplo de como quedarian las cosas que se muestran -->
                    <th>No.</th>
                    <th>Nombre del protocolo</th>
                    <th>Resumen</th>
                    <th>Boletas Participantes</th>
                    <th>Nombres</th>
                    <th>Telefonos</th>
                    <th>Correos</th>
                    <th>Sinodales</th>
                    <th>Director</th>
                    </tr>
                </thead>
                <tr>
                <td><?php echo $mostrar['id_TT']; 
                $idtt = $mostrar['id_TT'];?></td>
                <td><?php echo $mostrar['titulo'] ?></td>
                <td><?php echo $mostrar['resumen'] ?></td>
                <td>
                <?php 
                $sql2 = "SELECT * from equipo where id_TT = $idtt";
                $result2 = mysqli_query($conexion,$sql2);
                while ($mostrar2=mysqli_fetch_array($result2))
                {
                    echo $mostrar2['boleta'];
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                }
                ?></td>
                
                    <td><?php 
                $sql2 = "SELECT * from equipo where id_TT = $idtt";
                $result2 = mysqli_query($conexion,$sql2);
                while ($mostrar2=mysqli_fetch_array($result2))
                {
                    $boleta = $mostrar2['boleta'];
                    $sql3 = "SELECT * from alumno where boleta = $boleta";
                    $result3 = mysqli_query($conexion,$sql3);
                    while ($mostrar3=mysqli_fetch_array($result3))
                    {
                        echo $mostrar3['nombre'];
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    }
                }
                ?></td>
                
                    <td><?php 
                $sql2 = "SELECT * from equipo where id_TT = $idtt";
                $result2 = mysqli_query($conexion,$sql2);
                while ($mostrar2=mysqli_fetch_array($result2))
                {
                    $boleta = $mostrar2['boleta'];
                    $sql3 = "SELECT * from alumno where boleta = $boleta";
                    $result3 = mysqli_query($conexion,$sql3);
                    while ($mostrar3=mysqli_fetch_array($result3))
                    {
                        echo $mostrar3['telefono'];
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    }
                }
                ?></td>
                
                    <td><?php 
                $sql2 = "SELECT * from equipo where id_TT = $idtt";
                $result2 = mysqli_query($conexion,$sql2);
                while ($mostrar2=mysqli_fetch_array($result2))
                {
                    $boleta = $mostrar2['boleta'];
                    $sql3 = "SELECT * from alumno where boleta = $boleta";
                    $result3 = mysqli_query($conexion,$sql3);
                    while ($mostrar3=mysqli_fetch_array($result3))
                    {
                        echo $mostrar3['correo'];
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    }
                }
                ?></td>
                
                <td><?php 
                $sql2 = "SELECT * from sinodal where id_TT = $idtt";
                $result2 = mysqli_query($conexion,$sql2);
                while ($mostrar2=mysqli_fetch_array($result2))
                {
                    $boleta = $mostrar2['id_prof'];
                    $sql3 = "SELECT * from profesor where id_prof = $boleta";
                    $result3 = mysqli_query($conexion,$sql3);
                    while ($mostrar3=mysqli_fetch_array($result3))
                    {
                        echo $mostrar3['nombre'];
                        echo " ";
                        echo $mostrar3['apellido'];
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    }
                }
                ?></td>
                <td><?php 
                $sql2 = "SELECT * from director where id_TT = $idtt";
                $result2 = mysqli_query($conexion,$sql2);
                while ($mostrar2=mysqli_fetch_array($result2))
                {
                    $boleta = $mostrar2['id_prof'];
                    $sql3 = "SELECT * from profesor where id_prof = $boleta";
                    $result3 = mysqli_query($conexion,$sql3);
                    while ($mostrar3=mysqli_fetch_array($result3))
                    {
                        echo $mostrar3['nombre'];
                        echo " ";
                        echo $mostrar3['apellido'];
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    }
                }
                ?></td>
            </table>
            <form action="asignacion.php" method="post">
            <select name="id" id="sinodales" data-validetta="required">
                <option value="">--Seleccionar Sinodal--</option>
                <?php
                    $sqlprof = "SELECT * from profesor";
                    $resultprof = mysqli_query($conexion,$sqlprof);
                    while ($mostrarprof=mysqli_fetch_array($resultprof)){
                ?>
                        <option value= <?php echo $mostrarprof['id_prof'] ?>
                        ><?php echo $mostrarprof['id_prof'];
                        echo " - ";
                        echo $mostrarprof['nombre'];
                        echo " ";
                        echo $mostrarprof['apellido'];
                        echo "<br>"; ?></option>
                <?php
                    }
                ?>
                    </select>
                    <select name="id_tt" id="TT">
                        <option value=<?php echo $idtt ?>><?php echo $idtt ?></option>
                    </select>
                    <button type="submit" class="btn btn-primary w-20">Asignar Sinodal</button>
                </form>
            <?php
                    }
                ?>
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