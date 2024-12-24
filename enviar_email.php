<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    //$destinatario = "veterin8@veterinaria-entornos-graficos.com"; // Reemplazar despues, todavia no anda porque lo estoy probando localmente
    $destinatario = "admin@veterinaria-entornos-graficos.com";
    $asunto = "Nuevo mensaje del formulario de contacto";

    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo electrónico: $email\n";
    $contenido .= "Mensaje:\n$mensaje";

    mail($destinatario, $asunto, $contenido);

    /*
    if (mail($destinatario, $asunto, $contenido)) {
        echo "<script>alert('Su consulta ha sido enviada, en breve recibirá nuestra respuesta.'); window.location.href = 'contacto.html';</script>";
    } else {
        echo "<script>alert('Hubo un problema al enviar su consulta. Por favor, inténtelo de nuevo más tarde.'); window.location.href = 'contacto.html';</script>";
    }*/
    echo "<script>alert('Su consulta ha sido enviada, en breve recibirá nuestra respuesta.'); window.location.href = 'contacto.html';</script>";
    exit();
}
?>

<?php/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

echo 'principio';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo 'aaaaaaaa';
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $destinatario = "mjgodoy2002@gmail.com"; // Cambia al correo destino

    $asunto = "Nuevo mensaje del formulario de contacto";

    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo electrónico: $email\n";
    $contenido .= "Mensaje:\n$mensaje";

    $mail = new PHPMailer(true);
    try {
        echo 'se mete al try';
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.veterinaria-entornos-graficos.com.preview.services';
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@veterinaria-entornos-graficos.com.preview.services';
        $mail->Password = '123456';
        $mail->SMTPSecure = 'ssl'; // Cambia a 'ssl'
        $mail->Port = 465; // Cambia al puerto 465 para SSL

        // Deshabilitar la verificación del certificado (solo para pruebas)
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Configuración del correo
        $mail->setFrom('admin@veterinaria-entornos-graficos.com.preview.services', 'Veterinaria');
        $mail->addAddress($destinatario);

        // Contenido del mensaje
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = nl2br($contenido);
        $mail->AltBody = $contenido;

        // Enviar correo
        $mail->send();
        echo "<script>alert('Su consulta ha sido enviada, en breve recibirá nuestra respuesta.'); window.location.href = 'contacto.html';</script>";
    } catch (Exception $e) {
        echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
    }
    echo 'finalllllll';
}*/
?>
