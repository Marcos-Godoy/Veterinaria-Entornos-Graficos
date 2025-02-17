<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $clave = $_POST["clave"];

    include 'conexion.php';

    // Consulta SQL para insertar datos
    $consulta = "INSERT INTO clientes (nombre, apellido, email, ciudad, direccion, telefono, clave) 
                 VALUES ('$nombre', '$apellido', '$email', '$ciudad', '$direccion', '$telefono', '$clave')";

    if ($conn->query($consulta) === TRUE) {
        // Registro exitoso, muestra el cartel y redirige a la página de perfil
        echo "<script>alert('Registro exitoso'); window.location.href = 'listar_clientes.php';</script>";
    } else {
        echo "<script>alert('Error en el registro');</script>";
    }

    $conn->close();
}
?>
