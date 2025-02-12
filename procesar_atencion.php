<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (isset($_SESSION['rol_id'])) {
    $id_personal = $_SESSION['usuario_id']; //tengo que establecer la sesion cuando inicio sesion con $_SESSION['id_personal'] = $id_personal;

    include 'conexion.php';

    $nombre_mascota = $_POST["nombre_mascota"];
    $servicio_id = $_POST["servicio_id"];
    $fecha_hora = $_POST["fecha_hora"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    // Realiza la consulta para obtener el ID de la mascota por su nombre
    $consulta_mascota = "SELECT id FROM mascotas WHERE nombre = '$nombre_mascota' AND fecha_muerte = '0000-00-00'";
    $resultado_mascota = $conn->query($consulta_mascota);

    if ($resultado_mascota->num_rows > 0) {
        // Si la mascota existe, obtén su ID
        $fila_mascota = $resultado_mascota->fetch_assoc();
        $id_mascota = $fila_mascota["id"];

        // Realiza la consulta para verificar que exista el servicio
        $consulta_servicio = "SELECT id FROM servicios WHERE id = '$servicio_id'";
        $resultado_servicio = $conn->query($consulta_servicio);

        if ($resultado_servicio->num_rows > 0) {
            // Si el servicio existe, realiza la consulta para insertar el nuevo registro de atención
            $insertar_atencion = "INSERT INTO atenciones (mascota_id, servicio_id, personal_id, fecha_hora, titulo, descripcion) VALUES ('$id_mascota', '$servicio_id', '$id_personal', '$fecha_hora', '$titulo', '$descripcion')";

            if ($conn->query($insertar_atencion) === TRUE) {
                //echo "Atención completada con éxito";
                echo "<script>alert('Atencion completada con exito'); window.location.href = 'gestionar-mi-perfil.php';</script>";
            } else {
                echo "<script>alert('Error al completar la atencion'); window.location.href = 'completar_atencion.php';</script>";
            }
        } else {
            //echo "Error: El servicio con el ID '$servicio_id' no existe.";
            echo "<script>alert('Error: El servicio con el ID {$servicio_id} no existe.'); window.location.href = 'completar_atencion.php';</script>";
        }
    } else {
        echo "<script>alert('Error: La mascota con el nombre {$nombre_mascota} no existe o esta muerta.'); window.location.href = 'completar_atencion.php';</script>";
    }

    $conn->close();

    } else {
        // Si no hay una sesión activa, redirige o realiza alguna acción adecuada
        echo "Error: Sesión no válida.";
    }
}
?>
