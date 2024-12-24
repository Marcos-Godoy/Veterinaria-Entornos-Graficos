<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';

    // Obtén los datos del formulario
    $id_personal = $_POST["id_personal"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $rol_id = $_POST["rol_id"];

    // Consulta para verificar que el rol_id exista en la tabla de roles
    $consulta_rol = "SELECT * FROM roles WHERE id = '$rol_id'";
    $resultado_rol = $conn->query($consulta_rol);

    if ($resultado_rol->num_rows > 0) {
        // El rol_id existe, realiza la actualización en la tabla de personal
        $actualizar_personal = "UPDATE personal SET nombre='$nombre', apellido='$apellido', email='$email', rol_id='$rol_id' WHERE id='$id_personal'";

        if ($conn->query($actualizar_personal) === TRUE) {
            echo "<script>alert('Datos actulizados exitosamente'); window.location.href = 'gestionar-mi-perfil.php';</script>";
        } else {
            echo "<script>alert('Error'); window.location.href = 'gestionar-mi-perfil.php';</script>";
        }
    } else {
        echo "<script>alert('No existe ese rol'); window.location.href = 'gestionar-mi-perfil.php';</script>";
    }

    $conn->close();
}
?>
