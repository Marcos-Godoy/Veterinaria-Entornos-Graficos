<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'libs/PHPMailer/src/Exception.php';
require 'libs/PHPMailer/src/PHPMailer.php';
require 'libs/PHPMailer/src/SMTP.php';

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $desde = $_POST["email"];
        $mensaje = $_POST["mensaje"];
        
        $contenido = "<h3>Consulta de Veterinaria San Anton</h3><br>";
        $contenido .= "<strong>Nombre</strong>: $nombre<br>";
        $contenido .= "<strong>Correo electrónico</strong>: $desde<br>";
        $contenido .= "<strong>Mensaje</strong>:<br>$mensaje";
    
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP (Gmail)
        $mail->SMTPAuth = true;
        $mail->Username = 'mjgodoy2002@gmail.com'; // email
        $mail->Password = ''; // contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Puerto SMTP

        // Configuración del correo
        $mail->setFrom($desde, $nombre); // Remitente
        $mail->addAddress('mjgodoy2002@gmail.com', 'Destinatario'); // Destinatario
        $mail->Subject = 'Consulta Veterinaria San Anton'; // Asunto
        $mail->Body = $contenido; // Cuerpo del correo
        $mail->isHTML(true); // Enviar como HTML

        // Enviar el correo
        $mail->send();
        echo "<script>alert('Su consulta ha sido enviada, en breve recibirá nuestra respuesta.'); window.location.href = 'contacto.php';</script>";
        exit();
    }
    
} catch (Exception $e) {
    echo "<script>alert('No se ha podido enviar su consulta. Por favor, intente nuevamente'); window.location.href = 'contacto.php';</script>";
}
?>
