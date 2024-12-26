<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST["cliente_id"];
    $nombre = $_POST["nombre"];
    //$foto = $_POST["foto"];
    $raza = $_POST["raza"];
    $color = $_POST["color"];
    $fecha_de_nac = $_POST["fecha_de_nac"];

    // Manejo de la foto
    $foto = $_FILES["foto"];
    $foto_nombre = basename($foto["name"]);
    $foto_tmp = $foto["tmp_name"];
    $foto_dir = "uploads/" . $foto_nombre;

    if (move_uploaded_file($foto_tmp, $foto_dir)) {
        echo "La foto se subió correctamente.";
    } else {
        echo "Hubo un error al subir la foto.";
    }

    include 'conexion.php';

    // Realiza una consulta para verificar si el cliente existe
    $cliente_query = "SELECT * FROM clientes WHERE id = $cliente_id";
    $cliente_result = $conn->query($cliente_query);

    if ($cliente_result->num_rows > 0) {
        $mascota_query = "INSERT INTO mascotas (cliente_id, nombre, foto, raza, color, fecha_de_nac) 
                          VALUES ($cliente_id, '$nombre', '$foto_dir', '$raza', '$color', '$fecha_de_nac')";

        if ($conn->query($mascota_query) === TRUE) {
            echo "<script>alert('Registro exitoso'); window.location.href = 'listar_mascotas_estado.php';</script>";
        } else {
            echo "<script>alert('Error en el registro'); window.location.href = 'listar_mascotas_estado.php';</script>";
        }
    } else {
        echo "<script>alert('El ID del cliente no existe'); window.location.href = 'registrar_mascota.html';</script>";
    }

    $conn->close();
}
?>
