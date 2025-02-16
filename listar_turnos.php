<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listar Turnos Disponibles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="imagenes/logovet.png" type="image/png">
</head>
<?php
session_start();

include 'conexion.php';

// Consulta SQL para obtener los turnos disponibles con información del servicio
$consulta_turnos = "SELECT t.id, t.fecha_hora, t.servicio_id, t.estado, s.nombre as nombre_servicio, s.tipo
                    FROM turnos t
                    INNER JOIN servicios s ON t.servicio_id = s.id
                    WHERE t.estado = 'disponible' and t.fecha_hora > NOW()
                    ORDER BY t.servicio_id, t.fecha_hora";

$resultado_turnos = $conn->query($consulta_turnos);
?>
<body>
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
        <li class="nav-item">
            <p class="nav-link" style="color: #007bff;margin: 0; padding: 0.5rem 1rem; text-decoration: none;"><?php echo $_SESSION['nombre']; ?></p>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Cerrar sesión</a>
        </li>
    </ul>
  </div>
</nav>
<br>
<div class="container">
    <h2 class="mt-4">Lista de Turnos Disponibles</h2>

    <table class="table table-bordered mt-3 container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha y Hora</th>
                <th>Nombre del Servicio</th>
                <th>Tipo del Servicio</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Mostrar la lista de turnos
            if ($resultado_turnos->num_rows > 0) {
                while ($turno = $resultado_turnos->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$turno['id']}</td>";
                    echo "<td>{$turno['fecha_hora']}</td>";
                    echo "<td>{$turno['nombre_servicio']}</td>";
                    echo "<td>{$turno['tipo']}</td>";

                    // Botón para tomar el turno
                    echo "<td><a href='tomar_turno.php?id={$turno['id']}' class='btn btn-primary' title='Elegir este turno'>Tomar Turno</a></td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay turnos disponibles.</td></tr>";
            }
            ?>

        </tbody>
    </table>
    <a href="gestionar-mi-perfil.php" class="btn btn-secondary" title="Volver a pestaña anterior">Volver</a>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
$conn->close();
?>


