<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
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

    // Mueve el archivo subido al directorio deseado
    if (move_uploaded_file($foto_tmp, $foto_dir)) {
        echo "La foto se subió correctamente.";
    } else {
        echo "Hubo un error al subir la foto.";
    }

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

    // Realiza una consulta para verificar si el cliente existe
    $cliente_query = "SELECT * FROM clientes WHERE id = $cliente_id";
    $cliente_result = $conn->query($cliente_query);

    if ($cliente_result->num_rows > 0) {
        // El cliente existe, procede a registrar la mascota
        $mascota_query = "INSERT INTO mascotas (cliente_id, nombre, foto, raza, color, fecha_de_nac) 
                          VALUES ($cliente_id, '$nombre', '$foto_dir', '$raza', '$color', '$fecha_de_nac')";

        if ($conn->query($mascota_query) === TRUE) {
            echo "<script>alert('Registro exitoso'); window.location.href = 'mi-perfil.html';</script>";
        } else {
            echo "<script>alert('Error en el registro'); window.location.href = 'mi-perfil.html';</script>";
        }
    } else {
        echo "<script>alert('El ID del cliente no existe'); window.location.href = 'mi-perfil.html';</script>";
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>
