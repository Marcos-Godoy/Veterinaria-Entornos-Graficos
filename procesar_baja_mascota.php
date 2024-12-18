<?php
// ARCHIVO EN DESUSO -----------------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_entornos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtiene el nombre de la mascota desde el formulario (POST) o por la URL (GET)
    $id_mascota = isset($_POST['id_mascota']) ? $_POST['id_mascota'] : (isset($_GET['id_mascota']) ? $_GET['id_mascota'] : null);

    // Consulta para obtener la información de la mascota
    //$consulta_mascota = "SELECT * FROM mascotas WHERE id = '$id_mascota'";
    //$resultado_mascota = $conn->query($consulta_mascota);
    
    //$nombre_mascota = $_POST["nombre_mascota"];
    //$fecha_muerte = $_POST["fecha_muerte"];

    // Consulta para verificar que la mascota exista
    $consulta_existencia = "SELECT * FROM mascotas WHERE id = '$id_mascota'";
    $resultado_existencia = $conn->query($consulta_existencia);

    if ($resultado_existencia->num_rows > 0) {
        // Verifica que la fecha de muerte sea válida y que ya haya pasado
        $fecha_actual = date("Y-m-d");
        if (strtotime($fecha_muerte) <= strtotime($fecha_actual)) {
            // Realiza la consulta para realizar la baja lógica de la mascota
            $baja_mascota = "UPDATE mascotas SET fecha_muerte = '$fecha_muerte' WHERE id = '$id_mascota'";

            if ($conn->query($baja_mascota) === TRUE) {
                echo "<script>alert('Baja lógica de la mascota realizada con éxito'); window.location.href = 'baja_mascota.html';</script>";
            } else {
                echo "<script>alert('Error en la baja lógica'); window.location.href = 'baja_mascota.html';</script>";
            }
        } else {
            echo "<script>alert('La fecha de muerte debe ser una fecha válida y anterior o igual a la fecha actual.'); window.location.href = 'baja_mascota.html';</script>";
        }
    } else {
        echo "<script>alert('No se encontró la mascota con el nombre proporcionado.'); window.location.href = 'baja_mascota.html';</script>";
    }
    $conn->close();
}
?>

