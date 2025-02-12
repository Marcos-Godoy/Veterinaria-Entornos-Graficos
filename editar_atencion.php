<?php
// filepath: /c:/xampp/htdocs/Veterinaria/Veterinaria-Entornos-Graficos/editar_atencion.php
session_start();
include 'conexion.php';

// Obtiene el ID de la atención desde la URL
$id_atencion = $_GET['id'];

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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>
            body { font-family: 'Arial', sans-serif; background-color: #f0f0f0; }
            .form-container { width: 500px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 15px; }
            label { display: block; margin-bottom: 10px; }
            input, textarea { width: 100%; padding: 10px; margin-bottom: 15px; }
            input[disabled], textarea[disabled] { background-color: #eee; }
            input[type='submit'] { background-color: #4caf50; color: #fff; cursor: pointer; }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <a class="navbar-brand" href="pagina.php">
            <img src="imagenes/logovet.png" alt="Logo" width="50" height="50">
            Veterinaria San Anton
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="quienes-somos.php">Quienes somos?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestionar-mi-perfil.php">Mi Perfil</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <li class="nav-item">
                        <p class="nav-link" style="color: #007bff; margin: 0; padding: 0.5rem 1rem; text-decoration: none;"><?php echo $_SESSION['nombre']; ?></p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesión</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Iniciar sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <br><br>
    <div class="form-container">
        <h2>Editar Atención</h2>
        <form action="procesar_edicion_atencion.php" method="post">
            <label for="id_atencion">ID de Atención:</label>
            <input type="text" name="id_atencion" value="<?php echo $atencion['id']; ?>" disabled><br>

            <label for="servicio">Servicio:</label>
            <input type="text" name="servicio" value="<?php echo obtenerNombreServicio($atencion['servicio_id'], $conn); ?>" disabled><br>

            <label for="personal">Personal:</label>
            <input type="text" name="personal" value="<?php echo obtenerNombrePersonal($atencion['personal_id'], $conn); ?>" disabled><br>

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $atencion['titulo']; ?>"><br>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion"><?php echo $atencion['descripcion']; ?></textarea><br>

            <input type="hidden" name="id_atencion" value="<?php echo $atencion['id']; ?>">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="gestionar-mi-perfil.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
    <br>
    <footer class="footer bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <br>
                    <h5>Mapa de Sitio</h5>
                    <ul class="list-unstyled">
                        <li><a href="pagina.php">Inicio</a></li>
                        <li><a href="quienes-somos.php">Quienes somos?</a></li>
                        <li><a href="servicios.php">Servicios</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
                        <li><a href="logout.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <br>
                    <h5>Contacto</h5>
                    <address>
                        Veterinaria San Anton<br>
                        123 Calle Principal<br>
                        Rosario, Argentina<br>
                        Teléfono: 123-456-7890<br>
                        Correo electrónico: info@example.com
                    </address>
                </div>
            </div>
        </div>
    </footer>
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