<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $raza = $_POST["raza"];
    $color = $_POST["color"];
    $fecha_de_nac = $_POST["fecha_de_nac"];
    $fecha_muerte = $_POST["fecha_muerte"];

    // Manejo de la foto
    if ($_FILES["foto"]["name"]) {
        $foto = $_FILES["foto"];
        $foto_nombre = basename($foto["name"]);
        $foto_tmp = $foto["tmp_name"];
        $foto_dir = "uploads/" . $foto_nombre;

        if (move_uploaded_file($foto_tmp, $foto_dir)) {
            $foto_query = ", foto='$foto_dir'";
        } else {
            echo "Hubo un error al subir la foto.";
            $foto_query = "";
        }
    } else {
        $foto_query = "";
    }

    // Actualiza los datos de la mascota en la base de datos
    $update_query = "UPDATE mascotas SET nombre='$nombre', raza='$raza', color='$color', fecha_de_nac='$fecha_de_nac', fecha_muerte='$fecha_muerte' $foto_query WHERE id=$id";
    if ($conn->query($update_query) === TRUE) {
        //echo "Mascota actualizada exitosamente.";
        echo "<script>alert('Actualizacion exitosa'); window.location.href = 'listar_mascotas_estado.php';</script>";
    } else {
        //echo "Error: " . $update_query . "<br>" . $conn->error;
        echo "<script>alert('Error en actualizar mascota'); window.location.href = 'listar_mascotas_estado.php';</script>";
    }
} else {
    // Obtén el ID de la mascota desde la URL
    $id = $_GET["id"];

    // Consulta para obtener los datos de la mascota
    $consulta_mascota = "SELECT * FROM mascotas WHERE id = $id";
    $resultado_mascota = $conn->query($consulta_mascota);

    if ($resultado_mascota->num_rows > 0) {
        $mascota = $resultado_mascota->fetch_assoc();
    } else {
        echo "No se encontró la mascota.";
        exit;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modificar Mascota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Modificar Mascota</h2>
    <hr>
    <form action="modificar_mascota.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $mascota['id']; ?>">
        <div class="form-group">
            <label for="nombre">Nombre de la Mascota:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $mascota['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <img src="<?php echo $mascota['foto']; ?>" alt="Foto de <?php echo $mascota['nombre']; ?>" style="width: 100px; height: auto;">
        </div>
        <div class="form-group">
            <label for="raza">Raza:</label>
            <input type="text" class="form-control" id="raza" name="raza" value="<?php echo $mascota['raza']; ?>">
        </div>
        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" class="form-control" id="color" name="color" value="<?php echo $mascota['color']; ?>">
        </div>
        <div class="form-group">
            <label for="fecha_de_nac">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="fecha_de_nac" name="fecha_de_nac" value="<?php echo $mascota['fecha_de_nac']; ?>">
        </div>
        <div class="form-group">
            <label for="fecha_muerte">Fecha de Muerte:</label>
            <input type="date" class="form-control" id="fecha_muerte" name="fecha_muerte" value="<?php echo $mascota['fecha_muerte']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Mascota</button>
    </form>
</div>
</body>
</html>