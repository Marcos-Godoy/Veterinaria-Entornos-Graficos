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
            // Mensaje de éxito
            echo "Datos actualizados correctamente.";

            // Redirección a la página de listado después de 2 segundos
            header("refresh:2;url=listar_personales.php");
        } else {
            // Mensaje de error
            echo "Error al actualizar los datos: " . $conn->error;
        }
    } else {
        // El rol con ID no existe
        echo "El rol con ID $rol_id no existe.";
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>
