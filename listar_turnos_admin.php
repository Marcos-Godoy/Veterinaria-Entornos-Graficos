<!DOCTYPE html>
<html>
<head>
    <title>Listar Turnos Disponibles</title>
    <?php include 'headers.php'; ?>
</head>
<?php
session_start();

include 'conexion.php';

$consulta_turnos = "SELECT t.id, t.fecha_hora, t.servicio_id, s.tipo, t.estado, s.nombre as nombre_servicio, p.email as per, c.email as cli
                    FROM turnos t
                    INNER JOIN servicios s ON t.servicio_id = s.id
                    INNER JOIN personal p ON p.id = t.personal_id
                    LEFT JOIN clientes c ON c.id = t.cliente_id
                    WHERE t.fecha_hora > NOW()
                    ORDER BY t.servicio_id, t.fecha_hora";

$resultado_turnos = $conn->query($consulta_turnos);
?>
<body>
<?php
  include 'navbar.php';
?>
<br>
<div class="container">
    <h1 class="mt-4">Lista de Próximos Turnos</h1>
    <div class="table-responsive">
      <table class="table table-bordered mt-3 container table-striped">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Fecha y Hora</th>
                  <th>Nombre del Servicio</th>
                  <th>Tipo del Servicio</th>
                  <th>Estado</th>
                  <th>Personal</th>
                  <th>Cliente</th>
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
                      echo "<td>{$turno['estado']}</td>";
                      echo "<td>{$turno['per']}</td>";
                      echo "<td>{$turno['cli']}</td>";

                      echo "<td><a href='eliminar_turno.php?id={$turno['id']}' class='btn btn-danger' title='Eliminar turno'>Eliminar</a></td>";

                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='6'>No hay turnos disponibles.</td></tr>";
              }
              ?>

          </tbody>
      </table>
    </div>
    <a href="generar_turno.php" class="btn btn-primary" title="Ingresar un nuevo turno">Generar Turno</a>
    <a href="gestionar-mi-perfil.php" class="btn btn-secondary" title="Volver a pestaña anterior">Volver</a>
</div>
<br><br>
<?php
  include 'footer.php';
?>

</body>
</html>

<?php
$conn->close();
?>