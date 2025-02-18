<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Generar Turno</title>
    <?php include 'headers.php'; ?>
</head>
<body>
<?php
  include 'navbar.php';
?>
<br>

<div class="container mt-4">
    <div class="carnet">
        <h1>Generar Turno</h1><hr>
        <form action="procesar_turno.php" method="post">
            <div class="form-group">
                <label for="fecha_hora">Fecha y Hora:<span class="text-danger">*</span></label>
                <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
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
              <label for="personal_id">Personal ID:<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="personal_id" name="personal_id" required>
            </div>
            <button type="submit" class="btn btn-primary" title="Confirmar datos del nuevo turno">Generar Turno</button>
            <a href="listar_turnos_admin.php" class="btn btn-secondary" title="Volver a pestaña anterior">Volver</a>
        </form>
    </div>
</div>
<br><br>

<?php
    include 'footer.php';
?>
</body>
</html>