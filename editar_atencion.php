<?php
    // filepath: /c:/xampp/htdocs/Veterinaria/Veterinaria-Entornos-Graficos/editar_atencion.php
    session_start();
    include 'conexion.php';

    // Obtiene el ID de la atención desde la URL
    $id_atencion = $_GET['id'];
    $nombre = $_GET['nombre'];

    // Consulta para obtener la información de la atención
    $consulta_atencion = "SELECT * FROM atenciones WHERE id = '$id_atencion'";
    $resultado_atencion = $conn->query($consulta_atencion);

    // Verifica si la atención existe
    if ($resultado_atencion->num_rows > 0) {
        $atencion = $resultado_atencion->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <title>Editar Atención</title>
        <?php include 'headers.php'; ?>
        <style>
            body { background-color: #f0f0f0; }
            .form-container { width: 500px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 15px; }
            label { display: block; margin-bottom: 10px; }
            input, textarea { width: 100%; padding: 10px; margin-bottom: 15px; }
            input[disabled], textarea[disabled] { background-color: #eee; }
            input[type='submit'] { background-color: #4caf50; color: #fff; cursor: pointer; }
        </style>
    </head>
    <body>
    <?php
        include 'navbar.php';
    ?>
    <br><br>
    <div class="form-container">
        <h1 class="text-center">Editar Atención</h1><hr>
        <form action="procesar_edicion_atencion.php" method="post">
            <label for="id_atencion">ID de Atención:</label>
            <input type="text" name="id_atencion" value="<?php echo $atencion['id']; ?>" disabled><br>

            <label for="nombre_mascota">Mascota:</label>
            <input type="text" name="nombre_mascota" value="<?php echo $nombre; ?>" disabled><br>

            <label for="servicio">Servicio:</label>
            <input type="text" name="servicio" value="<?php echo obtenerNombreServicio($atencion['servicio_id'], $conn); ?>" disabled><br>

            <label for="personal">Personal:</label>
            <input type="text" name="personal" value="<?php echo obtenerNombrePersonal($atencion['personal_id'], $conn); ?>" disabled><br>

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $atencion['titulo']; ?>"><br>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion"><?php echo $atencion['descripcion']; ?></textarea><br>

            <input type="hidden" name="id_atencion" value="<?php echo $atencion['id']; ?>">
            <input type="hidden" name="nombre_mascota" value="<?php echo $nombre; ?>"> <!-- Campo oculto para nombre_mascota -->
            <button type="submit" class="btn btn-primary" title="Confirmar modificación de atención">Guardar Cambios</button>
            <a href="generar_carnet.php?nombre_mascota=<?php echo $nombre; ?>" class="btn btn-secondary" title="Volver a pestaña anterior">Volver</a>
        </form>
    </div>
    <br>
    <?php
        include 'footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
} else {
    echo "<p>Atención no encontrada.</p>";
}

// Cierra la conexión a la base de datos
$conn->close();

// Funciones auxiliares para obtener nombres de servicio y personal
function obtenerNombreServicio($servicio_id, $conn) {
    $consulta = "SELECT nombre FROM servicios WHERE id = '$servicio_id'";
    $resultado = $conn->query($consulta);
    if ($resultado->num_rows > 0) {
        $servicio = $resultado->fetch_assoc();
        return $servicio['nombre'];
    } else {
        return "Desconocido";
    }
}

function obtenerNombrePersonal($personal_id, $conn) {
    $consulta = "SELECT email FROM personal WHERE id = '$personal_id'";
    $resultado = $conn->query($consulta);
    if ($resultado->num_rows > 0) {
        $personal = $resultado->fetch_assoc();
        return $personal['email'];
    } else {
        return "Desconocido";
    }
}
?>