<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';

    // Obtiene los datos del formulario
    $email = $_POST["email"];
    $clave = $_POST["clave"];
    $rol_id = $_POST["rol_id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    // Realiza la consulta para insertar el nuevo registro de personal
    $insertar_personal = "INSERT INTO personal (email, clave, rol_id, nombre, apellido) VALUES ('$email', '$clave', '$rol_id', '$nombre', '$apellido')";

    if ($conn->query($insertar_personal) === TRUE) {
        echo "<script>alert('Registro exitoso'); window.location.href = 'listar_personales.php';</script>";
    } else {
        echo "<script>alert('Error en el registro'); window.location.href = 'ingresar_personal.php';</script>";
    }

    $conn->close();
}
?>
