<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require './src/Exception.php';
  require './src/PHPMailer.php';
  require './src/SMTP.php';

  include("./contrasenaMail.php");
  
  $outlook_mail = new PHPMailer;
  
  $outlook_mail->IsSMTP();
  // Send email using Outlook SMTP server
  $outlook_mail->Host = 'smtp-mail.outlook.com';
  // port for Send email
  $outlook_mail->Port = 587;
  $outlook_mail->SMTPSecure = 'tls';
  $outlook_mail->SMTPDebug = 1;
  $outlook_mail->SMTPAuth = true;
  $outlook_mail->Username = 'catt_escom11@outlook.com';
  $outlook_mail->Password = $contrasenaMail;
  
  $outlook_mail->From = 'catt_escom11@outlook.com';
  $outlook_mail->FromName = 'CATT-ESCOM';// frome name
  $outlook_mail->AddAddress('erikgb11@outlook.com', 'Erik');  // Add a recipient  to name
  $outlook_mail->AddAddress('erikgb11@outlook.com');  // Name is optional
  
  $outlook_mail->IsHTML(true); // Set email format to HTML
  
  $outlook_mail->Subject = 'Test Envio Correo - ESCOM 20222';
  $outlook_mail->Body    = '<h1>Test 080622</h1>Send email using Outlook SMTP server <br>This is the HTML message body <strong>in bold!</strong> <a href="https://onlinecode.org/" target="_blank">onlincode.org</a>';
  $outlook_mail->AltBody = 'This is the body in plain text for non-HTML mail clients at https://onlinecode.org/';
  $outlook_mail->addAttachment('./pdfVacio.pdf');
  
  if(!$outlook_mail->Send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $outlook_mail->ErrorInfo;
    exit;
  }
  else
  {
    echo 'Message of Send email using Outlook SMTP server has been sent';
  }
?>