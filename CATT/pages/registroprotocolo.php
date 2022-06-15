<?php 
    session_start();
    if(!isset($_SESSION["boleta"])){
        header("location:./../login.html");
    }else{
        include("./inicio_alumno_BD.php");
        include("./registroprotocolo_BD.php");
        //Verifica que sea un alumno
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
    <!-- <meta http-equiv="refresh" content="10;./inicio_alumno.php"> -->

    <title>Registro de Protocolo</title>
   
    <!--CSS-->
    <link rel="stylesheet" href="./../js/validetta/dist/validetta.css">
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
                        <a href="./index.html" class="nav-link text-dark">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" role="button" data-bs-toggle="dropdown">Etapas</a>
                        <ul class="dropdown-menu">
                            <li><a href="./protocolo.html" class="dropdown-item">Protocolo</a></li>
                            <li><a href="./tt1.html" class="dropdown-item">Trabajo Terminal I</a></li>
                            <li><a href="./tt2.html" class="dropdown-item">Trabajo Terminal II</a></li>
                        </ul>    
                    </li>
                    <li class="nav-item">
                        <a href="./contactos.html" class="nav-link text-dark">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-dark">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
      <div class="info container h-100">
        <h1 class="h1 text-center pb-4 pt-5 font-weight-bold">Registro de Protocolo</h1>
        
<!-- Ejecutar formulario si el alumno aun no registra protocolo -->
    <?php
      if($RegProtocolo==0){
    ?>

    <!-- Tiempo asignado para el registro de protocolo -->
    <script>
      function r(){
        Swal.fire({
          title: 'TWEB 20222',
          text: "Lo siento. Se agotó tu tiempo de registro",
          icon: 'error',
          confirmButtonText: 'OK',
          footer:"ESCOM",
            didDestroy:()=>{
              window.location.href = "./inicio_alumno.php";
            }
        })
      }
      setTimeout("r()",10000);
    </script>

        <form class="text-center" id="formProt" enctype="multipart/form-data" method="post">
          <p>Ingrese el nombre del Protocolo</p>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
            <input type="text" name="namep" placeholder="Nombre Protocolo" data-validetta="required"/>
          </div>
          <p>Ingrese un breve resumen del protocolo</p>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
            <input type="text" name="resp" placeholder="Resumen Protocolo" data-validetta="required" />
          </div>
          <div class="select_arrow">
            <p>Ingrese pdf de su protocolo</p>
            <input type="file" name="Protocolo" id="Protocolo">
          </div>
          <p>Ingrese al director de Protocolo:</p>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
            <input type="text" name="named" placeholder="Boleta Director" data-validetta="required"/>
          </div>
          <!-- <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
            <input type="text" name="aped" placeholder="Apellidos Director" data-validetta="required" />
          </div>-->

          <script type="text/javascript">

            function mostraralumnos() {
                let unalumno = "<p>Datos primer alumno:</p><p>Ingrese su Email:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-envelope'></i></span><input type='email' name='email1' placeholder='Email' data-validetta='required'/></div><p>Ingrese su Nombre:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-user'></i></span><input type='text' name='name1' placeholder='Nombre(s)' data-validetta='required' /></div><div class='input_field'> <span><i aria-hidden='true' class='fa fa-user'></i></span><input type='text' name='ape1' placeholder='Apellidos' data-validetta='required'/></div><p>Ingrese su Telefono:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-phone'></i></span><input type='text' name='phone1' placeholder='Telefono' data-validetta='required' /></div><p>Ingrese su Boleta:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-address-card'></i></span><input type='text' name='bolAlu1' placeholder='Boleta' data-validetta='required,minLength[10],maxLength[10]' /></div>";
                let dosalumno=unalumno+"<p>Datos segundo alumno:</p><p>Ingrese su email:</p><div class='input_field'><span><i aria-hidden='true' class='fa fa-envelope'></i></span><input type='email' name='email2' placeholder='Email' data-validetta='required'/></div><p>Ingrese su Nombre:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-user'></i></span><input type='text' name='name2' placeholder='Nombre(s)' data-validetta='required' /></div><div class='input_field'> <span><i aria-hidden='true' class='fa fa-user'></i></span><input type='text' name='ape2' placeholder='Apellidos' data-validetta='required'/></div><p>Ingrese su Telefono:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-phone'></i></span><input type='text' name='phone2' placeholder='Telefono' data-validetta='required' /></div><p>Ingrese su Boleta:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-address-card'></i></span><input type='text' name='bolAlu2' placeholder='Boleta' data-validetta='required,minLength[10],maxLength[10]' /></div>"
                let tresalumno=dosalumno+"<p>Datos tercer alumno:</p><p>Ingrese su email:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-envelope'></i></span><input type='email' name='email3' placeholder='Email' data-validetta='required' /></div><p>Ingrese su Nombre:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-user'></i></span><input type='text' name='name3' placeholder='Nombre(s)' data-validetta='required'/></div><div class='input_field'> <span><i aria-hidden='true' class='fa fa-user'></i></span><input type='text' name='ape3' placeholder='Apellidos' data-validetta='required' /></div><p>Ingrese su Telefono:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-phone'></i></span><input type='text' name='phone3' placeholder='Telefono' data-validetta='required' /></div><p>Ingrese su Boleta:</p><div class='input_field'> <span><i aria-hidden='true' class='fa fa-address-card'></i></span><input type='text' name='bolAlu3' placeholder='Boleta' data-validetta='required,minLength[10],maxLength[10]'/></div>"
              
                if (document.getElementById('nalumnos').value == "2")
                {
                  document.getElementById("guop").innerHTML = unalumno;
                }
                else if (document.getElementById('nalumnos').value == "3") {
                  document.getElementById("guop").innerHTML = dosalumno;
                }
                else if(document.getElementById('nalumnos').value == "4") {
                  document.getElementById("guop").innerHTML = tresalumno;
                }else{
                  document.getElementById("guop").innerHTML = "";
                }
            
            }
            </script>
          <p>¿Cuantos alumnos son en el protocolo? </p>
          <div class="input_field select_option">
              <select name="nalumnos" id="nalumnos" onchange="mostraralumnos()">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
          <br>
          <div id="guop"></div>
          <input class="button" type="submit" value="Registrar" id="btnEnviar"/>
        </form>
      </div>

  <!-- Mostrar alerta de tiempo -->
      <script type="text/javascript">
      var band='1';
      </script>

  <!-- Si ya registro su protocolo, mostrar un mensaje -->
      <?php
            }
            else{
      ?>
      <h3>Bienvenid@ <?php echo "$infGetNombre[1] $infGetNombre[2]"
            ?>, ya has registrodo tu protocolo. </h3><br>
      <br>
      <br>
      <h4><a class="pb-3 pt-5" href="./inicio_alumno.php">Regresar</a></h4>

      <?php
            }
      ?>
</body>

<!-- ============================================================================================= -->
    <script src="./../js/jquery/jquery-3.6.0.min.js"></script>
<!-- ============================================================================================= -->
    <script src="./../js/validetta/dist/validetta.min.js"></script>
    <script src="./../js/validetta/localization/validettaLang-es-ES.js"></script>
<!-- ============================================================================================= -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- ============================================================================================= -->
    <script src="./../js/registroprotocolo.js"></script>
    <script src="./../js/registroprotocolo_Alert.js"></script>
  
<!-- =================================GUARDAR PDF================================================ -->
  <script>
  const btnEnviar = document.querySelector("#btnEnviar");
  const Protocolo = document.querySelector("#Protocolo");
      btnEnviar.addEventListener("click", () => {
          if (Protocolo.files.length > 0) {
              let formData = new FormData();
              formData.append("archivo", Protocolo.files[0]); // En la posición 0; es decir, el primer elemento
              fetch("registroprotocolo_PDF.php", {
                  method: 'POST',
                  body: formData,
              })
                  .then(respuesta => respuesta.text())
                  .then(decodificado => {
                      console.log(decodificado);
                  });
          } 
      });
</script>
</html>
<?php 
}
?>
