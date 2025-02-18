<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Registrar Cliente</title>
  <?php include 'headers.php'; ?>
</head>
<body>

<?php
  include 'navbar.php';
?>
<br><br>
<div class="container">
  <h1>Registrar Cliente</h1>
  <hr>
  <form action="registrar-cliente.php" method="post">
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
      <label for="ciudad">Ciudad:</label>
      <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingrese ciudad">
    </div>
    <div class="form-group">
      <label for="direccion">Dirección:</label>
      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese direccion">
    </div>
    <div class="form-group">
      <label for="telefono">Telefono:</label>
      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono">
    </div>
    <div class="form-group">
      <label for="clave">Clave:<span class="text-danger">*</span></label>
      <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese clave" required>
    </div>
    <button type="submit" class="btn btn-primary" title="Confirmar registro de nuevo cliente">Registrar Cliente</button>
    <a href="listar_clientes.php" class="btn btn-secondary" title="Volver a pestaña anterior">Volver</a>
  </form>
</div>
<br><br><br>

<?php
  include 'footer.php';
?>

</body>
</html>
