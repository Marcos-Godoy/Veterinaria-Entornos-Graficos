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

<div class="container mt-4">
  <h2>Listado de Personales</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Rol ID</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Conexión a la base de datos (ajusta según tu configuración)
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "bd_entornos";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Verifica la conexión
      if ($conn->connect_error) {
          die("Conexión fallida: " . $conn->connect_error);
      }

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
              echo "<td><a href='modificar_personal.php?id={$personal['id']}'>Modificar</a></td>";
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
