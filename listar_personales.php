<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Listado de Personales</title>
  <?php include 'headers.php'; ?>
</head>
<body>
<?php
  include 'navbar.php';
?>
<br>
<div class="container mt-4">
  <h1>Listado de Personales</h1>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      include 'conexion.php';

      // Consulta para obtener la lista de personales
      $consulta_personales = "SELECT p.id, p.nombre, p.apellido, p.email, r.nombre as rol FROM personal p inner join roles r on p.rol_id = r.id";
      $resultado_personales = $conn->query($consulta_personales);

      // Muestra la lista de personales
      if ($resultado_personales->num_rows > 0) {
          while ($personal = $resultado_personales->fetch_assoc()) {
              echo "<tr>";
              echo "<td>{$personal['id']}</td>";
              echo "<td>{$personal['nombre']}</td>";
              echo "<td>{$personal['apellido']}</td>";
              echo "<td>{$personal['email']}</td>";
              echo "<td>{$personal['rol']}</td>";
              echo "<td>";
              echo "<a href='modificar_personal.php?id={$personal['id']}' class='btn btn-info' title='Modificar personal'>Modificar</a>";
              echo "<a href='dar_baja_personal.php?id={$personal['id']}' class='btn btn-danger' title='Eliminar personal'>Dar de Baja</a>";
              echo "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No hay personales registrados.</td></tr>";
      }

      $conn->close();
      ?>
    </tbody>
  </table>
  <a href="ingresar_personal.php" class="btn btn-success" title="Registrar un nuevo personal">Nuevo Personal</a>
  <a href="gestionar-mi-perfil.php" class="btn btn-primary" title="Volver a pestaña anterior">Volver</a>
</div>
<br><br>

<?php
  include 'footer.php';
?>

</body>
</html>
