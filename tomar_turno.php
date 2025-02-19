<?php
session_start();

// Verificar si el usuario está autenticado como cliente
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

// Verificar si se recibió el ID del turno a tomar por GET
if (!isset($_GET['id'])) {
    header("Location: listar_turnos.php");
    exit();
}

// Obtener el ID del turno desde la URL
$id_turno = $_GET['id'];

include 'conexion.php';

$cliente_id = $_SESSION['usuario_id'];
// Verificar si el cliente tiene al menos una mascota asociada
$consulta_mascota = "SELECT * FROM mascotas WHERE cliente_id = $cliente_id and fecha_muerte = '0000-00-00'";
$resultado_mascota = $conn->query($consulta_mascota);

if ($resultado_mascota->num_rows > 0) {
    $actualizar_turno = "UPDATE turnos SET estado = 'ocupado', cliente_id = $cliente_id WHERE id = $id_turno";

    if ($conn->query($actualizar_turno) === TRUE) {
        echo "<script>alert('¡Turno tomado con éxito!'); window.location.href = 'listar_turnos.php';</script>";
    } else {
        echo "<script>alert('Error al tomar el turno.'); window.location.href = 'listar_turnos.php';</script>";
    }
} else {
    echo "<script>alert('No puedes tomar un turno porque no tienes mascotas activas asociadas.'); window.location.href = 'listar_turnos.php';</script>";
}

$conn->close();
?>

