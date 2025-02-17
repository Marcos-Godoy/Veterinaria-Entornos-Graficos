<?php
include 'conexion.php';

$nombre_mascota = $_POST['nombre_mascota'];
$id_atencion = $_POST['id_atencion'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$actualizar_atencion = "UPDATE atenciones SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = '$id_atencion'";
if ($conn->query($actualizar_atencion) === TRUE) {
    echo $nombre_mascota;
    echo "<script>alert('Edición exitosa.'); window.location.href = 'generar_carnet.php?nombre_mascota=" . $nombre_mascota . "';</script>";
    exit();
} else {
    echo "<script>alert('Error en la edición.'); window.location.href = 'generar_carnet.php?nombre_mascota=" . $nombre_mascota . "';</script>";
}

$conn->close();
?>

