<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Modificar Personal</title>
  <?php include 'headers.php'; ?>
</head>
<body>

<?php
  include 'navbar.php';
?>
<br>

<div class="container mt-4">
  <h1>Modificar Personal</h1><hr>

  <?php
  include 'conexion.php';

  $id_personal = $_GET['id'];

  // Consulta para obtener los datos actuales del personal
  $consulta_personal = "SELECT * FROM personal WHERE id = '$id_personal'";
  $resultado_personal = $conn->query($consulta_personal);

  // Muestra el formulario para modificar
  if ($resultado_personal->num_rows > 0) {
      $personal = $resultado_personal->fetch_assoc();
  ?>
      <form action="procesar_modificacion_personal.php" method="post">
        <input type="hidden" name="id_personal" value="<?php echo $id_personal; ?>">
        <div class="form-group">
          <label for="nombre">Nombre:<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $personal['nombre']; ?>" required>
        </div>
        <div class="form-group">
          <label for="apellido">Apellido:<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $personal['apellido']; ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Correo electrónico:<span class="text-danger">*</span></label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $personal['email']; ?>" required>
        </div>
        <div class="form-group">
          <label for="rol_id">Rol:<span class="text-danger">*</span></label>
          <select class="form-control" id="rol_id" name="rol_id" required>
            <option value="1" <?php if ($personal['rol_id'] == 1) echo 'selected'; ?>>Administrador</option>
            <option value="2" <?php if ($personal['rol_id'] == 2) echo 'selected'; ?>>Peluquero</option>
            <option value="3" <?php if ($personal['rol_id'] == 3) echo 'selected'; ?>>Veterinario</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary" title="Confirmar modificación de personal">Guardar Cambios</button>
        <a href="listar_personales.php" class="btn btn-secondary" title="Volver a pestaña anterior">Volver</a>
      </form>
  <?php
  } else {
      echo "<p>Personal no encontrado.</p>";
  }

  $conn->close();
  ?>

</div>
<br><br>

<?php
  include 'footer.php';
?>
</body>
</html>
