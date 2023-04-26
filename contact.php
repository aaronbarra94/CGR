<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'src/PHPMailer/vendor/autoload.php';
require 'src/PHPMailer/PHPMailer.php';
require 'src/PHPMailer/Exception.php';
require 'src/PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.constructoracgr.cl';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contacto@constructoracgr.cl';                     //SMTP username
    $mail->Password   = 'CGRContacto1000.';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('contacto@constructoracgr.cl', $_POST['name']);
    $mail->addAddress('contacto@constructoracgr.cl', $_POST['email']);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = 'Nombre: '.$_POST['name']."\r\n".'Correo: '.$_POST['email']."\r\n".'Mensaje: '.$_POST['message'];

    $mail->send();
    echo 'Enviado correctamente';
