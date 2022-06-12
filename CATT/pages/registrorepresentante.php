<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Participante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

    <!--CSS-->
    <link rel="stylesheet" href="./../js/validetta/dist/validetta.css">
    <link rel="stylesheet" href="./../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/index.css">
    <link rel="stylesheet" href="./../css/registrorepresentante.css">

    <script src="./../js/jquery/jquery-3.6.0.min.js"></script>
    <script src="./../js/validetta/dist/validetta.min.js"></script>
    <script src="./../js/validetta/localization/validettaLang-es-ES.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>

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
                        <a class="nav-link text-dark grey-bold" href="#"> <i class="fa-solid fa-user"></i> Usuario</a>
                    </li>

                    <li class="nav-item user">
                        <a class="nav-link text-dark grey-bold" href="#"> Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <h1 class="font-weight-bold text-center mb-5 mt-5">Registro</h1>
    
        <form action="" method="post" enctype="multipart/form-data" id="formRegistro" class="formRegistro">
    
            <div class="datos-generales d-flex flex-column">
                <h3>Datos Generales</h3>
                <div class="datos-generales d-flex flex-column">
                <input type="text" id="Apepa" name="Apepa" data-validetta="required" placeholder="Apellido Paterno">
                </div>
                <div class="datos-generales d-flex flex-column">
                <input type="text" id="Apema" name="Apema" data-validetta="required" placeholder="Apellido Materno">
                </div>
                <div class="datos-generales d-flex flex-column">
                <input type="text" id="nombre" name="nombre" data-validetta="required" placeholder="Nombre(s)">
                </div>
                <div class="datos-generales d-flex flex-column">
                <input type="number" id="tel" name="tel" data-validetta="required" placeholder="Telefono Celular">
                </div>
                <!-- <div class="datos-generales d-flex flex-column"> -->
                <!-- <input type="email" data-validetta="required,email" name="email-alumno" id="email-alumno"> -->
                <!-- </div> -->
            </div>
            
    
    
            <div class="datos-escolares d-flex flex-column mt-5">
                <h3>Datos Escolares</h3>
                <input type="number" name="boleta" id="boleta" data-validetta="required,minLength[10],maxLength[10]" placeholder="Boleta">
                <div class="datos-generales d-flex flex-column">
                <input type="email" name="correo" id="correo" data-validetta="required,email" placeholder="Correo electronico">
                </div>

                <div class="archivo">
                    <label for="">Identificación Oficial (Credencial IPN, INE, IFE o Pasaporte).
                        Subir escaneado del anverso y reverso de la identificación oficial en un único documento PDF menor a 1MB</label>
                        
                    <input type="file" name="documento" id="documento">
                </div>

                
                <div class="plan  d-flex flex-column">
                    <label for="">Plan de Estudios</label>
                    <select name="carrera" id="carrera" data-validetta="required">
                        <option value="">--Seleccionar--</option>
                        <option value="ISC">Ing. en Sistemas Computacionales</option>
                        <option value="IIA">Ing. en Inteligencia Artificial</option>
                        <option value="LCD">Lic. en Ciencia de Datos</option>
                    </select>
                </div>
            </div>
    
            <div class="contraseña d-flex flex-column mb-3">
                <div class="contraseña d-flex flex-column mb-3">
                    <input type="password" name="pass" id="pass" data-validetta="required" placeholder="Contraseña">
                </div>
                <div class="contraseña d-flex flex-column mb-3">
                    <input type="password" name="pass2" id="pass2" data-validetta="required,equalTo[pass]" placeholder="Confirmar Contraseña">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-25" id="btnEnviar">Enviar</button>
        </form>
    </div>

    <script>
        const btnEnviar = document.querySelector("#btnEnviar");
        const documento = document.querySelector("#documento");
        btnEnviar.addEventListener("click", () => {
            if (documento.files.length > 0) {
                let formData = new FormData();
                formData.append("archivo", documento.files[0]); // En la posición 0; es decir, el primer elemento
                fetch("identificacionrepresentante.php", {
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


    <script src="./../js/registrorepresentante.js"></script>
</body>
</html>