<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $destinatario = "mjgodoy2002@gmail.com"; // Reemplazar despues, todavia no anda porque lo estoy probando localmente

    $asunto = "Nuevo mensaje del formulario de contacto";

    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo electrónico: $email\n";
    $contenido .= "Mensaje:\n$mensaje";

    // Enviar el correo electrónico
    mail($destinatario, $asunto, $contenido);

    echo "Su consulta ha sido enviada, en breve recibirá nuestra
respuesta."; 
    exit();
}
?>