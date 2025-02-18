<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Listado de Clientes</title>
  <?php include 'headers.php'; ?>
</head>
<body>
<?php
  include 'navbar.php';
?>
<br>
<div class="container mt-4">
  <h1>Listado de Clientes</h1>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Ciudad</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Clave</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      include 'conexion.php';
      $consulta = "select * from clientes";
      $result = $conn->query($consulta);

      if ($result->num_rows > 0) {
          while ($cli = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>{$cli['id']}</td>";
              echo "<td>{$cli['nombre']}</td>";
              echo "<td>{$cli['apellido']}</td>";
              echo "<td>{$cli['email']}</td>";
              echo "<td>{$cli['ciudad']}</td>";
              echo "<td>{$cli['direccion']}</td>";
              echo "<td>{$cli['telefono']}</td>";
              echo "<td>{$cli['clave']}</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No hay clientes registrados.</td></tr>";
      }

      $conn->close();
      ?>
    </tbody>
  </table>
  <a href="ingresar_cliente.php" class="btn btn-success" title="Registrar un nuevo cliente">Registrar Cliente</a>
  <a href="gestionar-mi-perfil.php" class="btn btn-primary" title="Volver a pestaña anterior">Volver</a>
</div>
<br><br>

<?php
  include 'footer.php';
?>
</body>
</html>
