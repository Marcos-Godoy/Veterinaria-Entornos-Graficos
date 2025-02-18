<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Registrar Mascota</title>
  <?php include 'headers.php'; ?>
</head>
<body>

<?php
  include 'navbar.php';
?>
<br><br>
<div class="container">
  <h1>Registrar Mascota</h1>
  <hr>
  <form action="procesar_registro_mascota.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="cliente_id">Cliente ID:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="cliente_id" name="cliente_id" placeholder="Ingrese ID del cliente" required>
    </div>
    <div class="form-group">
      <label for="nombre">Nombre de la Mascota:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre de la mascota" required>
    </div>
    <div class="form-group">
      <label for="foto">Foto:<span class="text-danger">*</span></label>
      <input type="file" class="form-control" id="foto" name="foto" required>
    </div>
    <div class="form-group">
      <label for="raza">Raza:</label>
      <input type="text" class="form-control" id="raza" name="raza" placeholder="Ingrese raza">
    </div>
    <div class="form-group">
      <label for="color">Color:</label>
      <input type="text" class="form-control" id="color" name="color" placeholder="Ingrese color">
    </div>
    <div class="form-group">
      <label for="fecha_de_nac">Fecha de Nacimiento:</label>
      <input type="date" class="form-control" id="fecha_de_nac" name="fecha_de_nac">
    </div>
    <button type="submit" class="btn btn-primary">Registrar Mascota</button>
    <a href="listar_mascotas_estado.php" class="btn btn-secondary">Volver</a>
  </form>
</div>

<br><br>
<?php
  include 'footer.php';
?>

</body>
</html>