<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Listado de Personales</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark">
  <!-- ... (tu barra de navegación) ... -->
</nav>
<br>
<div class="container mt-4">
  <h2>Listado de Personales</h2>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Rol ID</th>
        <th>Acciones</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'conexion.php';

      // Consulta para obtener la lista de personales
      $consulta_personales = "SELECT * FROM personal";
      $resultado_personales = $conn->query($consulta_personales);

      // Muestra la lista de personales
      if ($resultado_personales->num_rows > 0) {
          while ($personal = $resultado_personales->fetch_assoc()) {
              echo "<tr>";
              echo "<td>{$personal['id']}</td>";
              echo "<td>{$personal['nombre']}</td>";
              echo "<td>{$personal['apellido']}</td>";
              echo "<td>{$personal['email']}</td>";
              echo "<td>{$personal['rol_id']}</td>";
              echo "<td>";
              echo "<a href='modificar_personal.php?id={$personal['id']}' class='btn btn-info'>Modificar</a>";
              echo "<a href='dar_baja_personal.php?id={$personal['id']}' class='btn btn-danger'>Dar de Baja</a>";
              echo "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No hay personales registrados.</td></tr>";
      }

      // Cierra la conexión a la base de datos
      $conn->close();
      ?>
    </tbody>
  </table>
</div>

<!-- Footer -->

</body>
</html>
