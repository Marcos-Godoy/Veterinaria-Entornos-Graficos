<?php
// Iniciar sesión
session_start();

include 'conexion.php';

// Consulta SQL para obtener los turnos disponibles con información del servicio
$consulta_turnos = "SELECT t.id, t.fecha_hora, t.servicio_id, t.estado, s.nombre as nombre_servicio, s.tipo
                    FROM turnos t
                    INNER JOIN servicios s ON t.servicio_id = s.id
                    WHERE t.estado = 'disponible'
                    ORDER BY t.servicio_id";

$resultado_turnos = $conn->query($consulta_turnos);

// Mostrar la lista de turnos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Turnos Disponibles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">

<nav class="navbar navbar-expand-lg  bg-dark ">
  <a class="navbar-brand" href="pagina.html"><img src="imagenes\logovet.png" alt="Logo" width="50" height="50"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto" >
      <li class="nav-item">
        <a class="nav-link" href="quienes-somos.html">Quienes somos?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.html">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="servicios.html">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionar-mi-perfil.php">Mi Perfil</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.html">Iniciar Sesión</a>
      </li>
    </ul>
  </div>
</nav>

    <h2 class="mt-4">Lista de Turnos Disponibles</h2>

    <table class="table table-bordered mt-3">
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
                    echo "<td><a href='tomar_turno.php?id={$turno['id']}' class='btn btn-primary'>Tomar Turno</a></td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay turnos disponibles.</td></tr>";
            }
            ?>

        </tbody>
    </table>

</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>


