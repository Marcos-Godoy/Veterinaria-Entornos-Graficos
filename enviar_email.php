<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

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
