<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Mi Perfil</title>
  <?php include 'headers.php'; ?>
</head>
<body>

<?php
  include 'navbar.php';
?>
<br><br>

<div class="container">
  <h1>Completar Atención</h1>
  <hr>
  <form action="procesar_atencion.php" method="post">
    <div class="form-group">
      <label for="nombre_mascota">Mascota:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota" placeholder="Nombre de la mascota" required>
    </div>
    <div class="form-group">
      <label for="servicio_id">Servicio:<span class="text-danger">*</span></label>
      <select class="form-control" id="servicio_id" name="servicio_id" required>
        <option value="" disabled selected>Seleccione un servicio</option>
        <option value="1">Consulta General</option>
        <option value="2">Vacunaciones</option>
        <option value="3">Desparasitaciones</option>
        <option value="4">Tratamientos</option>
        <option value="5">Curaciones</option>
        <option value="6">Limpiezas</option>
        <option value="7">Cortes</option>
        <option value="8">Operaciones</option>
        <option value="9">Otros</option>
      </select>
    </div>
    <div class="form-group">
      <label for="fecha_hora">Fecha y Hora:<span class="text-danger">*</span></label>
      <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
    </div>
    <div class="form-group">
      <label for="titulo">Título:</label>
      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título">
    </div>
    <div class="form-group">
      <label for="descripcion">Descripción:</label>
      <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Ingrese la descripción"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" title="Registrar nueva atención de mascota">Completar Atención</button>
    <a href="gestionar-mi-perfil.php" class="btn btn-secondary" title="Volver a pestaña anterior">Volver</a>
  </form>
</div>

<br><br>
<?php
  include 'footer.php';
?>
</body>
</html>