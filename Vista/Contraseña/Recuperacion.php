<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../../Config/BaseDatos.php');
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$email = $_POST['email'];
$query = "SELECT * FROM tblusuarios WHERE email = '$email'";

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp-mail.outlook.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'thelegalsolutions4@hotmail.com';
    $mail->Password   = 'Thelegalsolutions'; // Revisa que sea la contraseña correcta
    $mail->Port       = 587;

    // Recipientes
    $mail->setFrom('thelegalsolutions4@hotmail.com', 'TLS');
    $mail->addAddress($email);

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = 'Recuperacion de Password TLS';
    $mail->Body    = 'Hola, si pediste restablecer tu contraseña en tu cuenta de TLS da click en el siguiente link: <a href="http://localhost/proyectotls/Vista/Contraseña/FormularioContraseña.php">Generar nueva Contraseña</a> <br> De lo contrario haga caso omiso a este mensaje';
    $mail->AltBody = 'Este es el cuerpo en texto plano para clientes de correo que no soportan HTML';



    // Envía el correo
    $mail->send();
    echo 'El mensaje fue enviado correctamente';
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado: {$mail->ErrorInfo}";
}
