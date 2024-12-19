<?php
include 'conexion.php';

// Procesar el formulario de generación de turno
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaHora = $_POST["fecha_hora"];
    $servicioID = $_POST["servicio_id"];
    $personalID = $_POST["personal_id"];

    // Verificar si el servicio ID existe en la tabla de servicios
    $verificarServicio = "SELECT * FROM servicios WHERE id = '$servicioID'";
    $resultadoVerificar = $conn->query($verificarServicio);
    $verificarPersonal = "SELECT * FROM personal WHERE id = '$personalID'";
    $resultadoVerificarPersonal = $conn->query($verificarPersonal);

    if ($resultadoVerificar->num_rows > 0 && $resultadoVerificarPersonal->num_rows > 0) {

        $turnosActuales = "SELECT * FROM turnos WHERE fecha_hora = '$fechaHora' AND personal_id = '$personalID'";
        $resultadoTurnos = $conn->query($turnosActuales);
        if($resultadoTurnos->num_rows <= 0){
            // Verificar si la fecha y hora son futuras
        $fechaHoraActual = date('Y-m-d\TH:i');
        if ($fechaHora > $fechaHoraActual) {
            // Fecha y hora válidas, se puede generar el turno
            $estado = "disponible";
            
            $insertarTurno = "INSERT INTO turnos (fecha_hora, servicio_id, personal_id, estado) VALUES ('$fechaHora', '$servicioID', '$personalID', '$estado')";

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
            echo "<script>alert('Error: El personal ya tiene un turno asignado en esa fecha y hora.'); window.location.href = 'generar_turno.html';</script>";
        }
    } else {
        echo "<script>alert('Error: El servicio ID o Personal ID ingresado no existen.'); window.location.href = 'generar_turno.html';</script>";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

