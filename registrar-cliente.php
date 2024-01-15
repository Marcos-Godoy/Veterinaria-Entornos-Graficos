<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    // Conecta a la base de datos en localhost sin nombre de usuario ni contraseña
    $servername = "localhost";
    $username = "root"; // Deja en blanco si no has configurado un nombre de usuario específico
    $password = ""; // Deja en blanco si no has configurado una contraseña específica
    $dbname = "bd_entornos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Prepara la consulta SQL para insertar datos
    $sql = "INSERT INTO clientes (nombre, apellido, email, ciudad, direccion, telefono) VALUES ('$nombre', '$apellido', '$email', '$ciudad', '$direccion', '$telefono')";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Cliente registrado exitosamente";
    } else {
        echo "Error al registrar el cliente: " . $conn->error;
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>
