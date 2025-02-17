<?php
session_start();

// Verificar si se recibió el ID del turno a tomar por GET
if (!isset($_GET['id'])) {
    header("Location: listar_turnos_admin.php");
    exit();
}

$id_turno = $_GET['id'];

include 'conexion.php';

$baja_turno = "DELETE FROM turnos WHERE id = $id_turno";
if ($conn->query($baja_turno) === TRUE) {
    echo "<script>alert('¡Turno eliminado con éxito!'); window.location.href = 'listar_turnos_admin.php';</script>";
} else {
    echo "<script>alert('Error.'); window.location.href = 'listar_turnos_admin.php';</script>";
}

$conn->close();
?>

