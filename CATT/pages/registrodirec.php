<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Registro Director TT</title>
   
    <!--CSS-->
    <link rel="stylesheet" href="./../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/index.css">
    <link rel="stylesheet" href="./../js/validetta/dist/validetta.css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--===============================================================================================-->
  <script src="./../js/jquery/jquery-3.6.0.min.js"></script>
  <!--===============================================================================================-->
    <script src="./../js/validetta/dist/validetta.min.js"></script>
    <script src="./../js/validetta/localization/validettaLang-es-ES.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <h1 class="h1 text-center pb-4 pt-5 font-weight-bold">Registro para Director de TT</h1>
          <form class="text-center" id="formDirec" enctype="multipart/form-data" method="post">
            <p>Ingrese su Boleta temporal:</p>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-address-card"></i></span>
              <input type="text" name="boleta" id="boleta" placeholder="boleta" data-validetta="required,minLength[11],maxLength[11]">
            </div>
            <p>Ingrese su Email:</p>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
              <input type="email" name="email" id="email" placeholder="Email" data-validetta="required">
            </div>
            <p>Ingrese su Contraseña:</p>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
              <input type="password" name="pass" id="pass" placeholder="Password" data-validetta="required" />
            </div>
            <p>Ingrese de nuevo su Contraseña:</p>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
              <input type="password" name="pass2" id="pass2" placeholder="Re-type Password" data-validetta="required,equalTo[pass]"/>
            </div>
            <p>Ingrese su Nombre:</p>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                  <input type="text" name="nombre" id="nombre" placeholder="First Name" data-validetta="required"/>
                </div>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                  <input type="text" name="apellido" id="apellido" placeholder="Last Name" data-validetta="required"/>
                </div>
                <p>Ingrese su Telefono:</p>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                    <input type="text" name="tel" id="tel" placeholder="Telefono" data-validetta="required" />
                  </div>
                <p>¿Es profesor externo? </p>
                <div class="input_field select_option">
                    <select>
                      <option>No</option>
                      <option>Si</option>
                    </select>
                    <div class="select_arrow"></div>
                    <p>Curriculum Vitae (Solo externos):</p>
                    <input type="file" name="Curriculum" id="Curriculum">
                  </div>
                <br>
            <input class="button" type="submit" value="Registrar" id="btnEnviar"/>
          </form>
        </div>


<script>
const btnEnviar = document.querySelector("#btnEnviar");
const Curriculum = document.querySelector("#Curriculum");
    btnEnviar.addEventListener("click", () => {
        if (Curriculum.files.length > 0) {
            let formData = new FormData();
            formData.append("archivo", Curriculum.files[0]); // En la posición 0; es decir, el primer elemento
            fetch("Direc_CV.php", {
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


  <script src="./../js/registrodirec.js"></script>
</body>
</html>