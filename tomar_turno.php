<?php
// Iniciar sesión
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

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_entornos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Actualizar el estado del turno a 'ocupado' y asignar el cliente_id
$cliente_id = $_SESSION['usuario_id'];
$actualizar_turno = "UPDATE turnos SET estado = 'ocupado', cliente_id = $cliente_id WHERE id = $id_turno";

if ($conn->query($actualizar_turno) === TRUE) {
    // Éxito al tomar el turno
    echo "<script>alert('¡Turno tomado con éxito!'); window.location.href = 'listar_turnos.php';</script>";
} else {
    // Error al tomar el turno
    echo "<script>alert('Error al tomar el turno.'); window.location.href = 'listar_turnos.php';</script>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

