<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Modificar Personal</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" href="imagenes/logovet.png" type="image/png">
</head>
<body>

<nav class="navbar navbar-expand-lg  bg-dark ">
    <a class="navbar-brand" href="pagina.php">
      <img src="imagenes/logovet.png" alt="Logo" title="Logo" width="50" height="50">
        Veterinaria San Anton
    </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto" >
      <li class="nav-item">
        <a class="nav-link" href="quienes-somos.php">Quienes somos?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.php">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="servicios.php">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionar-mi-perfil.php">Mi Perfil</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <p class="nav-link" style="color: #007bff;margin: 0; padding: 0.5rem 1rem; text-decoration: none;"><?php echo $_SESSION['nombre']; ?></p>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Cerrar sesión</a>
        </li>
    </ul>
  </div>
</nav>
<br>

<div class="container mt-4">
  <h2>Modificar Personal</h2><hr>

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
<footer class="footer bg-dark text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <br>
        <h5>Mapa de Sitio</h5>
        <ul class="list-unstyled">
          <li><a href="pagina.php">Inicio</a></li>
          <li><a href="quienes-somos.php">Quienes somos?</a></li>
          <li><a href="servicios.php">Servicios</a></li>
          <li><a href="contacto.php">Contacto</a></li>
          <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
      </div>
      <div class="col-md-6">
        <br>
        <h5>Contacto</h5>
        <address>
          Veterinaria San Anton<br>
          123 Calle Principal<br>
          Rosario, Argentina<br>
          Teléfono: 123-456-7890<br>
          Correo electrónico: info@example.com
        </address>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
