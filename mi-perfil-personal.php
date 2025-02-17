<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Personal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="imagenes/logovet.png" type="image/png">
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

include 'conexion.php';

// Consultar los turnos del personal desde la base de datos
$personal_id = $_SESSION['usuario_id'];
$sql = "SELECT fecha_hora FROM turnos WHERE personal_id = $personal_id AND estado = 'ocupado' order by fecha_hora";
$result = $conn->query($sql);
?>

<nav class="navbar navbar-expand-lg  bg-dark ">
<a class="navbar-brand" href="pagina.php">
      <img src="imagenes/logovet.png" alt="Logo" title="Logo" width="50" height="50">
        Veterinaria San Anton
    </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto" >
      <li class="nav-item">
        <a class="nav-link" href="quienes-somos.php" title="Información de la Veterinaria">Quienes somos?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.php" title="Formulario de consultas">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="servicios.php" title="Nuestros servicios">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionar-mi-perfil.php" title="Acciones de usuario">Mi Perfil</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <p class="nav-link" style="color: #007bff;margin: 0; padding: 0.5rem 1rem; text-decoration: none;"><?php echo $_SESSION['nombre']; ?></p>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" title="Cerrar sesión">Cerrar sesión</a>
        </li>
    </ul>
  </div>
</nav>
<br><br>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="completar_atencion.php" class="list-group-item list-group-item-action active" title="Registrar una nueva atención de una mascota">Registrar Atención</a>
                <a href="listar_mascotas_estado.php" class="list-group-item list-group-item-action" title="Consultar y modificar atenciones">Gestionar Atenciones</a>
                <a href="cambiar_clave.php" class="list-group-item list-group-item-action" title="Cambiar contraseña de usuario">Cambiar Contraseña</a>
            </div>
        </div>
        <div class="col-md-9">
            <h1>Mi Perfil: <?php echo $_SESSION["nombre"]?></h1>
            <hr>
            <h4>Perfil de Personal</h4>
            <p>Desde acá podés consultar fichas clínicas, registrar y modificar atenciones de las mascotas de la veterinaria.</p>
        </div>
    </div>
    <br><br>
    <h4>Turnos del Personal</h4>
    <hr>
    <?php
    if ($result === false) {
        // Mostrar mensaje de error si la consulta falla
        echo "Error en la consulta: " . $conn->error;
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fechaHora = date("Y-m-d H:i", strtotime($row['fecha_hora']));
            $timestampFechaHora = strtotime($fechaHora);

            if ($timestampFechaHora > time()) {
                echo "<div class='alert alert-info'>
                  Fecha y Hora: <strong>{$fechaHora}</strong> - Turno Pendiente
                </div>";
            } else {
                echo "<div class='alert alert-danger'>
                  Fecha y Hora: <strong>{$fechaHora}</strong> - Turno Terminado
                </div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>
              No tienes turnos ...
            </div>";
    }
    $conn->close();
    ?>
</div>

<br><br><br>

<footer class="footer bg-dark text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <br>
        <h5>Mapa de Sitio</h5>
        <ul class="list-unstyled">
          <li><a href="pagina.php" title="Página principal">Inicio</a></li>
          <li><a href="quienes-somos.php" title="Información de la Veterinaria">Quienes somos?</a></li>
          <li><a href="servicios.php" title="Nuestros servicios">Servicios</a></li>
          <li><a href="contacto.php" title="Formulario de consultas">Contacto</a></li>
          <li><a href="logout.php" title="Cerrar sesión">Cerrar Sesión</a></li>
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
</body>
</html>