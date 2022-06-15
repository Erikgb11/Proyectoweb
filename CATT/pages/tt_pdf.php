<?php
include("./../classphp/mpdf80/vendor/autoload.php");
/* session_start();
$correo = $_SESSION["correo"];
include("./configBD.php");
$sqlGetNombre = "SELECT * FROM alumno WHERE correo = '$correo'";
  $resGetNombre = mysqli_query($conexion, $sqlGetNombre);
  $infGetNombre = mysqli_fetch_row($resGetNombre);
  $sqlGetUAO1 = "SELECT uao.nombre FROM encuesta AS enc, uaoptativa AS uao
  WHERE enc.uao_1 = uao.id AND enc.correo = '$correo'";
  $resGetUAO1 = mysqli_query($conexion, $sqlGetUAO1);
  $infGetUAO1 = mysqli_fetch_row($resGetUAO1);
  $sqlGetUAO2 = "SELECT uao.nombre FROM encuesta AS enc, uaoptativa AS uao
  WHERE enc.uao_2 = uao.id AND enc.correo = '$correo'";
  $resGetUAO2 = mysqli_query($conexion, $sqlGetUAO2);
  $infGetUAO2 = mysqli_fetch_row($resGetUAO2);
   */

  $mpdf = new \Mpdf\Mpdf([
    "mode"=>"c",
    "orientation"=>"p",
    "format"=>"letter",
    "default_font_size"=>12,
    "default_font"=>"dejavusans"
  ]);

  $html = "
  <link rel='stylesheet' href='./../css/bootstrap/bootstrap.min.css'>
  <link rel='stylesheet' href='./../css/paratables.css'>
  <style>h1{color:blue;}</style>
  <h1>ESCOM - IPN</h1>
  <img src='./../imgs/header.jpg'>
  <div class='info d-flex'>
        <div class='container'>
            <h1 class='h1 text-center pb-4 pt-5 font-weight-bold'>Información sobre Automata Saludable</h1>
            <table class='table'>
                <thead class='thead-dark'>
                    <tr><!-- ejemplo de como quedarian las cosas que se muestran -->
                    <th>No.</th>
                    <th>Nombre del protocolo</th>
                    <th>Resumen</th>
                    <th>Participantes</th>
                    <th>Correos</th>
                    <th>Telefonos</th>
                    <th>Boletas</th>
                    <th>Director</th>
                    <th>Sinodales</th>
                    </tr>
                </thead>
                <tr>
                <td>1</td>
                <td>Automata Saludable</td>
                <td>Software que lleva a cabo dietas y rutinas de ejercicio con ayuda de una red neuronal.</td>
                <td>Jose Perez Perez<br>
                    Jose Perez Perez<br>
                    Jose Perez Perez</td>
                    <td>josepomposito@gmail.com<br>
                        josepomposito@gmail.com<br>
                        josepomposito@gmail.com</td>
                    <td>5555555555<br>
                        5555555555<br>
                        5555555555</td>
                    <td>2020000000<br>
                        2020000000<br>
                        2020000000</td>
                    <td>Enrique Estrada Estrada</td>
                    <td>Asdrubal González González</td>
            </table>
        </div>
    </div>
  ";

  $mpdf->WriteHTML($html);
  $mpdf->output();
?>