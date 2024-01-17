<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['id_personal'])) {
    $id_personal = $_SESSION['usuario_id']; //tengo que establecer la sesion cuando inicio sesion con $_SESSION['id_personal'] = $id_personal;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_entornos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtiene los datos del formulario
    $nombre_mascota = $_POST["nombre_mascota"];
    $servicio_id = $_POST["servicio_id"];
    $fecha_hora = $_POST["fecha_hora"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    // Realiza la consulta para obtener el ID de la mascota por su nombre
    $consulta_mascota = "SELECT id FROM mascotas WHERE nombre = '$nombre_mascota'";
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
            $insertar_atencion = "INSERT INTO atenciones (mascota_id, servicio_id, personal_id, fecha_hora, titulo, descripcion) VALUES ('$id_mascota', '$servicio_id', '$fecha_hora', '$titulo', '$descripcion')";

            if ($conn->query($insertar_atencion) === TRUE) {
                echo "Atención completada con éxito";
            } else {
                echo "Error al completar la atención: " . $conn->error;
            }
        } else {
            echo "Error: El servicio con el ID '$servicio_id' no existe.";
        }
    } else {
        echo "Error: La mascota con el nombre '$nombre_mascota' no existe.";
    }

    // Cierra la conexión a la base de datos
    $conn->close();

    } else {
        // Si no hay una sesión activa, redirige o realiza alguna acción adecuada
        echo "Error: Sesión no válida.";
    }
}
?>
