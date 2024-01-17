<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_entornos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id_atencion = $_POST['id_atencion'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$actualizar_atencion = "UPDATE atenciones SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = '$id_atencion'";
if ($conn->query($actualizar_atencion) === TRUE) {
    echo "<script>alert('Edicion exitosa.'); window.location.href = 'consultar_carnet.html';</script>";
    exit();
} else {
    echo "<script>alert('Error en la edicion'); window.location.href = 'consultar_carnet.html';</script>";
}

$conn->close();
?>

