<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: listar_turnos_admin.php");
    exit();
}

$id_turno = $_GET['id'];

include 'conexion.php';
// El admin puede eliminar solo turnos disponibles (los clientes no pueden eliminar turnos)
$consulta_verificacion = "SELECT * FROM turnos WHERE id = $id_turno AND estado = 'disponible'";
$resultado_verificacion = $conn->query($consulta_verificacion);
if ($resultado_verificacion->num_rows > 0) {
    $baja_turno = "DELETE FROM turnos WHERE id = $id_turno AND estado = 'disponible'";
    if ($conn->query($baja_turno) === TRUE) {
        echo "<script>alert('¡Turno eliminado con éxito!'); window.location.href = 'listar_turnos_admin.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el turno.'); window.location.href = 'listar_turnos_admin.php';</script>";
    }
} else {
    echo "<script>alert('El turno no está disponible o no existe.'); window.location.href = 'listar_turnos_admin.php';</script>";
}

$conn->close();
?>

