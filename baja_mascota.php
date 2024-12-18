<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_entornos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $fecha_muerte = $_POST["fecha_muerte"];

    $fecha_actual = date("Y-m-d");
    // Validar que la fecha de muerte sea válida y anterior o igual a la fecha actual
    if ($fecha_muerte > $fecha_actual) {
        echo "<script>alert('La fecha de muerte debe ser una fecha válida y anterior o igual a la fecha actual.'); window.location.href = 'listar_mascotas_estado.php';</script>";
        exit();
    }

    // Actualiza la fecha de muerte de la mascota en la base de datos
    $update_query = "UPDATE mascotas SET fecha_muerte='$fecha_muerte' WHERE id=$id";
    if ($conn->query($update_query) === TRUE) {
        echo "<script>alert('Mascota eliminada exitosamente.'); window.location.href = 'listar_mascotas_estado.php';</script>";
    } else {
        echo "Error: " . $update_query . "<br>" . $conn->error;
    }
}

$conn->close();

header("Location: listar_mascotas_estado.php");
exit();
?>