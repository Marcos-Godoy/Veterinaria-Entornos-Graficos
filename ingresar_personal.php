<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Formulario de Contacto</title>
  <?php include 'headers.php'; ?>
</head>
<body>

<?php
  include 'navbar.php';
?>

<br><br>  

<div class="container">
  <h1>Registrar Personal</h1>
  <hr>
  <form action="registrar_personal.php" method="post">
    <div class="form-group">
      <label for="nombre">Nombre:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required>
    </div>
    <div class="form-group">
      <label for="apellido">Apellido:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese apellido" required>
    </div>
    <div class="form-group">
      <label for="email">Correo electrónico:<span class="text-danger">*</span></label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese correo electrónico" required>
    </div>
    <div class="form-group">
      <label for="clave">Clave:<span class="text-danger">*</span></label>
      <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese clave" required>
    </div>
    <div class="form-group">
      <label for="rol_id">Rol:<span class="text-danger">*</span></label>
      <select class="form-control" id="rol_id" name="rol_id" required>
        <option value="" disabled selected>Seleccione un rol</option>
        <option value="1">Administrador</option>
        <option value="2">Peluquero</option>
        <option value="3">Veterinario</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Personal</button>
    <a href="listar_personales.php" class="btn btn-secondary">Volver</a>
  </form>
</div>
<br><br>

<?php
  include 'footer.php';
?>
</body>
</html>
