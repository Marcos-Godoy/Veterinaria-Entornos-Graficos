<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realiza la conexión a la base de datos (ajusta los valores según tu configuración)
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
    $fecha_muerte = $_POST["fecha_muerte"];

    // Realiza la consulta para realizar la baja lógica de la mascota
    $baja_mascota = "UPDATE mascotas SET fecha_muerte = '$fecha_muerte' WHERE nombre = '$nombre_mascota'";

    if ($conn->query($baja_mascota) === TRUE) {
        echo "Baja lógica de la mascota realizada con éxito";
    } else {
        echo "Error al realizar la baja lógica de la mascota: " . $conn->error;
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>
