<!DOCTYPE html>
<html lang="es">
<head>
    <title>Modificar Mascota</title>
    <?php include 'headers.php'; ?>
</head>
<body>

<?php
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $raza = $_POST["raza"];
    $color = $_POST["color"];
    $fecha_de_nac = $_POST["fecha_de_nac"];

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
    $update_query = "UPDATE mascotas SET nombre='$nombre', raza='$raza', color='$color', fecha_de_nac='$fecha_de_nac' $foto_query WHERE id=$id";
    if ($conn->query($update_query) === TRUE) {
        echo "<script>alert('Actualizacion exitosa'); window.location.href = 'listar_mascotas_estado.php';</script>";
    } else {
        echo "<script>alert('Error en actualizar mascota'); window.location.href = 'listar_mascotas_estado.php';</script>";
    }
} else {
    // Obtiene el ID de la mascota desde la URL
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
include 'navbar.php';
?>

<br>
<div class="container mt-4">
    <h1>Modificar Mascota</h1>
    <hr>
    <form action="modificar_mascota.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $mascota['id']; ?>">
        <div class="form-group">
            <label for="nombre">Nombre de la Mascota:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $mascota['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <img src="<?php echo $mascota['foto']; ?>" alt="Foto de <?php echo $mascota['nombre']; ?>" style="width: 100px; height: auto;" title="Foto de la mascota">
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
        <button type="submit" class="btn btn-primary" title="Confirmar modificación de mascota">Guardar Cambios</button>
        <a href="listar_mascotas_estado.php" class="btn btn-secondary" title="Volver a pestaña anterior">Volver</a>
    </form>
</div>
<br><br>
<?php
  include 'footer.php';
?>
</body>
</html>