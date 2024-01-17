<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_entornos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario de generación de turno
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaHora = $_POST["fecha_hora"];
    $servicioID = $_POST["servicio_id"];

    // Verificar si el servicio ID existe en la tabla de servicios
    $verificarServicio = "SELECT * FROM servicios WHERE id = '$servicioID'";
    $resultadoVerificar = $conn->query($verificarServicio);

    if ($resultadoVerificar->num_rows > 0) {
        // Verificar si la fecha y hora son futuras
        $fechaHoraActual = date('Y-m-d\TH:i');
        if ($fechaHora > $fechaHoraActual) {
            // Fecha y hora válidas, se puede generar el turno
            $estado = "disponible";

            // Consulta SQL para insertar el nuevo turno en la tabla
            $insertarTurno = "INSERT INTO turnos (fecha_hora, servicio_id, estado) VALUES ('$fechaHora', '$servicioID', '$estado')";

            if ($conn->query($insertarTurno) === TRUE) {
                // Turno generado con éxito
                echo "<script>alert('Turno generado con éxito.'); window.location.href = 'generar_turno.html';</script>";
            } else {
                // Error al generar el turno
                echo "<script>alert('Error al generar el turno: " . $conn->error . "'); window.location.href = 'generar_turno.html';</script>";
            }
        } else {
            // Fecha y hora no válidas
            echo "<script>alert('Error: La fecha y hora ingresadas deben ser futuras.'); window.location.href = 'generar_turno.html';</script>";
        }
    } else {
        // Servicio ID no válido
        echo "<script>alert('Error: El servicio ID ingresado no existe.'); window.location.href = 'generar_turno.html';</script>";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

